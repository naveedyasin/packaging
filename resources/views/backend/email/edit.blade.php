@extends('backend.app')
@section('template_title', 'Edit Email')
@section('header', 'Email')
@section('content')
    <form action="{{route('admin.email.update', $id)}}" method="POST" class="form-validate-jquery">
        @method('PUT')
        @csrf
    <div class="row">
        @includeIf('backend.email.partials.form')
    </div>
    </form>
@endsection
