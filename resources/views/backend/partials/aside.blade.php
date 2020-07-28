<div class="sidebar sidebar-light sidebar-main sidebar-expand-md">

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="index.html#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        Navigation
        <a href="index.html#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->
{{--    @php--}}
{{--    dd(request()->segment(2))--}}
{{--    @endphp--}}
    <!-- Sidebar content -->
    <div class="sidebar-content">
        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">
{{--                nav-item-open--}}
                <!-- Main -->
                <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
                @if(count($modules))
                    @foreach($modules as $module)
                        @if(hasPermissions($module->route_name))
                            <li class="nav-item @if($module->sub_modules->count() > 0) nav-item-submenu @endif @if(stristr($module->route_name, request()->segment(2))) nav-item-expanded nav-item-open @endif">
                                <a href="{{ !empty($module->route_name) ? route($module->route_name) : ''}}" class="nav-link {{Route::getCurrentRoute()->getName() == $module->route_name ? 'active' : ''}}">{!! $module->icon !!} <span>{{$module->name}}</span></a>
                                @if($module->sub_modules->count() > 0)
                                    <ul class="nav nav-group-sub" data-submenu-title="Posts">
                                        @foreach($module->sub_modules as $sm)
                                            @if(hasPermissions($sm->route))
                                            <li class="nav-item"><a href="{{ route($sm->route) }}" class="nav-link {{Route::getCurrentRoute()->getName() == $sm->route ? 'active' : ''}}">{{$sm->name}}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endif
                    @endforeach
                @endif
                {{--<li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-copy"></i> <span>Posts</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Posts">
                        <li class="nav-item"><a href="{{ route('admin.post.index') }}" class="nav-link active">All Posts</a></li>
                        <li class="nav-item"><a href="{{ route('admin.post.create') }}" class="nav-link">Add New</a></li>
                        <li class="nav-item"><a href="{{ route('admin.category.index') }}" class="nav-link">Categories</a></li>
                        <li class="nav-item"><a href="{{ route('admin.tag.index') }}" class="nav-link">Tags</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-color-sampler"></i> <span>Pages</span></a>

                    <ul class="nav nav-group-sub" data-submenu-title="Pages">
                        <li class="nav-item"><a href="{{route('admin.page.index')}}" class="nav-link">All Pages</a></li>
                        <li class="nav-item"><a href="{{route('admin.page.create')}}" class="nav-link">Add New</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-envelop"></i> <span>Emails</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Emails">
                        <li class="nav-item"><a href="{{route('admin.email.index')}}" class="nav-link">All Emails</a></li>
                        <li class="nav-item"><a href="{{route('admin.email.create')}}" class="nav-link">Add New</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="icon-comments"></i>
                        <span> Comments </span>
                    </a>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="index.html#" class="nav-link"><i class="icon-color-sampler"></i> <span>Access</span></a>

                    <ul class="nav nav-group-sub" data-submenu-title="Access">
                        <li class="nav-item"><a href="{{route('admin.permission.index')}}" class="nav-link">View Permissions</a></li>
                        <li class="nav-item"><a href="{{route('admin.role.index')}}" class="nav-link">View Roles</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="index.html#" class="nav-link"><i class="icon-color-sampler"></i> <span>Users</span></a>

                    <ul class="nav nav-group-sub" data-submenu-title="Users">
                        <li class="nav-item"><a href="{{route('admin.user.index')}}" class="nav-link">All Users</a></li>
                        <li class="nav-item"><a href="{{route('admin.user.create')}}" class="nav-link">Add New</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.settings')}}" class="nav-link"><i class="icon-cog2"></i> <span>Settings</span></a>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="index.html#" class="nav-link"><i class="icon-color-sampler"></i> <span>Modules</span></a>

                    <ul class="nav nav-group-sub" data-submenu-title="Module">
                        <li class="nav-item"><a href="{{route('admin.module.index')}}" class="nav-link">View Modules</a></li>
                        <li class="nav-item"><a href="{{route('admin.module.create')}}" class="nav-link">Add Module</a></li>
                        <li class="nav-item"><a href="{{route('admin.sub-module.index')}}" class="nav-link">View Sub Modules</a></li>
                        <li class="nav-item"><a href="{{route('admin.sub-module.create')}}" class="nav-link">Add Sub Module</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="changelog.html" class="nav-link">
                        <i class="icon-list-unordered"></i>
                        <span>logs</span>
                    </a>
                </li>--}}
            </ul>
        </div>
        <!-- /main navigation -->
    </div>
    <!-- /sidebar content -->
</div>
