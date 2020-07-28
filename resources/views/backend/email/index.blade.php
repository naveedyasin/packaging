@extends('backend.app')
@section('template_title', 'Emails')
@section('header', 'Emails')
@section('content')
    <div class="content pt-0">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">All Emails</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                @include('backend.email.partials.header-buttons')
                            </div>
                        </div>
                    </div>
                    <table class="table datatable-responsive" id="data-table">
                        <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Email Reference</th>
                            <th>Purpose</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <td>Subject</td>
                                <td>Email Reference</td>
                                <td>Purpose</td>
                                <td>Status</td>
                                <td>Actions</td>
                            </tr>
                        </tfoot>
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
            $('#data-table').DataTable({
                ajax: {
                    url: '{{ route("admin.email.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'subject', name: 'subject'},
                    {data: 'email_reference', name: 'email_reference'},
                    {data: 'purpose', name: 'purpose'},
                    {data: 'active', name: 'active'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
            });
        });
    </script>
@endpush
