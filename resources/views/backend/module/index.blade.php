@extends('backend.app')
@section('template_title', 'Module')
@section('header', 'Module')
@section('content')
    <div class="content pt-0">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">All Module </h5>
                <div class="header-elements">
                    <div class="list-icons">
                        @include('backend.module.partials.header-buttons')
                    </div>
                </div>
            </div>
            <table class="table datatable-responsive" id="data-table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Route</th>
                    <th>Position</th>
                    <th>Icon</th>
                    <th>Status</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                    @if($module->count() > 0)
                        @foreach($module as $mod)
                            <tr>
                                <td>{{$mod->name}}</td>
                                <td>{{$mod->route_name}}</td>
                                <td>{{$mod->position}}</td>
                                <td>{!! $mod->icon !!}</td>
                                <td>{{$mod->status}}</td>
                                <td class="text-center">{!! $mod->action_buttons!!}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            {{ $module->links() }}
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('admin/plugins/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/js/plugins/notifications/sweet_alert.min.js') }}"></script>
@endpush
