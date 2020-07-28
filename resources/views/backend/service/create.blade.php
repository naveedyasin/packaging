@extends('backend.app')
@section('template_title', 'Add Service')
@section('header', 'Service')
@section('content')
    <form action="{{route('admin.service.store')}}" method="POST" class="form-validate-jquery" enctype="multipart/form-data">
        @csrf
    <div class="row">
        @includeIf('backend.service.partials.form')
    </div>
    </form>
@endsection
