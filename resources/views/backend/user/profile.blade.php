@extends('backend.app')
@section('template_title', 'My Profile')
@section('header', 'Profile')
@section('content')
    <div class="content pt-0">
        <div class="d-md-flex align-items-md-start">
            <div
                class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-left wmin-300 border-0 shadow-0 sidebar-expand-md">

                <!-- Sidebar content -->
                <div class="sidebar-content">

                    <!-- Navigation -->
                    <div class="card">
                        <div class="card-body bg-indigo-400 text-center card-img-top"
                             style="background-image: url({{asset('admin/plugins/images/backgrounds/panel_bg.png') }}); background-size: contain;">
                            <div class="card-img-actions d-inline-block mb-3">
                                <img class="img-fluid rounded-circle"
                                     src="{{asset('admin/plugins/images/demo/users/face11.jpg')}}"
                                     width="170" height="170" alt="">
                            </div>
                            <h6 class="font-weight-semibold mb-0">{{auth()->user()->full_name}}</h6>
                        </div>
                        <div class="card-body p-0">
                            <ul class="nav nav-sidebar mb-2">
                                <li class="nav-item-header">Profile information</li>
                                <li class="nav-item">
                                    <a href="#"
                                       class="nav-link active">
                                        Email
                                        <span
                                            class="font-size-sm font-weight-normal opacity-75 ml-auto">{{$user->email}}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#"
                                       class="nav-link">
                                        Status
                                        <span
                                            class="font-size-sm font-weight-normal opacity-75 ml-auto">{{$user->status}}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Last Login
                                        <span
                                            class="font-size-sm font-weight-normal opacity-75 ml-auto">{{$user->last_login}}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Login IP
                                        <span
                                            class="font-size-sm font-weight-normal opacity-75 ml-auto">{{$user->login_ip}}</span>
                                    </a>
                                </li>
                                <li class="nav-item-divider"></li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link"
                                       onclick="event.preventDefault();
                                                document.querySelector('#admin-logout-form').submit();">
                                        <i class="icon-switch2"></i>
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /navigation -->
                </div>
                <!-- /sidebar content -->
            </div>
            <!-- Right content -->
            <div class="tab-content w-100">
                <div class="tab-pane fade active show" id="profile">
                    <!-- Profile info -->
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h5 class="card-title">Profile setting</h5>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>
                                    <a class="list-icons-item" data-action="reload"></a>
                                    <a class="list-icons-item" data-action="remove"></a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{route('admin.profile.update', auth()->user()->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>First name</label>
                                            <input type="text" value="{{$user->first_name}}"
                                                   class="form-control" name="first_name">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Last name</label>
                                            <input type="text" value="{{$user->last_name}}"
                                                   class="form-control" name="last_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Update profile
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /profile info -->
                    <!-- Account settings -->
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h5 class="card-title">Account settings</h5>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>
                                    <a class="list-icons-item" data-action="reload"></a>
                                    <a class="list-icons-item" data-action="remove"></a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{route('admin.password.update', auth()->user()->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Email</label>
                                            <input type="text" value="{{$user->email}}" readonly="readonly"
                                                   class="form-control" disabled>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Current password</label>
                                            <input type="password" name="old_password"
                                                   class="form-control" placeholder="Enter old password">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>New password</label>
                                            <input type="password" placeholder="Enter new password"
                                                   class="form-control" name="password">
                                        </div>

                                        <div class="col-md-6">
                                            <label>Repeat password</label>
                                            <input type="password" placeholder="Repeat new password"
                                                   class="form-control" name="password_confirmation">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Update password
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /account settings -->
                </div>
            </div>
            <!-- /right content -->

        </div>
    </div>
@endsection
@push('scripts')
@endpush
