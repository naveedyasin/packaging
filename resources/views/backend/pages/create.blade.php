@extends('backend.app')
@section('template_title', 'Add Page')
@section('header', 'Page')
@section('content')
    <form action="{{route('admin.page.store')}}" method="POST" class="form-validate-jquery">
        @csrf
    <div class="row">
        @includeIf('backend.pages.partials.form')
    </div>
    </form>
@endsection
