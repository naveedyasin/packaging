@extends('backend.app')
@section('template_title', 'Edit Page')
@section('header', 'Page')
@section('content')
    <form action="{{route('admin.page.update', $id)}}" method="POST" class="form-validate-jquery">
        @method('PUT')
        @csrf
    <div class="row">
        @includeIf('backend.pages.partials.form')
    </div>
    </form>
@endsection
