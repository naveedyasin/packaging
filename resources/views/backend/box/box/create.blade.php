@extends('backend.app')
@section('template_title', 'Add Box')
@section('header', 'Box')
@section('content')
    <form action="{{route('admin.box.store')}}" method="POST" class="form-validate-jquery" enctype="multipart/form-data">
        @csrf
    <div class="row">
        @includeIf('backend.box.box.partials.form')
    </div>
    </form>
@endsection
