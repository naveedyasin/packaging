@extends('backend.app')
@section('template_title', 'Edit Post')
@section('header', 'Post')
@section('content')
    <form action="{{route('admin.post.update', $post->id)}}" method="POST" class="form-validate-jquery" enctype="multipart/form-data">
        @method('PUT')
        @csrf
    <div class="row">
        @includeIf('backend.blog.post.partials.form')
    </div>
    </form>
@endsection
