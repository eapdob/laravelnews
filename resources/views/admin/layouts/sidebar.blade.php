<div class="navbar-bg"></div>

<!-- Navbar Start -->
@include('admin.layouts.navbar')
<!-- Navbar End -->

<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">{{ __('admin.dashboard') }}</li>
            <li class="active">
                <a href="#" class="nav-link"><i class="fas fa-fire"></i><span>{{ __('admin.dashboard') }}</span></a>
            </li>
            <li class="menu-header">Starter</li>
            <li><a class="nav-link" href="{{ route('admin.category.index') }}"><i class="far fa-square"></i>
                    <span>{{ __('admin.categories') }}</span></a></li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i>
                    <span>{{ __('admin.news') }}</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.news.index') }}">{{ __('admin.all_news') }}</a></li>
                </ul>
            </li>
            <li><a class="nav-link" href="{{ route('admin.home-section-setting') }}"><i class="far fa-square"></i>
                    <span>{{ __('admin.home_section_setting') }}</span></a></li>
            <li><a class="nav-link" href="{{ route('admin.language.index') }}"><i class="far fa-square"></i>
                    <span>{{ __('admin.languages') }}</span></a></li>
        </ul>
    </aside>
</div>
