<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        @foreach($profile as $p)
            @if($p->user_id == auth()->user()->id)
                <div class="image">
                    <img src="{{asset('images/profile/100_100_'.$p->profile)}}" class="img-circle elevation-2" alt="User Image">
                </div>
            @endif
        @endforeach
        <div class="info">
            <a href="#" class="d-block">{{ucfirst(auth()->user()->name)}}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
{{--            Basic setup area--}}
            <li class="nav-header">Basic Setup</li>
            <li class="nav-item">
                <a href="{{route('backend.book.index')}}" class="nav-link">
                    <i class="nav-icon far fa-circle text-info"></i>
                    <p class="text">Book</p>
                </a>
            </li>
            @foreach($role->permissions as $permission)
                @if('backend.gender.index' == $permission->route)
                        <li class="nav-item">
                            <a href="{{route($permission->route)}}" class="nav-link">
                                <i class="nav-icon far fa-circle text-info"></i>
                                <p class="text">Gender</p>
                            </a>
                        </li>
                @endif
                @if('backend.setting.index' == $permission->route)
                    <li class="nav-item">
                        <a href="{{route($permission->route)}}" class="nav-link">
                            <i class="nav-icon far fa-circle text-info"></i>
                            <p class="text">Setting</p>
                        </a>
                    </li>
                @endif
            @endforeach
{{--            Basic setup end--}}
            <li>
                <hr>
            </li>
{{--            user management session--}}
            <li class="nav-header">User management</li>
            @foreach($role->permissions as $permission)


                @if('backend.user.index' == $permission->route)
                    <li class="nav-item">
                        <a href="{{route($permission->route)}}" class="nav-link">
                            <i class="nav-icon far fa-circle text-info"></i>
                            <p class="text">User</p>
                        </a>
                    </li>
                @endif
                @if('backend.role.index' == $permission->route)
                    <li class="nav-item">
                        <a href="{{route($permission->route)}}" class="nav-link">
                            <i class="nav-icon far fa-circle text-info"></i>
                            <p class="text">Role</p>
                        </a>
                    </li>
                @endif
                @if('backend.module.index' == $permission->route)
                    <li class="nav-item">
                        <a href="{{route($permission->route)}}" class="nav-link">
                            <i class="nav-icon far fa-circle text-info"></i>
                            <p class="text">Module</p>
                        </a>
                    </li>
                @endif
                @if('backend.permission.index' == $permission->route)
                    <li class="nav-item">
                        <a href="{{route($permission->route)}}" class="nav-link">
                            <i class="nav-icon far fa-circle text-info"></i>
                            <p class="text">Permission</p>
                        </a>
                    </li>
                @endif
                @if('backend.author.index' == $permission->route)
                    <li class="nav-item">
                        <a href="{{route($permission->route)}}" class="nav-link">
                            <i class="nav-icon far fa-circle text-info"></i>
                            <p class="text">Author</p>
                        </a>
                    </li>
                @endif
            @endforeach
            <li>
                <hr>
            </li>
            <li class="nav-header">Book Catalog</li>
            @foreach($role->permissions as $permission)
{{--            user management session ends--}}
{{--            book catalog --}}
                @if('backend.category.index' == $permission->route)
                    <li class="nav-item">
                        <a href="{{route($permission->route)}}" class="nav-link">
                            <i class="nav-icon far fa-circle text-info"></i>
                            <p class="text">Category</p>
                        </a>
                    </li>
                @endif
                @if('backend.subcategory.index' == $permission->route)
                    <li class="nav-item">
                        <a href="{{route($permission->route)}}" class="nav-link">
                            <i class="nav-icon far fa-circle text-info"></i>
                            <p class="text">Subcategory</p>
                        </a>
                    </li>
                @endif
                @if('backend.book.index' == $permission->route)
                    <li class="nav-item">
                        <a href="{{route($permission->route)}}" class="nav-link">
                            <i class="nav-icon far fa-circle text-info"></i>
                            <p class="text">Book</p>
                        </a>
                    </li>
                @endif
            @endforeach
            <li>
                <hr>
            </li>
            <li class="nav-header">Manage Profile</li>
            @foreach($role->permissions as $permission)
{{--            book catalog ends--}}
{{--            manage profile --}}
                @if('backend.profile.index' == $permission->route)
                    <li class="nav-item">
                        <a href="{{route($permission->route)}}" class="nav-link">
                            <i class="nav-icon far fa-circle text-info"></i>
                            <p class="text">General Info.</p>
                        </a>
                    </li>
                @endif
            @endforeach
            <li class="nav-item">
                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="nav-link">
                    <i class="nav-icon far fa-circle text-danger"></i>
                    <p class="text">Logout</p>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
{{--            manage profile ends--}}
            <li>
                <hr>
            </li>
            <li>
                <hr>
            </li>
            <li>
                <hr>
            </li>
            <li>
                <hr>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
