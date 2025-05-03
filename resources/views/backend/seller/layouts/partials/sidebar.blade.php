<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">


                <div class="sb-sidenav-menu-heading">Core</div>


                <a class="nav-link @if (isset($page_slug) && $page_slug == 'profile') active @endif" href="{{ route('seller.profile') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Profile
                </a>

                {{-- Single Item --}}
                {{-- <a class="nav-link @if (isset($page_slug) && $page_slug == '') active @endif"
                    href="">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    {{__('Single Item')}}
                </a> --}}

                {{-- Multi Items --}}
                {{-- <a class="nav-link @if (isset($page_slug) && ($page_slug == '' || $page_slug == '' || $page_slug == '')) active @else collapsed @endif" href="#"
                    data-bs-toggle="collapse" data-bs-target="#multi_items"
                    aria-expanded="@if (isset($page_slug) && ($page_slug == '' || $page_slug == '' || $page_slug == '')) true
                    @else
                    false @endif"
                    aria-controls="multi_items">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    {{ __('Multi Items') }}
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse @if (isset($page_slug) && ($page_slug == '' || $page_slug == '' || $page_slug == '')) show @endif" id="multi_items"
                    aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link @if (isset($page_slug) && $page_slug == '') active @endif"
                            href="">{{ __('Item 1') }}</a>
                        <a class="nav-link @if (isset($page_slug) && $page_slug == '') active @endif"
                            href="">{{ __('Item 2') }}</a>
                        <a class="nav-link @if (isset($page_slug) && $page_slug == '') active @endif"
                            href="">{{ __('Item 3') }}</a>
                    </nav>
                </div> --}}


            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div>
    </nav>
</div>
