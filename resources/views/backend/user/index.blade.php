@extends('backend.app')
@section('template_title', 'Users')
@section('header', 'Users')
@section('content')
    <div class="content pt-0">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">All Users </h5>
                <div class="header-elements">
                    <div class="list-icons">
                        @include('backend.user.partials.user-header-buttons')
                    </div>
                </div>
            </div>
            <table class="table datatable-responsive" id="data-table">
                <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Roles</th>
                    <th>Created AT</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <td>First Name</td>
                    <td>Last Name</td>
                    <td>Email</td>
                    <td>Status</td>
                    <td>Roles</td>
                    <td>Created AT</td>
                    <td></td>
                </tr>
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
                   url: '{{ route("admin.user.get") }}',
                   type: 'post'
               },
               columns: [
                   {data: 'first_name', name: 'first_name'},
                   {data: 'last_name', name: 'last_name'},
                   {data: 'email', name: 'email'},
                   {data: 'status', name: 'status'},
                   {data: 'roles', name: 'roles'},
                   {data: 'created_at', name: 'created_at'},
                   {data: 'actions', name: 'actions', searchable: false, sortable: false}
               ],
           });
       });
    </script>
@endpush
