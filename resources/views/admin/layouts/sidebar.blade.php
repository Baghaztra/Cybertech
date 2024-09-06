<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="#" class="logo">
                <img src={{ asset('assets/cyberlogo.png') }} style="width: 80px; height: 80px;" alt="navbar brand" class="navbar-brand" height="20" />
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                    <a href="/admin/dashboard">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('admin/event') ? 'active' : '' }}">
                    <a href="admin/event">
                        <i class="fas fa-home"></i>
                        <p>Events</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('admin/post') ? 'active' : '' }}">
                    <a href="admin/post">
                        <i class="fas fa-newspaper"></i>
                        <p>Posts</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('admin/division') ? 'active' : '' }}">
                    <a href="{{ route('division.index') }}">
                        <i class="fas fa-newspaper"></i>
                        <p>Divisions</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('admin/user') ? 'active' : '' }}">
                    <a href={{ route('user.index') }}>
                        <i class="fas fa-users"></i>
                        <p>Users</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->