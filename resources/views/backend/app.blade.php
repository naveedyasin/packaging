
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@if (trim($__env->yieldContent('template_title')))@yield('template_title')
        | @endif {{ config('app.name', Lang::get('titles.app')) }}</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/plugins/css/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/colors.min.css') }}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->
    @yield('css')
    <style>
        input.search-input-text.form-control {
            display: inline;
            width: 90%;
        }
        .datatable-scroll-wrap{overflow: inherit;}
    </style>
    {{-- Scripts --}}
    <script>
        window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
    </script>
</head>

<body>

<!-- Main navbar -->
    @includeIf('backend.partials.header')
<!-- /main navbar -->


<!-- Page content -->
<div class="page-content">

    <!-- Main sidebar -->
    @includeIf('backend.partials.aside')
    <!-- /main sidebar -->


    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Page header -->
        <div class="page-header border-bottom-0">
            <div class="page-header-content header-elements-md-inline">
                <div class="page-title d-flex">
                    <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> / @yield('header', 'Dashboard')</h4>
                    <a href="index.html#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                </div>
            </div>
        </div>
        <!-- /page header -->

        <!-- Content area -->
        <div class="content pt-0">
            @includeIf('backend.partials.form-status')
            @yield('content')
        </div>
        <!-- /content area -->


        <!-- Footer -->
        <div class="navbar navbar-expand-lg navbar-light">
            <div class="text-center d-lg-none w-100">
                <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
                    <i class="icon-unfold mr-2"></i>
                    Footer
                </button>
            </div>

            <div class="navbar-collapse collapse" id="navbar-footer">
					<span class="navbar-text">
						&copy; {{date('Y')}}. <a href="{{route('admin.dashboard')}}">{{ config('app.name') }}</a> by <a href="http://imran.iilogics.com" target="_blank">Imran Ali</a>
					</span>
            </div>
        </div>
        <!-- /footer -->

    </div>
    <!-- /main content -->

</div>
<!-- /page content -->
<!-- Core JS files -->
<script src="{{ asset('admin/plugins/js/main/jquery.min.js') }}"></script>
<script src="{{ asset('admin/plugins/js/main/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/plugins/js/plugins/loaders/blockui.min.js') }}"></script>
<!-- /core JS files -->

<!-- Theme JS files -->
{{--<script src="{{ asset('admin/plugins/js/plugins/visualization/d3/d3.min.js') }}"></script>--}}
{{--<script src="{{ asset('admin/plugins/js/plugins/visualization/d3/d3_tooltip.js') }}"></script>--}}
{{--<script src="{{ asset('admin/plugins/js/plugins/forms/styling/switchery.min.js') }}"></script>--}}
{{--<script src="{{ asset('admin/plugins/js/plugins/ui/moment/moment.min.js') }}"></script>--}}
{{--<script src="{{ asset('admin/plugins/js/plugins/pickers/daterangepicker.js') }}"></script>--}}

{{--<script src="{{ asset('admin/plugins/js/demo_pages/dashboard.js') }}"></script>--}}
{{--<script src="{{ asset('admin/plugins/js/demo_charts/pages/dashboard/dark/streamgraph.js') }}"></script>--}}
{{--<script src="{{ asset('admin/plugins/js/demo_charts/pages/dashboard/dark/sparklines.js') }}"></script>--}}
{{--<script src="{{ asset('admin/plugins/js/demo_charts/pages/dashboard/dark/lines.js') }}"></script>--}}
{{--<script src="{{ asset('admin/plugins/js/demo_charts/pages/dashboard/dark/areas.js') }}"></script>--}}
{{--<script src="{{ asset('admin/plugins/js/demo_charts/pages/dashboard/dark/donuts.js') }}"></script>--}}
{{--<script src="{{ asset('admin/plugins/js/demo_charts/pages/dashboard/dark/bars.js') }}"></script>--}}
{{--<script src="{{ asset('admin/plugins/js/demo_charts/pages/dashboard/dark/progress.js') }}"></script>--}}
{{--<script src="{{ asset('admin/plugins/js/demo_charts/pages/dashboard/dark/heatmaps.js') }}"></script>--}}
{{--<script src="{{ asset('admin/plugins/js/demo_charts/pages/dashboard/dark/pies.js') }}"></script>--}}
{{--<script src="{{ asset('admin/plugins/js/demo_charts/pages/dashboard/dark/bullets.js') }}"></script>--}}
<!-- /theme JS files -->
@stack('scripts')
<script src="{{ asset('admin/assets/js/app.js') }}"></script>
</body>
</html>

