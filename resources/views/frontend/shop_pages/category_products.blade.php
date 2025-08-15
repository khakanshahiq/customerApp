@extends('frontend.frontend_dashboard')
@section('frontend_content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Hero Section End -->

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('frontend/img/breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Organi Shop</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Department</h4>
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
                    <div class="sidebar__item">
                        <h4>Price</h4>
                        <div class="price-range-wrap">
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="10" data-max="540">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                            <div class="range-slider">
                                <div class="price-input">
                                    <input type="text" id="minamount">
                                    <input type="text" id="maxamount">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar__item sidebar__item__color--option">
                        <h4>Colors</h4>
                        <div class="sidebar__item__color sidebar__item__color--white">
                            <label for="white">
                                White
                                <input type="radio" id="white">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--gray">
                            <label for="gray">
                                Gray
                                <input type="radio" id="gray">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--red">
                            <label for="red">
                                Red
                                <input type="radio" id="red">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--black">
                            <label for="black">
                                Black
                                <input type="radio" id="black">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--blue">
                            <label for="blue">
                                Blue
                                <input type="radio" id="blue">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--green">
                            <label for="green">
                                Green
                                <input type="radio" id="green">
                            </label>
                        </div>
                    </div>
                    <div class="sidebar__item">
                        <h4>Popular Size</h4>
                        <div class="sidebar__item__size">
                            <label for="large">
                                Large
                                <input type="radio" id="large">
                            </label>
                        </div>
                        <div class="sidebar__item__size">
                            <label for="medium">
                                Medium
                                <input type="radio" id="medium">
                            </label>
                        </div>
                        <div class="sidebar__item__size">
                            <label for="small">
                                Small
                                <input type="radio" id="small">
                            </label>
                        </div>
                        <div class="sidebar__item__size">
                            <label for="tiny">
                                Tiny
                                <input type="radio" id="tiny">
                            </label>
                        </div>
                    </div>
                    <div class="sidebar__item">
                        <div class="latest-product__text">
                            <h4>Latest Products</h4>
                            <div class="latest-product__slider owl-carousel">
                                <div class="latest-prdouct__slider__item">
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{asset('frontend/img/latest-product/lp-1.jpg')}}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Crab Pool Security</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{asset('frontend/img/latest-product/lp-2.jpg')}}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Crab Pool Security</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{asset('frontend/img/latest-product/lp-3.jpg')}}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Crab Pool Security</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="latest-prdouct__slider__item">
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{asset('frontend/img/latest-product/lp-1.jpg')}}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Crab Pool Security</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{asset('frontend/img/latest-product/lp-2.jpg')}}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Crab Pool Security</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{asset('frontend/img/latest-product/lp-3.jpg')}}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Crab Pool Security</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <div class="product__discount">
                    <div class="section-title product__discount__title">
                        <h2>Sale Off</h2>
                    </div>
                    <div class="row" id="shop-list">
                        @if($categoryProducts->isEmpty())
                            <h2>No product found</h2>
                        @else
                            @foreach($categoryProducts as $categoryProduct)
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="{{!empty($categoryProduct->product_image) ? url('upload/product_image/'.$categoryProduct->product_image) : 'no image'}}">
                                            <div class="product__discount__percent">-20%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <form action="" class="storeCart">
                                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                        <input type="hidden" name="product_id" value="{{$categoryProduct->id}}">
                                                        <input type="text" class="quantity-input" name="quantity" value="1" readonly>
                                                        <input type="text" class="unit-input" name="unit" value="{{$categoryProduct->unit}}" readonly>


                                                        <input type="text" class="price-input" name="price" value="{{$categoryProduct->price}}" readonly>
                                                    </li>
                                                </form>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>Dried Fruit</span>
                                            <h5><a href="#">{{$categoryProduct['shop']['shop_name']}}</a></h5>
                                            <h5><a href="#">{{$categoryProduct->name}}</a></h5>
                                            
                                            
                                            <!-- Quantity selection dropdown -->
                                            <select class="product__quantity__select" data-price="{{$categoryProduct->price}}" >
                                                @if($categoryProduct->unit=='kg')
                                                @if($categoryProduct->size>1)
                                                <option value="1">{{$categoryProduct->size}} kg</option>
                                                @else
                                                  <option value="kg" data-quantity="1">1 kg</option>
                                                <option value="500g" data-quantity="0.5">500 grams</option>
                                                <option value="250g" data-quantity="0.25">250 grams</option>
                                                @endif
                                              
                                                @elseif($categoryProduct->unit=='liter')
                                             

                                               
                                                <option value="12liter" data-quantity="1">12 liter</option>
                                                <option value="5liter" data-quantity="0.5">5 liter</option>

                                               
                                                @else
                                                <option value="dozen" data-quantity="1">1 dozen</option>
                                                <option value="half dozen" data-quantity="0.5">1/2 dozen</option>
                                                <option value="quarter dozen" data-quantity="0.25">1/4 dozen</option>
                                                @endif
                                            </select>
                                            @if($categoryProduct->discount_price)
                                            <div class="product__item__price mt-3">{{$categoryProduct->price-$categoryProduct->discount_price}}Rs <span>{{$categoryProduct->price}}</span></div>
                                          @else
                                          <div class="product__item__price mt-3">{{$categoryProduct->price}}Rs</div>

                                            @endif
                                            @if(in_array($categoryProduct['category']['name'], ['Fruits', 'Vegetables']))
                                            @if($categoryProduct->unit=='kg')
                                                <h5>In stock {{$categoryProduct->quantity}} Kg</h5>
                                                @elseif($categoryProduct->unit=='liter')
                                                <h5>In stock {{$categoryProduct->quantity}} Liter</h5>

                                                @else
                                                <h5>In stock {{$categoryProduct->quantity}} Dozen</h5>

                                                @endif
                                            @endif
            
                                            @if($categoryProduct->rates->isNotEmpty())
                                                @foreach($categoryProduct->rates as $rate)
                                                    <h5><a href="#">App Rate {{$rate->app_rate}} Rs</a></h5>
                                                    <h5><a href="#">Home Delivery {{$rate->home_delivery_rate}} Rs</a></h5>
                                                @endforeach
                                            @endif
            
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- Modal for location input -->
<div class="modal fade" id="locationModal" tabindex="-1" role="dialog" aria-labelledby="locationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="locationModalLabel">Enter Your Location</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input id="location-search-input" type="text" class="form-control" placeholder="Search for your location">
        </div>
        <div class="modal-footer">
          <button type="button" id="confirm-location" class="btn btn-primary">Confirm Location</button>
        </div>
      </div>
    </div>
  </div>
  
</section>
<script src="{{asset('frontend/js/jquery-3.3.1.min.js')}}"></script>
<script>
$(document).ready(function(){
    let userLatitude = null;
    let userLongitude = null;

    // Get the user's location
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            userLatitude = position.coords.latitude;
            userLongitude = position.coords.longitude;
        });
    } else {
        alert("Geolocation is not supported by this browser.");
    }

    // $('.storeCart').on('click',function(e){
    //     e.preventDefault(); 
       
    //     const form=$(this).closest('form')
    //     var data = form.serialize();

    //     // Append user location to the data
    //     data += `&latitude=${userLatitude}&longitude=${userLongitude}`;
    //     console.log(data)

    //     $.ajax({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         url: "{{route('storeCart')}}",
    //         type: "POST",
    //         data: data,
         
    //         success: function(response){
    //             if(response.success == true){
    //                 alert(response.message);
    //                 updateCartCount();
    //             } else {
    //                 alert(response.message);
    //             }
    //         },
    //         error: function(xhr, status, error) {
    //             alert('AJAX error: ' + error);
    //         }
    //     });
    // });

    function updateCartCount() {
        $.ajax({
            url: "{{ route('countCart') }}", // Your route to fetch cart count
            type: "GET",
            success: function(response) {
                $('#cart-count').text(response.cartCount);
                $('#total-price').text(response.totalPrice); // Update cart count in the header
            },
            error: function(xhr, status, error) {
                console.error('Error fetching cart count:', error);
            }
        });
    }

    // Initial cart count update on page load
    updateCartCount();
});

</script>
<script>
   $(document).ready(function() {
    let userLatitude = null;
    let userLongitude = null;

    // Get the user's location
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            userLatitude = position.coords.latitude;
            userLongitude = position.coords.longitude;
        });
    } else {
        alert("Geolocation is not supported by this browser.");
    }

    $(document).on('click','.storeCart',function(e){
        e.preventDefault(); 
        $("#locationModal").modal('show');
        const form=$(this).closest('form')
        var data = form.serialize();

        // Append user location to the data
        data += `&latitude=${userLatitude}&longitude=${userLongitude}`;
        console.log(data)

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{route('storeCart')}}",
            type: "POST",
            data: data,
         
            success: function(response){
                if(response.success == true){
                    alert(response.message);
                    updateCartCount();
                } else {
                    alert(response.message);
                }
            },
            error: function(xhr, status, error) {
                alert('AJAX error: ' + error);
            }
        });
    });
    function updateCartCount() {
        $.ajax({
            url: "{{ route('countCart') }}", // Your route to fetch cart count
            type: "GET",
            success: function(response) {
                $('#cart-count').text(response.cartCount);
                $('#total-price').text(response.totalPrice); // Update cart count in the header
            },
            error: function(xhr, status, error) {
                console.error('Error fetching cart count:', error);
            }
        });
    }

    // Initial cart count update on page load
    updateCartCount();

    var autocomplete;

    // Initialize Google Autocomplete for the input field
    autocomplete = new google.maps.places.Autocomplete(
        document.getElementById('location-search-input'),
        // { types: ['geocode'] }
    );

    // Event listener when a user selects an address from the autocomplete suggestions
    google.maps.event.addListener(autocomplete, 'place_changed', function() {
        var near_place = autocomplete.getPlace();
        var address=near_place.formatted_address;
        
        var userLatitude = near_place.geometry.location.lat();
        var userLongitude = near_place.geometry.location.lng();

        // Perform the shop search when a place is selected
        searchShopsNearby(userLatitude, userLongitude,address);
    });

    // Function to search for shops near the user's selected location
    function searchShopsNearby(userLatitude, userLongitude,address) {
        $.ajax({
            url: '/frontend/all/shops', // Adjust this route to your backend route for fetching all shops
            method: 'GET',
            data: {
                latitude: userLatitude, // Include latitude in request
                longitude: userLongitude // Include longitude in request
            },
            success: function(shops) {
                var destinations = shops.map(shop => new google.maps.LatLng(shop.latitude, shop.longitude));
                calculateDistances(userLatitude, userLongitude, destinations, shops,address);
            },
            error: function(error) {
                console.error("Error fetching shops: ", error);
            }
        });
    }

    // Calculate distances between the user's location and each shop
    function calculateDistances(userLatitude, userLongitude, destinations, shops,address) {
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
                displayNearbyShops(nearbyShops,address);
            } else {
                console.error('Error with Distance Matrix API: ', status);
            }
        });
    }

    // Function to display the nearby shops
    function displayNearbyShops(shops,address) {
    console.log("Nearby Shops: ", shops,address);
    $('#shop-list').html(''); 

    if (shops.length === 0) {
        $('#shop-list').html('<div class="col-lg-12"><p>No shops available in your area.</p></div>');
        return; 
    }

    shops.forEach(shop => {
        if (shop.products && shop.products.length > 0) {
            shop.products.forEach(product => {
                let productImage = product.product_image ? `/upload/product_image/${product.product_image}` : "/upload/no_image.png";
                
                // Calculate the product price based on discount
                let productPrice;
                if (product.discount_price) {
                    let discountedPrice = product.price - product.discount_price;
                    productPrice = `<div class="product__item__price">${discountedPrice} Rs <span>${product.price} Rs</span></div>`;
                } else {
                    productPrice = `<div class="product__item__price">${product.price} Rs</div>`;
                }

                // Unit-based stock display
                let stockInfo = '';
                if (['Fruits', 'Vegetables'].includes(product.category_name)) {
                    if (product.unit === 'kg') {
                        stockInfo = `<h5>In stock ${product.quantity} Kg</h5>`;
                    } else if (product.unit === 'liter') {
                        stockInfo = `<h5>In stock ${product.quantity} Liter</h5>`;
                    } else if (product.unit === 'dozen') {
                        stockInfo = `<h5>In stock ${product.quantity} Dozen</h5>`;
                    }
                }

                // Unit options based on product's unit type
                let unitOptions = '';
                if (product.unit === 'kg') {
                    const pricePerKg = product.price / product.size;
                    const price10Kg = pricePerKg * 10;
                    const price5Kg = pricePerKg * 5;
                    unitOptions = `
                        <option value="${product.size}" data-quantity="${product.size}" data-price="${product.price}">
                            ${product.size} kg
                        </option>
                        <option value="10" data-quantity="10" data-price="${price10Kg}">10 kg</option>
                        <option value="5" data-quantity="5" data-price="${price5Kg}">5 kg</option>
                    `;
                } else if (product.unit === 'liter') {
                    unitOptions = `
                        <option value="1" data-quantity="1" data-price="${product.price}">1 liter</option>
                        <option value="0.5" data-quantity="0.5" data-price="${product.price * 0.5}">500 ml</option>
                    `;
                } else if (product.unit === 'dozen') {
                    unitOptions = `
                        <option value="1" data-quantity="1" data-price="${product.price}">1 dozen</option>
                        <option value="0.5" data-quantity="0.5" data-price="${product.price * 0.5}">1/2 dozen</option>
                        <option value="0.25" data-quantity="0.25" data-price="${product.price * 0.25}">1/4 dozen</option>
                    `;
                }

                // Shop's product HTML structure
                let shopHtml = `
                    <div class="col-lg-4">
                        <div class="product__discount__item">
                            <div class="product__discount__item__pic set-bg" style="background-image: url(${productImage});">
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <form action="" class="storeCart">
                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a>
                                            <input type="hidden" name="product_id" value="${product.id}">
                                            <input type="text" class="quantity-input" name="quantity" value="1" readonly>
                                            <input type="text" class="unit-input" name="unit" value="${product.unit}" readonly>
                                            <input type="text" class="price-input" name="price" value="${product.price}" readonly>
                                            <input type="text" class="address-input" name="address" value="${address}" readonly>
                                            
                                        </li>
                                    </form>
                                </ul>
                            </div>
                            <div class="product__discount__item__text">
                                <h5><a href="#">${shop.shop_name}</a></h5>
                                <h5><a href="#">${product.name}</a></h5>
                                <select class="product__quantity__select">
                                    ${unitOptions}
                                </select>
                                ${productPrice}
                                ${stockInfo}
                                <h5>Delivery: ${shop.distance_mins + 3}-${shop.distance_mins + 18} mins</h5>
                            </div>
                        </div>
                    </div>
                `;

                $('#shop-list').append(shopHtml);
            });
        }
 

    });

    // Attach change event listeners to all quantity select elements
    $(document).on('change', '.product__quantity__select', function() {
        let selectedOption = $(this).find('option:selected');
        let newPrice = selectedOption.data('price');
        var basePrice = parseFloat($(this).data('price'));
        var selectedQuantity = parseFloat(selectedOption.data('quantity'));
        var unitText = selectedOption.text();

        $(this).closest('.product__discount__item').find('.price-input').val(newPrice.toFixed(2));
        $(this).closest('.product__discount__item').find('.quantity-input').val(selectedQuantity);
        $(this).closest('.product__discount__item').find('.unit-input').val(unitText);

        // Optionally, update the price display text
        $(this).closest('.product__discount__item').find('.product__item__price').text(newPrice.toFixed(2) + ' Rs');

    
    
    });
}

});



    </script>
    <script>
     $(document).ready(function() {
    $('.product__quantity__select').on('change', function() {
        var basePrice = parseFloat($(this).data('price'));
        var selectedOption = $(this).find('option:selected');
        var selectedQuantity = parseFloat(selectedOption.data('quantity'));
        var unitText = selectedOption.text();

        var newPrice = basePrice * selectedQuantity;

        // Find the price input in the closest form
        $(this).closest('.product__discount__item').find('.price-input').val(newPrice.toFixed(2));
        $(this).closest('.product__discount__item').find('.quantity-input').val(selectedQuantity);
        $(this).closest('.product__discount__item').find('.unit-input').val(unitText);

        // Optionally, update the price display text
        $(this).closest('.product__discount__item').find('.product__item__price').text(newPrice.toFixed(2) + ' Rs');
    });
});

    </script>
    
@endsection
