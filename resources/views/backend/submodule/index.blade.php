@extends('backend.app')
@section('template_title', 'Sub Module')
@section('header', 'Sub Module')
@section('content')
    <div class="content pt-0">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">All Sub Module </h5>
                <div class="header-elements">
                    <div class="list-icons">
                        @include('backend.submodule.partials.header-buttons')
                    </div>
                </div>
            </div>
            <table class="table datatable-responsive" id="data-table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Module Name</th>
                    <th>Route</th>
                    <th>Position</th>
                    <th>Status</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                    @if($module->count() > 0)
                        @foreach($module as $mod)
                            <tr>
                                <td>{{$mod->name}}</td>
                                <td>{{$mod->module->name}}</td>
                                <td>{{$mod->route}}</td>
                                <td>{{$mod->position}}</td>
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
    <script src="{{ asset('admin/plugins/js/plugins/notifications/sweet_alert.min.js') }}"></script>
@endpush
