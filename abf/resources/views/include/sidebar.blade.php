<div class="app-sidebar colored">

    <div class="sidebar-header">

        <a class="header-brand" href="{{ route('dashboard') }}">

            <div class="logo-img d-flex">

                <img height="30" src="{{ asset('img/logo.png') }}" class="header-brand-img" title="ABF"><h5 class="text-white py-1 px-1">ABF Studios</h5>

            </div>

        </a>

        <div class="sidebar-action"><i class="ik ik-arrow-left-circle"></i></div>

        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>

    </div>



    @php

        $segment1 = request()->segment(1);

        $segment2 = request()->segment(2);

        $segment3 = request()->segment(3);

    @endphp



    <div class="sidebar-content">

        <div class="nav-container">

            <nav id="main-menu-navigation" class="navigation-main">

                <div class="nav-item {{ $segment2 == 'dashboard' ? 'active' : '' }}">

                    <a href="{{ route('dashboard') }}"><i

                            class="ik ik-bar-chart-2"></i><span>{{ __('Dashboard') }}</span></a>

                </div>



                <div

                    class="nav-item {{ $segment2 == 'home' ? 'active open' : '' }} has-sub">

                    <a href="javascript:void(0)"><i class="ik ik-box"></i><span>{{ __('Home') }}</span></a>

                    <div class="submenu-content">

                        <a href="{{ route('home-banner-list') }}"

                            class="menu-item {{ $segment2 == 'home' ? 'active' : '' }}">{{ __('Banner') }}</a>

                    </div>

                </div>

                <div

                    class="nav-item {{ $segment2 == 'testimonial' ? 'active open' : '' }} has-sub">

                    <a href="javascript:void(0)"><i class="ik ik-box"></i><span>{{ __('Testimonial') }}</span></a>

                    <div class="submenu-content">

                        <a href="{{ route('testimonial-list') }}"

                            class="menu-item {{ $segment2 == 'testimonial' ? 'active' : '' }}">{{ __('List Testimonial') }}</a>

                    </div>

                </div>

                <div

                    class="nav-item {{ $segment2 == 'portfolio' ? 'active open' : '' }} has-sub">

                    <a href="javascript:void(0)"><i class="ik ik-box"></i><span>{{ __('Portfolio') }}</span></a>

                    <div class="submenu-content">

                        <a href="{{ route('port-cat-list') }}"

                            class="menu-item {{ $segment3 == 'category' ? 'active' : '' }}">{{ __('Portfolio Category') }}</a>

                        <a href="{{ route('port-list') }}"

                            class="menu-item {{ $segment2 == 'portfolio' || $segment3 == 'list' ? 'active' : '' }}">{{ __('Portfolio') }}</a>

                        <a href="{{ route('port-detail-list') }}"

                            class="menu-item {{ $segment3 == 'detail' ? 'active' : '' }}">{{ __('Portfolio Details') }}</a>

                    </div>

                </div>

                <div

                    class="nav-item {{ $segment2 == 'inquiry' ? 'active open' : '' }} has-sub">

                    <a href="javascript:void(0)"><i class="ik ik-box"></i><span>{{ __('Inquiry') }}</span></a>

                    <div class="submenu-content">

                        <a href="{{ route('contact-list') }}"

                            class="menu-item {{ $segment3 == 'contact' ? 'active' : '' }}">{{ __('Contact') }}</a>

                        <a href="{{ route('career-list') }}"

                            class="menu-item {{ $segment3 == 'career' ? 'active' : '' }}">{{ __('Career') }}</a>

                    </div>

                </div>



                <div

                    class="nav-item {{ $segment2 == 'position' ? 'active open' : '' }} has-sub">

                    <a href="javascript:void(0)"><i class="ik ik-box"></i><span>{{ __('Position') }}</span></a>

                    <div class="submenu-content">

                        <a href="{{ route('position-list') }}"

                            class="menu-item {{ $segment2 == 'position' ? 'active' : '' }}">{{ __('Position') }}</a>

                    </div>

                </div>



                <div

                    class="nav-item {{ $segment2 == 'service' ? 'active open' : '' }} has-sub">

                    <a href="javascript:void(0)"><i class="ik ik-box"></i><span>{{ __('Services') }}</span></a>

                    <div class="submenu-content">

                        <a href="{{ route('service-list') }}"

                            class="menu-item {{ $segment2 == 'service' || $segment3 == 'list' ? 'active' : '' }}">{{ __('Services') }}</a>

                        <a href="{{ route('service-detail-list') }}"

                            class="menu-item {{ $segment3 == 'detail' ? 'active' : '' }}">{{ __('Service Detail') }}</a>

                    </div>

                </div>

                <div

                    class="nav-item {{ $segment2 == 'blog' ? 'active open' : '' }} has-sub">

                    <a href="javascript:void(0)"><i class="ik ik-box"></i><span>{{ __('Blogs') }}</span></a>

                    <div class="submenu-content">

                        <a href="{{ route('blog-list') }}" class="menu-item {{ $segment2 == 'blog' ? 'active' : '' }}">{{ __('List Blogs') }}</a>

                    </div>

                </div>

                <div

                    class="nav-item {{ $segment2 == 'team' ? 'active open' : '' }} has-sub">

                    <a href="javascript:void(0)"><i class="ik ik-box"></i><span>{{ __('Team') }}</span></a>

                    <div class="submenu-content">

                        <a href="{{ route('team-list') }}" class="menu-item {{ $segment2 == 'team' ? 'active' : '' }}">{{ __('List Team') }}</a>

                    </div>

                </div>



                @if (false)

                <div

                    class="nav-item {{ $segment1 == 'admin-home' || $segment1 == 'buttons' || $segment1 == 'badges' || $segment1 == 'navigation' ? 'active open' : '' }} has-sub">

                    <a href="#"><i class="ik ik-box"></i><span>{{ __('Products') }}</span></a>

                    <div class="submenu-content">

                        <a href="{{ url('productcategory/list') }}"

                            class="menu-item {{ $segment1 == 'admin-home' ? 'active' : '' }}">{{ __('Product Category') }}</a>

                        <a href="{{ url('product/list') }}"

                            class="menu-item {{ $segment1 == 'admin-home' ? 'active' : '' }}">{{ __('Product') }}</a>

                        <a href="{{ url('productdetails/list') }}"

                            class="menu-item {{ $segment1 == 'admin-home' ? 'active' : '' }}">{{ __('Product Details') }}</a>

                    </div>

                </div>

                <div

                    class="nav-item {{ $segment1 == 'admin-home' || $segment1 == 'buttons' || $segment1 == 'badges' || $segment1 == 'navigation' ? 'active open' : '' }} has-sub">

                    <a href="#"><i class="ik ik-box"></i><span>{{ __('Contact') }}</span></a>

                    <div class="submenu-content">

                        <a href="{{ url('contact/list') }}"

                            class="menu-item {{ $segment1 == 'admin-home' ? 'active' : '' }}">{{ __('List') }}</a>

                    </div>

                </div>

                @endif

        </div>

    </div>

</div>

