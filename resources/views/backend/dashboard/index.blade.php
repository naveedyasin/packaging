@extends('backend.app')
@section('template_title', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="panel short-states bg-danger">
                <div class="pull-right state-icon">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <div class="panel-body">
                    <h1 class="light-txt">1,3012</h1>
                    <div class=" pull-right">53% <i class="fa fa-bolt"></i></div>
                    <strong class="text-uppercase">NEW ORDERS</strong>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="panel short-states bg-info">
                <div class="pull-right state-icon">
                    <i class="fa fa-users"></i>
                </div>
                <div class="panel-body">
                    <h1 class="light-txt">5,534</h1>
                    <div class=" pull-right">65% <i class="fa fa-level-up"></i></div>
                    <strong class="text-uppercase">new users</strong>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="panel short-states bg-warning">
                <div class="pull-right state-icon">
                    <i class="fa fa-laptop"></i>
                </div>
                <div class="panel-body">
                    <h1 class="light-txt">$22,329</h1>
                    <div class=" pull-right">77% <i class="fa fa-level-down"></i></div>
                    <strong class="text-uppercase">Online Revenue</strong>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="panel short-states bg-primary">
                <div class="pull-right state-icon">
                    <i class="fa fa-pie-chart"></i>
                </div>
                <div class="panel-body">
                    <h1 class="light-txt">$268,188</h1>
                    <div class=" pull-right">88% <i class="fa fa-level-up"></i></div>
                    <strong class="text-uppercase">Total Profit</strong>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('template_linked_css')
    <link rel="stylesheet" href="{{ asset('admin/components/toastr/toastr.min.css') }}">
@endsection
@if(session()->has('status'))
@push('scripts')
    <script src="{{ asset('admin/components/toastr/toastr.min.js') }}"></script>
    <script>
        $(function () {
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": true,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.success('Your are logged in successfully','Logged In!');
        });
    </script>
@endpush
@endif
