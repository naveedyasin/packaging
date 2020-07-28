@extends('backend.app')
@section('template_title', 'User Detail')
@section('header', 'User Detail')
@section('content')
    <div class="content pt-0">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">User Detail <a href="{{route('admin.user.index')}}" class="btn btn-default">Back</a></h5>
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
                            First Name
                            <span class="ml-auto">{{ $user->first_name }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link">
                            Last Name
                            <span class="ml-auto">{{ $user->last_name }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link">
                            Email
                            <span class="ml-auto">{{ $user->email }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link">
                            Roles
                            @if($user->roles->count() > 0)
                                <span class="ml-auto">
                                    @foreach($user->roles as $role)
                                        <span class="badge badge-success">{{ $role->name }}</span>
                                    @endforeach
                                </span>
                            @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link">
                            Permissions
                            @if($user->adminPermissions->count() > 0)
                                <span class="ml-auto">
                                    @foreach($user->adminPermissions as $permission)
                                        <span class="badge badge-success">{{ $permission->name }}</span>
                                    @endforeach
                                </span>
                            @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link">
                            Status
                            <span class="ml-auto">{{ $user->is_active ? 'Active' : 'In-active' }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link">
                            Created By
                            <span class="ml-auto">{{$user->created_by_name}}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link">
                            Updated By
                            <span class="ml-auto">{{$user->updated_by_name}}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link">
                            Last Login
                            <span class="ml-auto">
                                @if($user->last_login )
                                    {{ $user->last_login }}
                                @endif
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link">
                            Login IP
                            <span class="ml-auto">{{ $user->login_ip }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link">
                            Created At
                            <span class="ml-auto">
                                @if($user->created_at )
                                    {{ $user->created_at->format('d F Y H:i:s') }}
                                @endif
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link">
                            Updated At
                            <span class="ml-auto">
                                @if($user->updated_at )
                                    {{ $user->updated_at->format('d F Y H:i:s') }}
                                @endif
                            </span>
                        </a>
                    </li>
                </div>
            </div>
        </div>
    </div>
@endsection
