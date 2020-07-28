@extends('backend.app')
@section('template_title', 'Add Email')
@section('header', 'Email')
@section('content')
    <form action="{{route('admin.email.store')}}" method="POST" class="form-validate-jquery">
        @csrf
    <div class="row">
        @includeIf('backend.email.partials.form')
    </div>
    </form>
@endsection
