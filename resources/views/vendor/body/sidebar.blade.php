<div class="vertical-menu">

<div data-simplebar class="h-100">

    <!-- User details -->
    <div class="user-profile text-center mt-3">
        <div class="">
            <img src="{{asset('backend/assets/images/users/avatar-1.jpg')}}" alt="" class="avatar-md rounded-circle">
        </div>
        <div class="mt-3">
            <h4 class="font-size-16 mb-1">{{auth()->check()?auth()->user()->name:''}}</h4>
            <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i> Online</span>
        </div>
    </div>

    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title">Menu</li>

            <li>
                <a href="{{route('vendorDashboard')}}" class="waves-effect">
                    <i class="ri-dashboard-line"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            @if(auth()->user()->role=='vendor' && auth()->user()->status=='active')
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-mail-send-line"></i>
                    <span>Products</span>
                </a>
             
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{route('vendorAllProducts')}}">All Products</a></li>
                    <li><a href="{{route('vendorAddProduct')}}">Add product</a></li>
                    
                </ul>
            </li>
            @endif

           
          

           </ul>
    </div>
    <!-- Sidebar -->
</div>
</div>