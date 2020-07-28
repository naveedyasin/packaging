@extends('backend.app')
@section('template_title', 'Edit Role')
@section('header', 'Roles')
@section('content')
    @section('header', 'Roles')
    <div class="content pt-0">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">All Roles </h5>
                <div class="header-elements">
                    <div class="list-icons">
                        @include('backend.role.partials.roles-header-buttons')
                    </div>
                </div>
            </div>
            <table class="table datatable-responsive" id="data-table">
                <thead>
                <tr>
                    <th scope="col">
                        Name
                    </th>
                    <th scope="col" class="hidden-xs ">
                        Description
                    </th>
                    <th scope="col">
                        Level
                    </th>
                    <th scope="col" class="hidden-xs hidden-sm">
                        Permissions
                    </th>
                    <th scope="col" class="hidden-xs hidden-sm ">
                        Created At
                    </th>
                    <th scope="col" class="hidden-xs hidden-sm ">
                        Update At
                    </th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
{{--                <tfoot>--}}
{{--                <tr>--}}
{{--                    <td>Display Name</td>--}}
{{--                    <td>Role</td>--}}
{{--                    <td>Created AT</td>--}}
{{--                    <td></td>--}}
{{--                </tr>--}}
{{--                </tfoot>--}}
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
                   url: '{{ route("admin.role.get") }}',
                   type: 'post'
               },
               columns: [
                   {data: 'name', name: 'name'},
                   {data: 'description', name: 'description'},
                   {data: 'level', name: 'level'},
                   {data: 'permissions', name: 'permissions'},
                   {data: 'created_at', name: 'created_at'},
                   {data: 'updated_at', name: 'updated_at'},
                   {data: 'actions', name: 'actions', searchable: false, sortable: false}
               ],
           });
       });
    </script>
@endpush
