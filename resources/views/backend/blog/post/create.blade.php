@extends('backend.app')
@section('template_title', 'Add Post')
@section('header', 'Post')
@section('content')
    <form action="{{route('admin.post.store')}}" method="POST" class="form-validate-jquery" enctype="multipart/form-data">
        @csrf
    <div class="row">
        @includeIf('backend.blog.post.partials.form')
    </div>
    </form>
@endsection
