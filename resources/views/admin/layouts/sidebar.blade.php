<div class="navbar-bg"></div>

@include('admin.layouts.navbar')

<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">{{ __('Admin title') }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard') }}">{{ __('Admin title short') }}</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">{{ __('Dashboard') }}</li>
            <li class="active">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="fas fa-fire"></i><span>{{ __('Dashboard') }}</span>
                </a>
            </li>
            @if (canAccess(['category index', 'category create', 'category update', 'category delete']))
                <li class="{{ setSidebarActive(['admin.category.*']) }}">
                    <a class="nav-link" href="{{ route('admin.category.index') }}">
                        <i class="far fa-square"></i>
                        <span>{{ __('Categories') }}</span>
                    </a>
                </li>
            @endif
            @if (canAccess(['news index']))
                <li class="dropdown {{ setSidebarActive(['admin.news.*', 'admin.pending.news']) }}">
                    <a href="#" class="nav-link has-dropdown">
                        <i class="far fa-file-alt"></i>
                        <span>{{ __('News') }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="{{ setSidebarActive(['admin.news.*']) }}">
                            <a class="nav-link" href="{{ route('admin.news.index') }}">
                                {{ __('All news') }}
                            </a>
                        </li>
                        <li class="{{ setSidebarActive(['admin.pending.news']) }}">
                            <a class="nav-link" href="{{ route('admin.pending.news') }}">
                                {{ __('Pending news') }}
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
            @if (canAccess(['about index', 'contact index']))
                <li class="dropdown {{ setSidebarActive(['admin.about.*', 'admin.contact.*']) }}">
                    <a href="#" class="nav-link has-dropdown">
                        <i class="far fa-file-alt"></i>
                        <span>{{ __('Pages') }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        @if (canAccess(['about index']))
                            <li class="{{ setSidebarActive(['admin.about.*']) }}">
                                <a class="nav-link" href="{{ route('admin.about.index') }}">
                                    {{ __('About page') }}
                                </a>
                            </li>
                        @endif
                        @if (canAccess(['contact index']))
                            <li class="{{ setSidebarActive(['admin.contact.*']) }}">
                                <a class="nav-link" href="{{ route('admin.contact.index') }}">
                                    {{ __('Contact page') }}
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif
            @if (canAccess(['social count index']))
                <li class="{{ setSidebarActive(['admin.social-count.*']) }}">
                    <a class="nav-link" href="{{ route('admin.social-count.index') }}">
                        <i class="far fa-square"></i>
                        <span>{{ __('Social count') }}</span>
                    </a>
                </li>
            @endif
            @if (canAccess(['contact message index']))
                <li class="{{ setSidebarActive(['admin.contact-message.*']) }}">
                    <a class="nav-link" href="{{ route('admin.contact-message.index') }}">
                        <i class="far fa-square"></i>
                        <span>{{ __('Contact messages') }}</span>
                    </a>
                </li>
            @endif
            @if (canAccess(['advertisement index']))
                <li class="{{ setSidebarActive(['admin.ad.*']) }}">
                    <a class="nav-link" href="{{ route('admin.ad.index') }}">
                        <i class="far fa-square"></i>
                        <span>{{ __('Advertisement') }}</span>
                    </a>
                </li>
            @endif
            @if (canAccess(['home section index']))
                <li class="{{ setSidebarActive(['admin.home-section-setting']) }}">
                    <a class="nav-link" href="{{ route('admin.home-section-setting') }}">
                        <i class="far fa-square"></i>
                        <span>{{ __('Home section setting') }}</span>
                    </a>
                </li>
            @endif
            @if (canAccess(['languages index']))
                <li class="{{ setSidebarActive(['admin.language.*']) }}">
                    <a class="nav-link" href="{{ route('admin.language.index') }}">
                        <i class="far fa-square"></i>
                        <span>{{ __('Languages') }}</span>
                    </a>
                </li>
            @endif
            @if (canAccess(['subscribers index']))
                <li class="{{ setSidebarActive(['admin.subscriber.*']) }}">
                    <a class="nav-link" href="{{ route('admin.subscriber.index') }}">
                        <i class="far fa-square"></i>
                        <span>{{ __('Subscribers') }}</span>
                    </a>
                </li>
            @endif
            @if (canAccess(['footer index']))
                <li class="dropdown {{ setSidebarActive([
                        'admin.social-link.*',
                        'admin.footer-info.*',
                        'admin.footer-grid-one.*',
                        'admin.footer-grid-two.*',
                        'admin.footer-grid-three.*'
                        ]) }}">
                    <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i>
                        <span>{{ __('Footer setting') }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        @if (canAccess(['footer index', 'footer create', 'footer update', 'footer delete']))
                            <li class="{{ setSidebarActive(['admin.social-link.*']) }}">
                                <a class="nav-link" href="{{ route('admin.social-link.index') }}">
                                    {{ __('Social links') }}
                                </a>
                            </li>
                        @endif
                        @if (canAccess(['footer index', 'footer create']))
                            <li class="{{ setSidebarActive(['admin.footer-info.*']) }}">
                                <a class="nav-link" href="{{ route('admin.footer-info.index') }}">
                                    {{ __('Footer info') }}
                                </a>
                            </li>
                        @endif
                        @if (canAccess(['footer index', 'footer create', 'footer update', 'footer delete']))
                            <li class="{{ setSidebarActive(['admin.footer-grid-one.*']) }}">
                                <a class="nav-link" href="{{ route('admin.footer-grid-one.index') }}">
                                    {{ __('Footer grid one') }}
                                </a>
                            </li>
                        @endif
                        @if (canAccess(['footer index', 'footer create', 'footer update', 'footer delete']))
                            <li class="{{ setSidebarActive(['admin.footer-grid-two.*']) }}">
                                <a class="nav-link" href="{{ route('admin.footer-grid-two.index') }}">
                                    {{ __('Footer grid two') }}
                                </a>
                            </li>
                        @endif
                        @if (canAccess(['footer index', 'footer create', 'footer update', 'footer delete']))
                            <li class="{{ setSidebarActive(['admin.footer-grid-three.*']) }}">
                                <a class="nav-link" href="{{ route('admin.footer-grid-three.index') }}">
                                    {{ __('Footer grid three') }}
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif
            @if (canAccess(['access management index']))
                <li class="dropdown {{ setSidebarActive(['admin.role.*']) }}">
                    <a href="#" class="nav-link has-dropdown">
                        <i class="far fa-file-alt"></i>
                        <span>{{ __('Access management') }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="{{ setSidebarActive(['admin.role-user.*']) }}"><a class="nav-link"
                                                                                     href="{{ route('admin.role-users.index') }}">{{ __('Role users') }}</a>
                        </li>
                        <li class="{{ setSidebarActive(['admin.role.*']) }}">
                            <a class="nav-link"
                               href="{{ route('admin.role.index') }}">{{ __('Roles and permissions') }}</a>
                        </li>
                    </ul>
                </li>
            @endif
            @if (canAccess(['setting index']))
                <li class="{{ setSidebarActive(['admin.setting.*']) }}">
                    <a class="nav-link" href="{{ route('admin.setting.index') }}">
                        <i class="far fa-square"></i>
                        <span>{{ __('Settings') }}</span>
                    </a>
                </li>
            @endif
            <li class="dropdown
                {{ setSidebarActive([
                    'admin.frontend-localization.index',
                    'admin.admin-localization.index'
                ]) }}
            ">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i>
                    <span>{{ __('Localization') }}</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.frontend-localization.index']) }}">
                        <a class="nav-link" href="{{ route('admin.frontend-localization.index') }}">
                            <span>{{ __('Frontend lang') }}</span>
                        </a>
                    </li>
                    <li class="{{ setSidebarActive(['admin.admin-localization.index']) }}">
                        <a class="nav-link" href="{{ route('admin.admin-localization.index') }}">
                            <span>{{ __('Admin lang') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
