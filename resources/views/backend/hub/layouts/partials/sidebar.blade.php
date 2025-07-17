<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="../index.html" class="brand-link">
            <!--begin::Brand Image-->
            <img src="{{ asset('backend/staff/dist/assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow" />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">AdminLTE 4</span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('staff.dashboard') }}" class="nav-link">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>

                </li>
                <ul class="nav flex-column">
                    <!-- Level 1 with dropdown -->
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#level1Menu" role="button"
                            aria-expanded="false" aria-controls="level1Menu">
                            <i class="nav-icon bi bi-circle-fill"></i>
                            <p>
                                Staff
                                <i class="bi bi-chevron-down float-end"></i>
                            </p>
                        </a>
                        <ul class="collapse ps-3" id="level1Menu">
                            <li class="nav-item">
                                <a href="{{ route('sm.staff.index') }}" class="nav-link">
                                    <i class="bi bi-dot"></i>
                                    Staff
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="bi bi-dot"></i>
                                    Level 2
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                {{-- <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">

                    <li class="nav-item  @if ($page_slug == 'dashboard') active @endif">
                        <a href="#">
                            <i class="nav-icon bi bi-speedometer"></i>
                            <p>{{ __('Dashboard') }}</p>
                        </a>
                    </li>
                    <li class="nav-item  @if ($page_slug == 'lavel' || $page_slug == 'lavel-1') active submenu @endif">
                        <a data-bs-toggle="collapse" href="#Lavel-1_management"
                            @if ($page_slug == 'seller') aria-expanded="true" @endif>
                            <i class="icon-people"></i>
                            <p>{{ __('Lavel') }}</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse @if ($page_slug == 'lavel' || $page_slug == 'lavel-1') show @endif" id="Lavel-1_management">
                            <ul class="nav nav-collapse">
                                <li class="@if ($page_slug == 'Lavel-1') active @endif">
                                    <a href="#">
                                        <span class="sub-item">{{ __('Lavel-1') }}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                </ul> --}}

            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
