@extends('backend.app')
@section('template_title', 'Service')
@section('header', 'Service')
@section('content')
    <div class="content pt-0">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">All Service</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                @include('backend.service.partials.header-buttons')
                            </div>
                        </div>
                    </div>
                    <table class="table datatable-responsive" id="data-table">
                        <thead>
                        <tr>
                            <th>Preview</th>
                            <th>Name</th>
                            <th>Active</th>
                            <th>Display On Front</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('admin/plugins/js/plugins/tables/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/js/plugins/tables/datatables/extensions/responsive.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/js/demo_pages/datatables_responsive.js') }}"></script>
    <script src="{{ asset('admin/plugins/js/plugins/tables/datatables/extensions/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/js/plugins/tables/datatables/extensions/buttons.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/js/plugins/notifications/sweet_alert.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/js/plugins/forms/styling/uniform.min.js') }}"></script>
    @includeIf('backend.scripts.datatable-config')
    <script>
        $(function() {
            // $('.form-input-styled').uniform({
            //     fileButtonClass: 'action btn bg-warning-400'
            // });
            $('#data-table').DataTable({
                ajax: {
                    url: '{{ route("admin.service.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'image', preview: 'image'},
                    {data: 'name', name: 'name'},
                    {data: 'active', name: 'active'},
                    {data: 'display_on_home', name: 'display_on_home'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                buttons: [],
            });
        });
    </script>
@endpush
