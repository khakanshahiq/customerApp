@extends('frontend.frontend_dashboard')
@section('frontend_content')
  <!-- Hero Section Begin -->
  <section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span class="text-white" >All departments</span>
                    </div>
                    <ul >
                        <h2 >Daily Uses</h2>
                        @foreach($options1 as $option1)
                        <div>
                        <a href="{{route('frontendCategoryProduct',$option1->id)}}" class="text-dark val w-100" data-id="{{$option1->id}}">
                                <div class="d-flex justify-content-between  mt-1">

                                    <span style="padding-left:5px;">{{ $option1->name }}</span>
                                    <span class="badge border rounded-5" style="width:20px; height:20px; border-radius:50%;margin-right:8px;">
                                        {{ $option1->shops_count }}
                                    </span>
                                </div>
                            </a>
                        </div>
                        
                        @endforeach
                        
                        </ul>
                        <ul >
                            <h2>Health && Care</h2>
                            @foreach($options2 as $option2)
                            <div class="d-flex">
                                <a href="{{route('frontendPrescption',$option2->id)}}" class="text-dark val w-100" data-id="{{$option2->id }}">
                                    <div class="d-flex justify-content-between mt-1">
                                        <span style="padding-left:5px;">{{ $option2->name }}</span>
                                        <span class="badge border" style="width:20px; height:20px; border-radius:50%;margin-right:8px;">
                                            {{ $option2->shops_count }} 
                                        </span>
                                    </div>
                                        
                            </a>
                            </div>
                        @endforeach
                        @foreach($options2_2 as $option2)
                        <div class="d-flex">
                            <a href="{{route('frontendMedicalAid',$option2->id)}}" class="text-dark val w-100" data-id="{{$option2->id }}">
                                <div class="d-flex justify-content-between mt-1">
                                    <span style="padding-left:5px;">{{ $option2->name }}</span>
                                    <span class="badge border" style="width:20px; height:20px; border-radius:50%;margin-right:8px;">
                                        {{ $option2->shops_count }} 
                                    </span>
                                </div>
                                    
                        </a>
                        </div>
                    @endforeach
                            
                            </ul>
                            <ul >
                                <h2>Trouble shooting</h2>
                                @foreach($options3 as $option3)
                                    <div class=" ">
                                        <a href="{{route('frontendCategoryProduct',$option3->id)}}" class="text-dark val w-100 " data-id="{{$option3->id }}">
                                            <div class="d-flex justify-content-between mt-1">

                                                <span style="padding-left:5px;">{{ $option3->name }}</span>
                                                <span class="badge border " style="width:20px; height:20px; border-radius:50%; margin-right:8px;">
                                                    {{ $option3->shops_count }}
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                   
                                @endforeach
                                
                                </ul>
                    
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <div class="hero__search__categories">
                               <p>
                                All Categories
                                </p> 
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" placeholder="What do yo u need?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+65 11.188.888</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
                <div class="hero__item set-bg" id="shop-list" data-setbg="{{asset('frontend/img/hero/banner.jpg')}}">
                    <div class="hero__text">
                        <span>FRUIT FRESH</span>
                        <h2>Vegetabl 100% Organic</h2>
                        <p>Free Pickup and Delivery Available</p>
                        <a href="#" class="primary-btn">SHOP NOW</a>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Categories Section Begin -->
@include('frontend.pages.categories')
<!-- Categories Section End -->

<!-- Featured Section Begin -->
@include('frontend.pages.featured')
<!-- Featured Section End -->

<!-- Banner Begin -->
@include('frontend.pages.banner')
<!-- Banner End -->

<!-- Latest Product Section Begin -->
@include('frontend.pages.latest_products')
{{-- latest product section end --}}
<!-- Blog Section Begin -->
@include('frontend.pages.form_blog')
<script>
    $(document).ready(function() {
        var autocomplete;
    
        // Initialize Google Autocomplete for the input field
        autocomplete = new google.maps.places.Autocomplete(
            document.getElementById('location-search-input'),
            { types: ['geocode'] }
        );
    
        // Event listener when a user selects an address from the autocomplete suggestions
        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            var near_place = autocomplete.getPlace();
            var userLatitude = near_place.geometry.location.lat();
            var userLongitude = near_place.geometry.location.lng();
    
            // Perform the shop search when a place is selected
            searchShopsNearby(userLatitude, userLongitude);
        });
    
        // Function to search for shops near the user's selected location
        function searchShopsNearby(userLatitude, userLongitude) {
            $.ajax({
                url: '/frontend/all/shops', // Adjust this route to your backend route for fetching all shops
                method: 'GET',
                success: function(shops) {
                    var destinations = shops.map(shop => new google.maps.LatLng(shop.latitude, shop.longitude));
                    calculateDistances(userLatitude, userLongitude, destinations, shops);
                },
                error: function(error) {
                    console.error("Error fetching shops: ", error);
                }
            });
        }
    
        // Calculate distances between the user's location and each shop
        function calculateDistances(userLatitude, userLongitude, destinations, shops) {
            var service = new google.maps.DistanceMatrixService();
            service.getDistanceMatrix({
                origins: [new google.maps.LatLng(userLatitude, userLongitude)],
                destinations: destinations,
                travelMode: google.maps.TravelMode.DRIVING,
                unitSystem: google.maps.UnitSystem.METRIC
            }, function(response, status) {
                if (status === google.maps.DistanceMatrixStatus.OK) {
                    var results = response.rows[0].elements;
                    var nearbyShops = [];
    
                    // Filter shops based on travel time
                    results.forEach((result, index) => {
                        if (result.status === "OK") {
                            var durationInMinutes = result.duration.value / 60; // Convert seconds to minutes
                            if (durationInMinutes <= 20) {
                                nearbyShops.push(shops[index]);
                            }
                        }
                    });
    
                    // Display the filtered shops
                    displayNearbyShops(nearbyShops);
                } else {
                    console.error('Error with Distance Matrix API: ', status);
                }
            });
        }
        function searchShopsNearby(userLatitude, userLongitude) {
    $.ajax({
        url: '/frontend/all/shops',
        method: 'GET',
        data: {
            latitude: userLatitude,
            longitude: userLongitude
        },
        success: function(shops) {
            displayNearbyShops(shops);
        },
        error: function(error) {
            console.error("Error fetching shops: ", error);
        }
    });
}

        // Function to display the nearby shops
        function displayNearbyShops(shops) {
    console.log("Nearby Shops: ", shops);
    $('#shop-list').html(''); // Clear the shop list before appending new shops

    shops.forEach(shop => {
        console.log("Shop Name: ", shop.shop_name);

        if (shop.products && shop.products.length > 0) {
            shop.products.forEach(product => {
                // Ensure that product.product_image has the correct URL
                let productImage = product.product_image ? `/upload/product_image/${product.product_image}` : "/upload/no_image.png";
                console.log("Product Image Path: ", productImage);

                // Create the HTML for the shop and product
                let shopHtml = `
                    <div class="col-lg-4">
                        <div class="product__discount__item">
                            <div class="product__discount__item__pic set-bg" style="background-image: url(${productImage});">
                                <div class="product__discount__percent">-20%</div>
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <form action="" class="storeCart">
                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a>
                                            <input type="hidden" name="product_id" value="${product.id}">
                                            <input type="hidden" name="price" value="${product.price}">
                                        </li>
                                    </form>
                                </ul>
                            </div>
                            <div class="product__discount__item__text">
                                <span>Dried Fruit</span>
                                <h5><a href="#">${shop.shop_name}</a></h5>
                                <h5><a href="#">${product.name}</a></h5>
                                <div class="product__item__price">${product.price} Rs</div>
                                ${product.category && ['Fruits', 'Vegetables'].includes(product.category.name) ? `<h5>In stock ${product.quantity}</h5>` : ''}
                                ${product.rates && product.rates.length > 0 ? product.rates.map(rate => `
                                    <h5><a href="#">App Rate ${rate.app_rate} Rs</a></h5>
                                    <h5><a href="#">Home Delivery ${rate.home_delivery_rate} Rs</a></h5>
                                `).join('') : ''}
                                <h5>Distance: ${shop.distance_km.toFixed(2)} km</h5>
                                <h5>Estimated Time: ${shop.distance_mins} mins</h5>
                            </div>
                        </div>
                    </div>
                `;

                $('#shop-list').append(shopHtml);
            });
        } 
    });
}


    });
    </script>
@endsection
