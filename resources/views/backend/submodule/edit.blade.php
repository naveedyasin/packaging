@extends('backend.app')
@section('template_title', 'Edit Sub Module')
@section('header', 'Sub Modules')
@section('content')
    <div class="row">
        <div class="col-md-12">

            <!-- Basic layout-->
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Edit Sub Module</h5>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="reload"></a>
                            <a class="list-icons-item" data-action="remove"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{route('admin.sub-module.update', $id)}}" method="POST" class="form-validate-jquery">
                        @method('PUT')
                        @includeIf('backend.submodule.partials.form')
                    </form>
                </div>
            </div>
            <!-- /basic layout -->
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('admin/plugins/js/plugins/forms/validation/validate.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/js/demo_pages/form_validation.js') }}"></script>
    <script src="{{ asset('admin/plugins/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/js/plugins/forms/styling/uniform.min.js') }}"></script>
@endpush
