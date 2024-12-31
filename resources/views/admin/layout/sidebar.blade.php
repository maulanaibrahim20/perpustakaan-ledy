<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="index.html">
                <img src="{{ url('/admin') }}/images/brand/logo.png" class="header-brand-img desktop-logo" alt="logo">
                <img src="{{ url('/admin') }}/images/brand/logo-1.png" class="header-brand-img toggle-logo"
                    alt="logo">
                <img src="{{ url('/admin') }}/images/brand/logo-2.png" class="header-brand-img light-logo"
                    alt="logo">
                <img src="{{ url('/admin') }}/images/brand/logo-3.png" class="header-brand-img light-logo1"
                    alt="logo">
            </a>
            <!-- LOGO -->
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg></div>
            <ul class="side-menu">
                <li class="sub-category">
                    <h3>Main</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item {{ Request::segment(2) == 'dashboard' ? 'active' : '' }}"
                        data-bs-toggle="slide" href="{{ url('/admin/dashboard') }}"><i
                            class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Dashboard</span></a>
                </li>
                <li>
                    <a class="side-menu__item" href="widgets.html"><i class="side-menu__icon fe fe-grid"></i><span
                            class="side-menu__label">Widgets</span></a>
                </li>
                <li class="slide {{ Request::segment(2) == 'master' ? 'is-expanded' : '' }}">
                    <a class="side-menu__item {{ Request::segment(2) == 'master' ? 'active is-expanded' : '' }}"
                        data-bs-toggle="slide" href="javascript:void(0);"><i
                            class="side-menu__icon fe fe-database"></i><span class="side-menu__label">Master</span><i
                            class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu open">
                        <li class="side-menu-label1"><a href="javascript:void(0)">Components</a></li>
                        <li><a href="{{ url('/admin/master/book') }}"
                                class="slide-item {{ Request::segment(3) == 'book' ? 'active' : '' }}"> Book</a></li>
                    </ul>
                </li>
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg></div>
        </div>
    </aside>
</div>
