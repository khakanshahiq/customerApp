<div class="vertical-menu">

<div data-simplebar class="h-100">

    <!-- User details -->
    <div class="user-profile text-center mt-3">
        <div class="">
            <img src="{{asset('backend/assets/images/users/avatar-1.jpg')}}" alt="" class="avatar-md rounded-circle">
        </div>
        <div class="mt-3">
            <h4 class="font-size-16 mb-1">{{auth()->check()?auth()->user()->name:""}}</h4>
            <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i> Online</span>
        </div>
    </div>

    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title">Menu</li>

            <li>
                <a href="{{route('adminDashboard')}}" class="waves-effect">
                    <i class="ri-dashboard-line"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-mail-send-line"></i>
                    <span>Vendors</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{route('addVendor')}}">Add Vendor</a></li>
                    <li><a href="{{route('allVendors')}}">All Vendor</a></li>
                    <li><a href="{{route('allActiveVendors')}}">AllActive Vendors</a></li>
                    <li><a href="{{route('allInactiveVendors')}}">AllInactive Vendors</a></li>

                </ul>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-mail-send-line"></i>
                    <span>Shops</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{route('addShop')}}">Add Shop</a></li>
                    <li><a href="{{route('allShops')}}">All Shop</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-mail-send-line"></i>
                    <span>Shop Variation</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{route('addShopVariation')}}">Add Shop Variation</a></li>
                    <li><a href="{{route('allShopVariations')}}">All shop Variations</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-mail-send-line"></i>
                    <span>Products</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{route('addProduct')}}">Add product</a></li>
                    <li><a href="{{route('allProducts')}}">All Products</a></li>
                </ul>
            </li>

           
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-mail-send-line"></i>
                    <span>Category</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{route('addCategory')}}">Add Category</a></li>
                    <li><a href="{{route('allCategories')}}">All Category</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-mail-send-line"></i>
                    <span>Subcategory</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{route('addSubCategory')}}">Add Subcategory</a></li>
                    <li><a href="{{route('allSubCategories')}}">All Subcategory</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-mail-send-line"></i>
                    <span>Customers</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="email-inbox.html">Add Customer</a></li>
                    <li><a href="email-read.html">All Customer</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-mail-send-line"></i>
                    <span>Orders</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{route('allOrders')}}">All Orders</a></li>
                    <li><a href="{{route('pendingOrders')}}">Pending Orders</a></li>
                    <li><a href="{{route('deliveredOrders')}}">Delivered Orders</a></li>

                </ul>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-mail-send-line"></i>
                    <span>Areas</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{route('addArea')}}">Add Area</a></li>
                    <li><a href="{{route('allAreas')}}">All Areas</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-mail-send-line"></i>
                    <span>Rates</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{route('addRate')}}">Add Rate</a></li>
                    <li><a href="{{route('allRates')}}">All Rates</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-mail-send-line"></i>
                    <span>Services</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{route('addService')}}">Add Service</a></li>
                    <li><a href="{{route('allServices')}}">All Services</a></li>
                </ul>
            </li>

           </ul>
    </div>
    <!-- Sidebar -->
</div>
</div>