@extends('backend.app')
@section('template_title', 'Deleted Permissions')
@section('header', 'Deleted Permissions')
@section('content')
<div class="content pt-0">
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">All Deleted Permissions </h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>
        <table class="table datatable-responsive" id="data-table">
            <thead>
            <tr>
                <th>
                    Name
                </th>
                <th>
                    Slug
                </th>
                <th>
                    Description
                </th>
                <th>
                    Roles
                </th>
                <th>
                    Created At
                </th>
                <th>
                    Updated At
                </th>
                <th>
                    Deleted At
                </th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            <tfoot>
            </tfoot>
        </table>
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
    @includeIf('backend.scripts.datatable-config')
    <script>
        $(function() {
            $('#data-table').DataTable({
                ajax: {
                    url: '{{ route("admin.deleted.permission.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'slug', name: 'slug'},
                    {data: 'description', name: 'description'},
                    {data: 'roles', name: 'roles'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'deleted_at', name: 'deleted_at'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
            });
        });
    </script>
@endpush
