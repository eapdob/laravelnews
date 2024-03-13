<nav class="navbar navbar-expand-lg main-navbar">
    <ul class="navbar-nav navbar-right mr-auto">
        <li class="dropdown dropdown-custom-menu">
            <a href="javascript:void(0);" class="nav-link nav-link-lg custom-mobile-menu">
                <i class="fas fa-list"></i>
            </a>
        </li>
    </ul>
    <ul class="navbar-nav navbar-right ml-auto">
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ asset('admin/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">{{ __('admin.Hi') }}, {{ Auth::guard('admin')->user()->name }}
                    !
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('admin.profile.index') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> {{ __('admin.Profile') }}
                </a>
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <a href="#" onclick="event.preventDefault();
                                        this.closest('form').submit();" class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> {{ __('admin.Logout') }}
                    </a>
                </form>
            </div>
        </li>
    </ul>
</nav>
