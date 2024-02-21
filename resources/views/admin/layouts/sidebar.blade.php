<div class="navbar-bg"></div>

@include('admin.layouts.navbar')

<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">{{ __('admin.admin_title') }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard') }}">{{ __('admin.admin_title_short') }}</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">{{ __('admin.dashboard') }}</li>
            <li class="active">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="fas fa-fire"></i><span>{{ __('admin.dashboard') }}</span>
                </a>
            </li>
            @if (canAccess(['category index', 'category create', 'category update', 'category delete']))
                <li class="{{ setSidebarActive(['admin.category.*']) }}">
                    <a class="nav-link" href="{{ route('admin.category.index') }}">
                        <i class="far fa-square"></i>
                        <span>{{ __('admin.categories') }}</span>
                    </a>
                </li>
            @endif
            <li class="dropdown {{ setSidebarActive(['admin.news.*']) }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="far fa-file-alt"></i>
                    <span>{{ __('admin.news') }}</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.news.*']) }}">
                        <a class="nav-link" href="{{ route('admin.news.index') }}">
                            {{ __('admin.all_news') }}
                        </a>
                    </li>
                </ul>
            </li>
            <li class="dropdown {{ setSidebarActive(['admin.about.*', 'admin.contact.*']) }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="far fa-file-alt"></i>
                    <span>{{ __('admin.pages') }}</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.about.*']) }}">
                        <a class="nav-link" href="{{ route('admin.about.index') }}">
                            {{ __('admin.about_page') }}
                        </a>
                    </li>
                    <li class="{{ setSidebarActive(['admin.contact.*']) }}">
                        <a class="nav-link" href="{{ route('admin.contact.index') }}">
                            {{ __('admin.contact_page') }}
                        </a>
                    </li>
                </ul>
            </li>
            <li class="{{ setSidebarActive(['admin.social-count.*']) }}">
                <a class="nav-link" href="{{ route('admin.social-count.index') }}">
                    <i class="far fa-square"></i>
                    <span>{{ __('admin.social_count') }}</span>
                </a>
            </li>
            <li class="{{ setSidebarActive(['admin.contact-message.*']) }}">
                <a class="nav-link" href="{{ route('admin.contact-message.index') }}">
                    <i class="far fa-square"></i>
                    <span>{{ __('admin.contact_messages') }}</span>
                </a>
            </li>
            <li class="{{ setSidebarActive(['admin.ad.*']) }}">
                <a class="nav-link" href="{{ route('admin.ad.index') }}">
                    <i class="far fa-square"></i>
                    <span>{{ __('admin.advertisement') }}</span>
                </a>
            </li>
            <li class="{{ setSidebarActive(['admin.home-section-setting']) }}">
                <a class="nav-link" href="{{ route('admin.home-section-setting') }}">
                    <i class="far fa-square"></i>
                    <span>{{ __('admin.home_section_setting') }}</span>
                </a>
            </li>
            <li class="{{ setSidebarActive(['admin.language.*']) }}">
                <a class="nav-link" href="{{ route('admin.language.index') }}">
                    <i class="far fa-square"></i>
                    <span>{{ __('admin.languages') }}</span>
                </a>
            </li>
            <li class="{{ setSidebarActive(['admin.subscriber.*']) }}">
                <a class="nav-link" href="{{ route('admin.subscriber.index') }}">
                    <i class="far fa-square"></i>
                    <span>{{ __('admin.subscribers') }}</span>
                </a>
            </li>
            <li class="dropdown {{ setSidebarActive([
                    'admin.social-link.*',
                    'admin.footer-info.*',
                    'admin.footer-grid-one.*',
                    'admin.footer-grid-two.*',
                    'admin.footer-grid-three.*'
                    ]) }}">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i>
                    <span>{{ __('admin.footer_setting') }}</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.social-link.*']) }}">
                        <a class="nav-link" href="{{ route('admin.social-link.index') }}">
                            {{ __('admin.social_links') }}
                        </a>
                    </li>
                    <li class="{{ setSidebarActive(['admin.footer-info.*']) }}">
                        <a class="nav-link" href="{{ route('admin.footer-info.index') }}">
                            {{ __('admin.footer_info') }}
                        </a>
                    </li>
                    <li class="{{ setSidebarActive(['admin.footer-grid-one.*']) }}">
                        <a class="nav-link" href="{{ route('admin.footer-grid-one.index') }}">
                            {{ __('admin.footer_grid_one') }}
                        </a>
                    </li>
                    <li class="{{ setSidebarActive(['admin.footer-grid-two.*']) }}">
                        <a class="nav-link" href="{{ route('admin.footer-grid-two.index') }}">
                            {{ __('admin.footer_grid_two') }}
                        </a>
                    </li>
                    <li class="{{ setSidebarActive(['admin.footer-grid-three.*']) }}">
                        <a class="nav-link" href="{{ route('admin.footer-grid-three.index') }}">
                            {{ __('admin.footer_grid_three') }}
                        </a>
                    </li>
                </ul>
            </li>
            <li class="dropdown {{ setSidebarActive(['admin.role.*']) }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="far fa-file-alt"></i>
                    <span>{{ __('admin.access_management') }}</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.role-user.*']) }}"><a class="nav-link" href="{{ route('admin.role-users.index') }}">{{ __('admin.role_users') }}</a></li>
                    <li class="{{ setSidebarActive(['admin.role.*']) }}">
                        <a class="nav-link" href="{{ route('admin.role.index') }}">{{ __('admin.roles_and_permissions') }}</a>
                    </li>
                </ul>
            </li>
            <li class="{{ setSidebarActive(['admin.setting.*']) }}" >
                <a class="nav-link" href="{{ route('admin.setting.index') }}">
                    <i class="far fa-square"></i>
                    <span>{{ __('admin.settings') }}</span>
                </a>
            </li>
        </ul>
    </aside>
</div>
