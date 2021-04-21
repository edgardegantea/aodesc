<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('vehicles.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehicles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vehicle = request()->except('_token');
        Vehicle::insert($vehicle);
        return redirect()->to(url('/vehicles'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        return view('vehicles.show', compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        return view('vehicles.edit', compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        $dataVehicle = request()->except('_token');
        $vehicle->update($dataVehicle);
        return redirect()->to(url('/vehicles'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect()->to(url('/vehicles'));
    }


    public function exportVehiclesToCSV(Request $request)
    {
        $fileName = 'vehicles.csv';
        $vehicles = Vehicle::all();

        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; fileName=$fileName",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );

        $columns = array('Marca', 'Modelo', 'Número de serie', 'Color', 'Número de asientos');

        $callback = function () use ($vehicles, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($vehicles as $vehicle) {
                $row['brand'] = $vehicle->brand;
                $row['model'] = $vehicle->model;
                $row['serialNumber'] = $vehicle->serialNumber;
                $row['color'] = $vehicle->color;
                $row['numberOfSeats'] = $vehicle->numberOfSeats;

                fputcsv($file, array($row['brand'], $row['model'], $row['serialNumber'], $row['color'], $row['numberOfSeats']));
            }
            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
    }

    public function chart() {

        $vehicles = Vehicle::select(\DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(\DB::raw("Minute(created_at)"))
            ->pluck('count');

        $vehicles2 = Vehicle::select(\DB::raw("COUNT(*) as count"))
           ->whereBetween('numberOfSeats', ([2, 10]))
           ->groupBy(\DB::raw("numberOfSeats"))
           ->pluck('count');


        return view('vehicles.chart')
            ->with('vehicles', $vehicles)
            ->with('vehicles2', $vehicles2);
    }

}
