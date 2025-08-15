<style>
    /* Style for location search bar */
.header__top__location {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 10px;
}

#location-search-form {
    display: flex;
    align-items: center;
}

#location-search-input {
    padding: 5px 10px;
    border: 1px solid #ddd;
    border-radius: 5px 0 0 5px;
    height: 35px;
    width: 150px;
}

#location-search-form button {
    padding: 5px 10px;
    border: 1px solid #ddd;
    border-left: none;
    background-color: #f8f9fa;
    border-radius: 0 5px 5px 0;
    height: 35px;
}

</style>

<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__location" style="margin-right:100px;">
                        <form id="location-search-form"  action="" method="GET">
                            <input type="text" name="location" style="width:300px;" placeholder="Enter location" id="location-search-input">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        </div>
                        <div class="header__top__right__language">
                            <img src="{{asset('frontend/img/language.png')}}" alt="">
                            <div>English</div>
                            <span class="arrow_carrot-down"></span>
                            <ul>
                                <li><a href="#">Spanis</a></li>
                                <li><a href="#">English</a></li>
                            </ul>
                        </div>
                        <div class="header__top__right__auth">
                            @auth
        <!-- If the user is authenticated, show the logout button -->
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fa fa-sign-out"></i> Logout
        </a>
        
        <!-- Form to handle logout -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @else
        <!-- If the user is not authenticated, show login and register links -->
        <div style="display: flex">
        <a href="{{ route('login') }}"> Login</a>
        /<a href="{{ route('register') }}"></i> Register</a>
    </div>
    @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="./index.html"><img src="{{asset('frontend/img/logo.png')}}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="{{route('index')}}">Home</a></li>
                        <li><a href="./shop-grid.html">Shop</a></li>
                        <li><a href="#">Pages</a>
                            <ul class="header__menu__dropdown">
                                <li><a href="./shop-details.html">Shop Details</a></li>
                                <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                <li><a href="./checkout.html">Check Out</a></li>
                                <li><a href="./blog-details.html">Blog Details</a></li>
                            </ul>
                        </li>
                        <li><a href="./blog.html">Blog</a></li>
                        <li><a href="./contact.html">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                        <li><a href="{{route('cartPage')}}"><i class="fa fa-shopping-bag"></i> <span id="cart-count">0</span></a></li>
                    </ul>
                    <div class="header__cart__price">item: <span>
                        <span id="total-price">
                            @if(isset($totalPrice) && $totalPrice > 0)
                                {{$totalPrice}} Rs
                            @else
                                0 Rs
                            @endif
                        </span>
                    </span></div>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>

<!-- header.blade.php -->
<script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_KydD32dnz6pHLHboOrlirZ_gGn5yPMI&libraries=places"></script>



<script>
$(document).ready(function() {
    // Function to update cart count
    function updateCartCount() {
        $.ajax({
            url: "{{ route('countCart') }}", // Your route to fetch cart count
            type: "GET",
            success: function(response) {
                $('#cart-count').text(response.cartCount);
                $('#total-price').text(response.totalPrice);
                 // Update cart count in the header
            },
            error: function(xhr, status, error) {
                console.error('Error fetching cart count:', error);
            }
        });
    }

    // Initial cart count update on page load
    updateCartCount();
    
});

$(document).ready(function(){

    var autocomplete;
    var id='location-search-input';
    autocomplete=new google.maps.places.Autocomplete((document.getElementById(id)),{
        // types:['geocode'],
    })
    google.maps.event.addListener(autocomplete,'place_changed',function(){

        var near_place=autocomplete.getPlace();
        console.log(near_place.geometry.location.lat());
        console.log(near_place.geometry.location.lng());
        $.getJSON("https://api.ipify.org?format=jsonp&callback=?",
      function(data) {
        console.log("My public IP address is: ", data.ip);
      })


    })
})
</script>

