<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="{{ route('admin.dashboard') }}" class="logo">
                <div class="title_" style="line-height: 1; color: #fff;">
                    {{ config('app.short_name', 'KaiAdmin') }}
                </div>
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

                <li class="nav-item  @if ($page_slug == 'dashboard') active @endif">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="icon-chart"></i>
                        <p>{{ __('Dashboard') }}</p>
                    </a>
                </li>
                {{-- Admin Management Routes  --}}
                <li class="nav-item  @if ($page_slug == 'admin' || $page_slug == 'role' || $page_slug == 'permission') active submenu @endif">
                    <a data-bs-toggle="collapse" href="#admin_management"
                        @if ($page_slug == 'admin') aria-expanded="true" @endif>
                        <i class="icon-people"></i>
                        <p>{{ __('Admin Management') }}</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse @if ($page_slug == 'admin' || $page_slug == 'role' || $page_slug == 'permission') show @endif" id="admin_management">
                        <ul class="nav nav-collapse">
                            <li class="@if ($page_slug == 'admin') active @endif">
                                <a href="{{ route('am.admin.index') }}">
                                    <span class="sub-item">{{ __('Admin') }}</span>
                                </a>
                            </li>
                            <li class="@if ($page_slug == 'role') active @endif">
                                <a href="{{ route('am.role.index') }}">
                                    <span class="sub-item">{{ __('Role') }}</span>
                                </a>
                            </li>
                            <li class="@if ($page_slug == 'permission') active @endif">
                                <a href="{{ route('am.permission.index') }}">
                                    <span class="sub-item">{{ __('Permission') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- Seller Management  --}}
                <li class="nav-item  @if ($page_slug == 'seller' || $page_slug == 'seller_package') active submenu @endif">
                    <a data-bs-toggle="collapse" href="#seller_management"
                        @if ($page_slug == 'seller') aria-expanded="true" @endif>
                        <i class="icon-people"></i>
                        <p>{{ __('Seller Management') }}</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse @if ($page_slug == 'seller' || $page_slug == 'seller_package') show @endif" id="seller_management">
                        <ul class="nav nav-collapse">
                            <li class="@if ($page_slug == 'user') active @endif">
                                <a href="{{ route('sl.seller.index') }}">
                                    <span class="sub-item">{{ __('Seller') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- User Management  --}}
                <li class="nav-item  @if ($page_slug == 'user') active submenu @endif">
                    <a data-bs-toggle="collapse" href="#user_management"
                        @if ($page_slug == 'user') aria-expanded="true" @endif>
                        <i class="icon-people"></i>
                        <p>{{ __('User Management') }}</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse @if ($page_slug == 'user') show @endif" id="user_management">
                        <ul class="nav nav-collapse">
                            <li class="@if ($page_slug == 'user') active @endif">
                                <a href="{{ route('um.user.index') }}">
                                    <span class="sub-item">{{ __('User') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- Product Management --}}
                <li class="nav-item  @if ($page_slug == 'category' || $page_slug == 'subcategory' || $page_slug == 'subchildcategory' || $page_slug == 'brand' || $page_slug == 'product_attribute'|| $page_slug == 'tax_class'|| $page_slug == 'tax_rate') active submenu @endif">
                    <a data-bs-toggle="collapse" href="#product_management"
                        @if ($page_slug == 'category' || $page_slug == 'subcategory' || $page_slug == 'subchildcategory' || $page_slug == 'brand' || $page_slug == 'product_attribute' || $page_slug == 'product_attribute_value'|| $page_slug == 'tax_class'|| $page_slug == 'tax_rate') aria-expanded="true" @endif>
                        <i class="icon-people"></i>
                        <p>{{ __('Product Management') }}</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse @if ($page_slug == 'category' || $page_slug == 'subcategory' || $page_slug == 'subchildcategory' || $page_slug == 'brand' || $page_slug == 'product_attribute' || $page_slug == 'product_attribute_value' || $page_slug == 'tax_class'|| $page_slug == 'tax_rate') show @endif" id="product_management">
                        <ul class="nav nav-collapse">
                            <li class="@if ($page_slug == 'brand') active @endif">
                                <a href="{{ route('pm.brand.index') }}">
                                    <span class="sub-item">{{ __('Brand') }}</span>
                                </a>
                            </li>
                            <li class="@if ($page_slug == 'product_tag') active @endif">
                                <a href="{{ route('pm.product-tags.index') }}">
                                    <span class="sub-item">{{ __('Product Tag') }}</span>
                                </a>
                            </li>
                            <li class="@if ($page_slug == 'category') active @endif">
                                <a href="{{ route('pm.category.index') }}">
                                    <span class="sub-item">{{ __('Category') }}</span>
                                </a>
                            </li>
                            <li class="@if ($page_slug == 'subcategory') active @endif">
                                <a href="{{ route('pm.sub-category.index') }}">
                                    <span class="sub-item">{{ __('Sub Category') }}</span>
                                </a>
                            </li>
                            <li class="@if ($page_slug == 'subchildcategory') active @endif">
                                <a href="{{ route('pm.sub-child-category.index') }}">
                                    <span class="sub-item">{{ __('Sub Child Category') }}</span>
                                </a>
                            </li>
                            <li class="@if ($page_slug == 'product_attribute') active @endif">
                                <a href="{{ route('pm.product-attribute.index') }}">
                                    <span class="sub-item">{{ __('Product Attribute') }}</span>
                                </a>
                            </li>
                             <li class="@if ($page_slug == 'product_attribute_value') active @endif">
                                <a href="{{ route('pm.product-attribute-value.index') }}">
                                    <span class="sub-item">{{ __('Product Attribute Value') }}</span>
                                </a>
                            </li>
                            <li class="@if ($page_slug == 'tax_class') active @endif">
                                <a href="{{ route('pm.tax-class.index') }}">
                                    <span class="sub-item">{{ __('Tax Class') }}</span>
                                </a>
                            </li>
                            <li class="@if ($page_slug == 'tax_rate') active @endif">
                                <a href="{{ route('pm.tax-rate.index') }}">
                                    <span class="sub-item">{{ __('Tax Rate') }}</span>
                                </a>
                            </li>





                        </ul>
                    </div>
                </li>

                {{-- Setup Management  --}}
                <li class="nav-item  @if ($page_slug == 'country' || $page_slug == 'state' || $page_slug == 'city' || $page_slug == 'operation_area' || $page_slug == 'operation_sub_area' || $page_slug == 'faq' || $page_slug == 'latest_offer') active submenu @endif">
                    <a data-bs-toggle="collapse" href="#setup_management"
                        @if ($page_slug == 'country' || $page_slug == 'state' || $page_slug == 'city' || $page_slug == 'operation_area' || $page_slug == 'operation_sub_area' || $page_slug == 'faq' || $page_slug == 'latest_offer') aria-expanded="true" @endif>
                        <i class="icon-people"></i>
                        <p>{{ __('Setup') }}</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse @if ($page_slug == 'country' || $page_slug == 'state' || $page_slug == 'city' || $page_slug == 'operation_area' || $page_slug == 'operation_sub_area' || $page_slug == 'faq') show @endif" id="setup_management">
                        <ul class="nav nav-collapse">
                            <li class="@if ($page_slug == 'country') active @endif">
                                <a href="{{ route('setup.country.index') }}">
                                    <span class="sub-item">{{ __('Country') }}</span>
                                </a>
                            </li>
                            <li class="@if ($page_slug == 'state') active @endif">
                                <a href="{{ route('setup.state.index') }}">
                                    <span class="sub-item">{{ __('State') }}</span>
                                </a>
                            </li>
                            <li class="@if ($page_slug == 'city') active @endif">
                                <a href="{{ route('setup.city.index') }}">
                                    <span class="sub-item">{{ __('City') }}</span>
                                </a>
                            </li>
                            <li class="@if ($page_slug == 'operation_area') active @endif">
                                <a href="{{ route('setup.operation-area.index') }}">
                                    <span class="sub-item">{{ __('Operation Area') }}</span>
                                </a>
                            </li>
                            <li class="@if ($page_slug == 'operation_sub_area') active @endif">
                                <a href="{{ route('setup.operation-sub-area.index') }}">
                                    <span class="sub-item">{{ __('Operation Sub Area') }}</span>
                                </a>
                            </li>

                            <li class="@if ($page_slug == 'faq') active @endif">
                                <a href="{{ route('setup.faq.index') }}">
                                    <span class="sub-item">{{ __('Faq') }}</span>
                                </a>
                            </li>
                            <li class="@if ($page_slug == 'latest_offer') active @endif">
                                <a href="{{ route('setup.latest-offer.index') }}">
                                    <span class="sub-item">{{ __('Latest Offer') }}</span>
                                </a>
                            </li>

                        </ul>
                    </div>

                </li>

                {{-- CMS Management  --}}
                <li class="nav-item  @if ($page_slug == 'banner' || $page_slug == 'offer_banner' || $page_slug == 'our_connection') active submenu @endif">
                    <a data-bs-toggle="collapse" href="#cms_management"
                        @if ($page_slug == 'seller') aria-expanded="true" @endif>
                        <i class="icon-people"></i>
                        <p>{{ __('CMS Management') }}</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse @if ($page_slug == 'banner' || $page_slug == 'offer_banner'|| $page_slug == 'our_connection') show @endif" id="cms_management">
                        <ul class="nav nav-collapse">
                            <li class="@if ($page_slug == 'banner') active @endif">
                                <a href="{{ route('cms.banner.index') }}">
                                    <span class="sub-item">{{ __('Banner') }}</span>
                                </a>
                            </li>
                            <li class="@if ($page_slug == 'offer_banner') active @endif">
                                <a href="{{ route('cms.offer-banner.index') }}">
                                    <span class="sub-item">{{ __('Offer Banner') }}</span>
                                </a>
                            </li>
                            <li class="@if ($page_slug == 'our_connection') active @endif">
                                <a href="{{ route('cms.our-connection.index') }}">
                                    <span class="sub-item">{{ __('Our Connection') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- hub Management --}}
                <li class="nav-item  @if ($page_slug == 'hub' || $page_slug == 'hub_package') active submenu @endif">
                    <a data-bs-toggle="collapse" href="#hub_management"
                        @if ($page_slug == 'seller') aria-expanded="true" @endif>
                        <i class="icon-people"></i>
                        <p>{{ __('Hub Management') }}</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse @if ($page_slug == 'hub' || $page_slug == 'hub_package') show @endif" id="hub_management">
                        <ul class="nav nav-collapse">
                            <li class="@if ($page_slug == 'hub') active @endif">
                                <a href="{{ route('hm.hub.index') }}">
                                    <span class="sub-item">{{ __('Hub') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item  @if ($page_slug == 'audits') active @endif">
                    <a href="{{ route('audit.index') }}">
                        <i class="icon-ban"></i>
                        <p>{{ __('Audits') }}</p>
                    </a>
                </li>
                <li class="nav-item  @if ($page_slug == 'documentation') active @endif">
                    <a href="{{ route('documentation.index') }}">
                        <i class="icon-docs"></i>
                        <p>{{ __('Documentation') }}</p>
                    </a>
                </li>
                <li class="nav-item  @if ($page_slug == 'temp_file') active @endif">
                    <a href="{{ route('temp.index') }}">
                        <i class="icon-trash"></i>
                        <p>{{ __('Temporary Files') }}</p>
                    </a>
                </li>
                <li class="nav-item  @if ($page_slug == 'site_setting') active @endif">
                    <a href="{{ route('site_setting.index') }}">
                        <i class="icon-settings"></i>
                        <p>{{ __('Application Settings') }}</p>
                    </a>
                </li>



                <li class="nav-item">
                <a data-bs-toggle="collapse" href="#submenu">
                  <i class="fas fa-bars"></i>
                  <p>Menu Levels</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="submenu">
                  <ul class="nav nav-collapse">
                    <li>
                      <a data-bs-toggle="collapse" href="#subnav1">
                        <span class="sub-item">Level 1</span>
                        <span class="caret"></span>
                      </a>
                      <div class="collapse" id="subnav1">
                        <ul class="nav nav-collapse subnav">
                          <li>
                            <a href="#">
                              <span class="sub-item">Level 2</span>
                            </a>
                          </li>
                          <li>
                            <a href="#">
                              <span class="sub-item">Level 2</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li>
                      <a data-bs-toggle="collapse" href="#subnav2">
                        <span class="sub-item">Level 1</span>
                        <span class="caret"></span>
                      </a>
                      <div class="collapse" id="subnav2">
                        <ul class="nav nav-collapse subnav">
                          <li>
                            <a href="#">
                              <span class="sub-item">Level 2</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li>
                      <a href="#">
                        <span class="sub-item">Level 1</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
        </div>
    </div>
</div>
