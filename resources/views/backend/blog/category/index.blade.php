@extends('backend.app')
@section('template_title', 'Users')
@section('header', 'Users')
@section('content')
    <div class="content pt-0">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">All Categories</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                @include('backend.blog.category.partials.category-header-buttons')
                            </div>
                        </div>
                    </div>
                    <table class="table datatable-responsive" id="data-table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Posts</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <td>Name</td>
                            <td>Slug</td>
                            <td>Description</td>
                            <td>Status</td>
                            <td>Created At</td>
                            <td></td>
                            <td></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
    </div>
    @include('backend.blog.category.partials.modal')
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
            $('.form-input-styled').uniform({
                fileButtonClass: 'action btn bg-warning-400'
            });
            $('#data-table').DataTable({
                ajax: {
                    url: '{{ route("admin.category.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'slug', name: 'slug'},
                    {data: 'description', name: 'description'},
                    {data: 'status', name: 'status'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'posts_count', name: 'posts_count', searchable: false},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                // buttons: [],
            });
        });
    </script>
@endpush
