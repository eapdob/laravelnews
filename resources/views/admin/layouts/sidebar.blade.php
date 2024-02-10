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
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="fas fa-fire"></i><span>{{ __('admin.dashboard') }}</span>
                </a>
            </li>
            <li class="menu-header">Starter</li>
            <li>
                <a class="nav-link" href="{{ route('admin.category.index') }}">
                    <i class="far fa-square"></i>
                    <span>{{ __('admin.categories') }}</span>
                </a>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown">
                    <i class="far fa-file-alt"></i>
                    <span>{{ __('admin.news') }}</span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{ route('admin.news.index') }}">
                            {{ __('admin.all_news') }}
                        </a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i>
                    <span>{{ __('admin.pages') }}</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.about.index') }}">{{ __('admin.about_page') }}</a>
                    </li>
                    <li><a class="nav-link" href="{{ route('admin.contact.index') }}">{{ __('admin.contact_page') }}</a>
                    </li>
                    <li><a class="nav-link" href="forms-validation.html">Validation</a></li>
                </ul>
            </li>
            <li>
                <a class="nav-link" href="{{ route('admin.social-count.index') }}">
                    <i class="far fa-square"></i>
                    <span>{{ __('admin.social_count') }}</span>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('admin.ad.index') }}">
                    <i class="far fa-square"></i>
                    <span>{{ __('admin.advertisement') }}</span>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('admin.home-section-setting') }}">
                    <i class="far fa-square"></i>
                    <span>{{ __('admin.home_section_setting') }}</span>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('admin.language.index') }}">
                    <i class="far fa-square"></i>
                    <span>{{ __('admin.languages') }}</span>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('admin.subscriber.index') }}">
                    <i class="far fa-square"></i>
                    <span>{{ __('admin.subscribers') }}</span></a>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i>
                    <span>{{ __('admin.footer_setting') }}</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{ route('admin.social-link.index') }}">
                            {{ __('admin.social_links') }}
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('admin.footer-info.index') }}">
                            {{ __('admin.footer_info') }}
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('admin.footer-grid-one.index') }}">
                            {{ __('admin.footer_grid_one') }}
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('admin.footer-grid-two.index') }}">
                            {{ __('admin.footer_grid_two') }}
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('admin.footer-grid-three.index') }}">
                            {{ __('admin.footer_grid_three') }}
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
