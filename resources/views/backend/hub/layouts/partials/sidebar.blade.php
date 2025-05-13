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
            {{-- <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false"> --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
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
                                Level
                                <i class="bi bi-chevron-down float-end"></i>
                            </p>
                        </a>
                        <ul class="collapse ps-3" id="level1Menu">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="bi bi-dot"></i>
                                    Level 1 - Item 1
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="bi bi-dot"></i>
                                    Level 1 - Item 2
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                

            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
