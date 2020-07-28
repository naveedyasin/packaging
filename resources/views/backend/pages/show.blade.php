@extends('backend.app')
@section('template_title', 'Page Detail')
@section('header', 'Page Detail')
@section('content')
    <div class="content pt-0">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Page Detail <a href="{{route('admin.page.index')}}" class="btn btn-default">Back</a></h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="nav nav-sidebar my-2">
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link">
                            Title
                            <span class="ml-auto">{{ $page->title }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link">
                            Last Name
                            <span class="ml-auto">{{ $page->slug }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link">
                            Contents
                            <span class="ml-auto">{{ $page->contents }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link">
                            Meta Title
                            <span class="ml-auto">{{ $page->meta_title }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link">
                            Meta Keywords
                            <span class="ml-auto">{{ $page->meta_keywords }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link">
                            Meta Description
                            <span class="ml-auto">{{ $page->meta_description }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link">
                            Status
                            <span class="ml-auto">{{ $page->status ? 'Active' : 'In-active' }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link">
                            Created By
                            <span class="ml-auto">{{$page->created_by_name}}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link">
                            Updated By
                            <span class="ml-auto">{{$page->updated_by_name}}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link">
                            Created At
                            <span class="ml-auto">
                                @if($page->created_at )
                                    {{ $page->created_at->format('d F Y H:i:s') }}
                                @endif
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link">
                            Updated At
                            <span class="ml-auto">
                                @if($page->updated_at )
                                    {{ $page->updated_at->format('d F Y H:i:s') }}
                                @endif
                            </span>
                        </a>
                    </li>
                </div>
            </div>
        </div>
    </div>
@endsection
