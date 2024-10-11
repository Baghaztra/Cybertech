@php
    $menus = [
        ['label' => 'Dashboard', 'route' => '/admin/dashboard', 'icon' => 'fas fa-home'],
        ['label' => 'Events', 'route' => '/admin/event', 'icon' => 'fas fa-calendar-alt'],
        ['label' => 'Posts', 'route' => '/admin/post', 'icon' => 'fas fa-newspaper'],
        ['label' => 'Divisions', 'route' => '/admin/division', 'icon' => 'fas fa-building'],
        ['label' => 'Highlight', 'route' => '/admin/highlight', 'icon' => 'fas fa-image'],
        ['label' => 'Users', 'route' => '/admin/user', 'icon' => 'fas fa-users'],
        ['label' => 'Form', 'route' => '/admin/form', 'icon' => 'fas fa-building'],
        // [
        //     'label' => 'Form',
        //     'route' => '#',
        //     'icon' => 'fas fa-building',
        //     'children' => [
        //         ['label' => 'Create Form', 'route' => '/admin/form', 'icon' => 'fas fa-building'],
        //         ['label' => 'Responden', 'route' => '/admin/responden', 'icon' => 'fas fa-building'],
        //     ],
        // ],
    ];

    // mengurutkan menu disamping tuhaa, berdasarkan label
    usort($menus, function ($a, $b) {
        return $a['label'] <=> $b['label'];
    });

@endphp


<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="#" class="logo">
                <img src={{ asset('assets/cyberlogo.png') }} style="width: 80px; height: 80px;" alt="navbar brand"
                    class="navbar-brand" height="20" />
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
                @foreach ($menus as $menu)
                    @php
                        // Cek apakah ada submenu yang aktif
                        $isActive = Request::is(ltrim($menu['route'], '/'));
                        if (isset($menu['children'])) {
                            foreach ($menu['children'] as $child) {
                                if (Request::is(ltrim($child['route'], '/'))) {
                                    $isActive = true; // Jika submenu aktif, setel menu utama jadi aktif
                                    break;
                                }
                            }
                        }
                    @endphp
                    <li class="nav-item {{ $isActive ? 'active' : '' }}">
                        <a href="{{ isset($menu['children']) ? $menu['route'] . $menu['label'] : $menu['route'] }}"
                            @if (isset($menu['children'])) data-bs-toggle="collapse" @endif>
                            <i class="{{ $menu['icon'] }}"></i>
                            <p>{{ $menu['label'] }}</p>
                            @if (isset($menu['children']))
                                <span class="caret"></span>
                            @endif
                        </a>

                        @if (isset($menu['children']))
                            <div class="collapse" id="{{ $menu['label'] }}">
                                <ul class="nav nav-collapse">
                                    @foreach ($menu['children'] as $submenu)
                                        <li class="{{ Request::is(ltrim($submenu['route'], '/')) ? 'active' : '' }}">
                                            <a href="{{ $submenu['route'] }}">
                                                <span class="sub-item">{{ $submenu['label'] }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

</div>
<!-- End Sidebar -->
