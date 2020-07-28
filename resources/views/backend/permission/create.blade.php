@extends('backend.app')
@section('template_title', 'Add Permission')
@section('content')
    <div class="row">
        <div class="col-md-6">

            <!-- Basic layout-->
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Basic layout</h5>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="reload"></a>
                            <a class="list-icons-item" data-action="remove"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{route('admin.permission.store')}}" method="POST" class="form-validate-jquery">
                        @csrf
                        @includeIf('backend.permission.partials.permission-form')
                    </form>
                </div>
            </div>
            <!-- /basic layout -->
        </div>
    </div>
@endsection
