<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">


                <div class="sb-sidenav-menu-heading">Core</div>


                <a class="nav-link @if (isset($page_slug) && $page_slug == 'dashboard'|| $page_slug == 'seller_profile') active @endif" href="{{ route('seller.dashboard') }}">
                    <div class="sb-nav-link-icon"><i class='bx bxs-grid-alt'></i></div>
                    {{ __('Dashboard') }}
                </a>
                <a class="nav-link @if (isset($page_slug) && $page_slug == 'brand'|| $page_slug == 'brand') active @endif" href="{{ route('seller.pm.brand.index') }}">
                    <div class="sb-nav-link-icon"><i class='bx bxs-grid-alt'></i></div>
                    {{ __('brand') }}
                </a>

                {{-- Single Item --}}
                {{-- <a class="nav-link @if (isset($page_slug) && $page_slug == '') active @endif"
                    href="">
                    <div class="sb-nav-link-icon"><i class='bx bxs-grid-alt'></i></div>
                    {{__('Single Item')}}
                </a> --}}

                {{-- Multi Items --}}
                <a class="nav-link @if (isset($page_slug) && ($page_slug == '' || $page_slug == '' || $page_slug == '')) active @else collapsed @endif" href="#"
                    data-bs-toggle="collapse" data-bs-target="#multi_items"
                    aria-expanded="@if (isset($page_slug) && ($page_slug == '' || $page_slug == '' || $page_slug == '')) true
                    @else
                    false @endif"
                    aria-controls="multi_items">
                    <div class="sb-nav-link-icon"><i class='bx bxs-grid-alt'></i></div>
                    {{ __('Multi Items') }}
                    <div class="sb-sidenav-collapse-arrow"><i class='bx bx-chevron-down'></i></div>
                </a>
                <div class="collapse @if (isset($page_slug) && ($page_slug == '' || $page_slug == '' || $page_slug == '')) show @endif" id="multi_items"
                    aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link @if (isset($page_slug) && $page_slug == '') active @endif" href="">
                            <div class="sb-nav-link-icon"><i class='bx bxs-grid-alt'></i></div>
                            {{ __('Item 1') }}
                        </a>
                        <a class="nav-link @if (isset($page_slug) && $page_slug == '') active @endif" href="">
                            <div class="sb-nav-link-icon"><i class='bx bxs-grid-alt'></i></div>
                            {{ __('Item 2') }}
                        </a>
                        <a class="nav-link @if (isset($page_slug) && $page_slug == '') active @endif" href="">
                            <div class="sb-nav-link-icon"><i class='bx bxs-grid-alt'></i></div>
                            {{ __('Item 3') }}
                        </a>


                        {{-- product Management --}}


                    </nav>
                </div>


                {{-- Product Management --}}

            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div>
    </nav>
</div>
