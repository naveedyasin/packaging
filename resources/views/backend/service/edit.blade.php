@extends('backend.app')
@section('template_title', 'Edit Service')
@section('header', 'Service')
@section('content')
    <form action="{{route('admin.service.update', $id)}}" method="POST" class="form-validate-jquery" enctype="multipart/form-data">
        @method('PUT')
        @csrf
    <div class="row">
        @includeIf('backend.service.partials.form')
    </div>
    </form>
@endsection
