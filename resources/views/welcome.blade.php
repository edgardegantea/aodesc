<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Cron</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('cron/css/bootstrap.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('cron/css/style.css') }}">
    <!-- Responsive-->
    <link rel="icon" href="{{ asset('cron/images/fevicon.png') }}" type="image/gif" />
    <link rel="stylesheet" href="{{ asset('cron/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('cron/css/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="{{ asset('cron/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cron/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">

</head>
<!-- body -->

<body>
    <div class="header_main">
        <div class="container">

            <!-- <div class="logo"><a href="#"><img src="{{ asset('cron/images/logo.png') }}"></a></div> -->
        </div>
    </div>

    <div class="header">
        <div class="container">
            <!--  header inner -->
            <div class="col-sm-12">

                <div class="menu-area">
                    <nav class="navbar navbar-expand-lg ">
                        <!-- <a class="navbar-brand" href="#">Menu</a> -->
                        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fa fa-bars"></i>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#">
                                        @foreach($information as $info)
                                        {{ $info->name }}
                                        @endforeach
                                        <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">ABOUT</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">SERVICES</a>
                                </li>
                                <li class="#" href="#">
                                    <a class="nav-link" href="#">BLOG</a>
                                </li>
                                <li class="nav-item" href="#">
                                    <a class="nav-link" href="#">CONTACT</a>
                                </li>
                                <li class="last"><a href="#"><img src="{{ asset('cron/images/search-icon.png') }}"
                                            alt="icon"></a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- end header end -->
    <!--banner start -->
    <div class="banner-main">
        <div class="container">
            <div id="main_slider" class="carousel slide" data-ride="carousel">
                <!-- The slideshow -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="titlepage-h1">
                            <h1 class="bnner_title">
                                @foreach($information as $info)
                                {{ $info->slogan }}
                                @endforeach
                                <br>
                                <span style="color: #10b5fa">Content Writing Services</span>
                            </h1>
                            <p class="long_text">It is a long established fact that a reader will be distracted by the
                                readable content of a page when looking </p>
                        </div>
                        <div class="btn_main">
                            <button type="button" class="btn btn-dark btn-lg"><a
                                    href="contact.html">Contact</a></button>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="titlepage-h1">
                            <h1 class="banner_title">Welcome To<br>
                                <span style="color: #10b5fa">Content Writing Services</span>
                            </h1>
                            <p class="long_text">It is a long established fact that a reader will be distracted by the
                                readable content of a page when looking </p>
                        </div>
                        <div class="btn_main">
                            <button type="button" class="btn btn-dark btn-lg">Contact</button>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="titlepage-h1">
                            <h1 class="bnner_title">Welcome To<br>
                                <span style="color: #10b5fa">Content Writing Services</span>
                            </h1>
                            <p class="long_text">It is a long established fact that a reader will be distracted by the
                                readable content of a page when looking </p>
                        </div>
                        <div class="btn_main">
                            <button type="button" class="btn btn-dark btn-lg">Contact</button>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="carousel-control-next" href="#main_slider" role="button" data-slide="prev">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>
    </div>
    <!--banner end -->


    <div class="mt-3">
        <div class="container">
            @forelse($vehicles as $vehicle)
            <div class="mt-3">
                <img style="width: 100%; height: 350px; object-fit: cover;" src="/imagenes/vehicles/{{ $vehicle->image }}" alt="{{ $vehicle->brand }} {{ $vehicle->model }}" />
                <h2 class="touch_text">{{ $vehicle->brand }} {{ $vehicle->model }}</h2>
                <p class="lorem_text text-dark">{{ $vehicle->description }}</p>
            </div>
            @empty
            NO hay registros de automóviles en este momento
            @endforelse
        </div>
    </div>



    <!--touch_section start -->

    <div class="touch_section">
        <div class="container">
            <h1 class="touch_text">Let's Get In Touch!</h1>
        </div>
    </div>

    <div class="lets_touch_main">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="input_main">
                        <div class="container">
                            <form action="/action_page.php">
                                <div class="form-group">
                                    <input type="text" class="email-bt" placeholder="Name" name="Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="email-bt" placeholder="Email" name="Email">
                                </div>
                                <form action="/action_page.php">
                                    <div class="form-group">
                                        <textarea class="massage-bt" placeholder="Massage" rows="5" id="comment"
                                            name="text"></textarea>
                                    </div>
                                </form>
                            </form>
                        </div>
                        <div class="send_btn">
                            <button type="button" class="main_bt"><a href="#">Send</a></button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-12">
                            <p class="lorem_text">It is a long established fact that a reader will be distracted by the
                                readable content of a page when looking at its layout. The point of using Lorem Ipsum is
                                that it has a more-or-less normal distribution of letters, as opposed to using 'Content
                                here, content here', making it look like readable English. Many desktop publishing
                                packages
                                and web</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--touch_section end -->
    <!--Contact_section start -->
    <div class="contact_main">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="touch_text">Contact Us</h1>
                </div>
            </div>
        </div>
        <div class="contact_section_2">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="map_icon">
                            <p class="email-text">
                                @foreach($information as $info)
                                {{ $info->email }}
                                @endforeach
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="map_icon">
                            <p class="email-text">
                                @foreach($information as $info)
                                {{ $info->phone }}
                                @endforeach
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="map_icon">
                            <p class="email-text">
                                @foreach($information as $info)
                                {{ $info->address }}
                                @endforeach
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Contact_section end -->
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <p class="copyright_text">
                            @forelse($information as $info)
                            {{ $info->copyright }}
                            @empty
                            Todos los derechos reservados.
                            @endforelse
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Javascript files-->
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>