@extends('plantilla.dashboard')
@section('title', 'Vehículos')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-1">
                    <a class="btn btn-outline-info" href="{{ route('vehicles.create') }}"><i class="fas fa-plus-circle"></i></a>
                </div>
                <div class="col-md-7">
                    <h2 class="card-title">Listado de vehículos registrados en la base de datos</h2>
                </div>
                <div class="col-md-4">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a class='btn btn-outline-info mr-2' href="{{ url('/vehicles/xml') }}"><i class="fas fa-file-export"></i></a>
                        <a class='btn btn-outline-info mr-2' href="{{ url('/vehicles/import') }}"><i class="fas fa-file-import"></i></a>
                        <a class="btn btn-outline-info mr-2" href="{{ url('/vehicles/cards') }}" alt="Vista en cards"><i class="fas fa-border-all"></i></a>
                        <a class="btn btn-outline-info mr-2" href="{{ url('/vehicles/chart') }}"><i class="fas fa-chart-bar"></i></a>
                        <a class="btn btn-outline-info mr-2" href="{{ url('/vehicles/exportToXlsx') }}"><i class="fas fa-file-excel"></i></a>
                        <span onclick="exportVehiclesToCSV(event.target)" data-href="/exportVehiclesToCSV" id="export" class="btn btn-outline-info">
                            <i class="fas fa-file-csv"></i>
                        </span>

                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">

            <table id="example" class="table table-striped table-responsive">

                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Vehículo</th>
                        <th>Información</th>
                        <th>Descripción</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($vehicles as $vehicle)
                    <tr>
                        <td>
                            <img style="height: 100px; width: 200px; object-fit: cover;"  src="/imagenes/vehicles/{{ $vehicle->image }}" alt="{{ $vehicle->brand }} {{ $vehicle->model }}" />
                        </td>

                        <td style="width: 25%">
                            <a href="{{ route('vehicles.show', $vehicle->id) }}">
                                <h4 class="text-left"> <span class="badge bg-info">{{ $vehicle->brand }} {{ $vehicle->model }}</span></h4>
                        </td>
                        </a>
                        <td style="width: 60%">
                            <p><b>Número de serie: </b>{{ $vehicle->serialNumber }}</p>
                            </p>
                        </td>
                        <td style="width: *">
                            <p>{{ $vehicle->color }}</p>
                        </td>

                        @empty
                        <h1>La tabla no tiene datos</h1>
                    </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</div>


<!-- DataTables -->
<script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>

<!-- Aplicación de DataTable -->
<script>
    $(function() {
        $('#example').DataTable({
            dom: 'Blfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
        });
    });
</script>

<script>
    function exportVehiclesToCSV(_this) {
        Doris
        let _url = $(_this).data('href');
        window.location.href = _url;
    }
</script>

@endsection