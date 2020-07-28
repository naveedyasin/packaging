<!-- get_header('Page Name','Title')-->
<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'IILOGICS') }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900%7COpen+Sans:400,700,700i" rel="stylesheet">

    <link rel="icon" type="image/png" href="https://html.xpeedstudio.com/upturn/favicon.ico">
    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" href="https://html.xpeedstudio.com/upturn/apple-touch-icon.png">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/rev-settings.css') }}">

    <!--For Plugins external css-->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.css') }}"/>

    <!--Theme custom css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!--Theme Responsive css-->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }} " />
</head>
<body>
<!--[if lt IE 10]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- prelaoder -->
<!-- <div id="preloader">
<div class="preloader-wrapper">
    <div class="spinner"></div>
</div>
<div class="preloader-cancel-btn">
    <a href="#" class="btn btn-secondary prelaoder-btn">Cancel Preloader</a>
</div>
</div> -->
<!-- END prelaoder -->
<div class="header header-transparent nav-sticky">
    <!-- header section -->
    @includeIf('partials.header')
</div>

@yield('content');

<!-- language switcher strart -->
<!-- xs modal -->
<div class="zoom-anim-dialog mfp-hide modal-language" id="modal-popup-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="language-content">
                <p>Switch The Language</p>
                <ul class="flag-lists">
                    <li><a href="index.html#"><img src="assets/images/flags/006-united-states.svg" alt=""><span>English</span></a></li>
                    <li><a href="index.html#"><img src="assets/images/flags/002-canada.svg" alt=""><span>English</span></a></li>
                    <li><a href="index.html#"><img src="assets/images/flags/003-vietnam.svg" alt=""><span>Vietnamese</span></a></li>
                    <li><a href="index.html#"><img src="assets/images/flags/004-france.svg" alt=""><span>French</span></a></li>
                    <li><a href="index.html#"><img src="assets/images/flags/005-germany.svg" alt=""><span>German</span></a></li>
                </ul>
            </div>
        </div>
    </div>
</div><!-- End xs modal --><!-- end language switcher -->

<!-- search panel strart -->
<!-- xs modal -->
<div class="zoom-anim-dialog mfp-hide modal-searchPanel" id="modal-popup-2">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="xs-search-panel">
                <form action="index.html#" method="POST" class="xs-search-group">
                    <input type="search" class="form-control" name="search" id="search" placeholder="Search">
                    <button type="submit" class="search-button"><i class="icon icon-search"></i></button>
                </form>
            </div>
        </div>
    </div>
</div><!-- End xs modal --><!-- end search panel -->

<!-- footer section start -->
@includeIf('partials.footer')
<!-- footer section end -->
<!-- js file start -->
<script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins.js') }}"></script>
<script src="{{ asset('assets/js/Popper.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyCy7becgYuLwns3uumNm6WdBYkBpLfy44k"></script>
<script src="{{ asset('assets/js/scrollax.js') }}"></script>
<script src="{{ asset('assets/js/jquery.themepunch.revolution.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('assets/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script src="{{ asset('assets/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script src="{{ asset('assets/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script src="{{ asset('assets/js/extensions/revolution.extension.parallax.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.easypiechart.min.js') }}"></script>
<script src="{{ asset('assets/js/delighters.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>		<!-- End js file -->
</body>
</html>
