@extends('frontend.frontend_dashboard')
@section('frontend_content')
<section class="breadcrumb-section set-bg" data-setbg="{{asset('frontend/img/breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Checkout</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="checkout spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                </h6>
            </div>
        </div>
        <div class="checkout__form">
            <h4>Billing Details</h4>
            <form action="{{route('orderStore')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Fist Name<span>*</span></p>
                                    <input type="text" name="first_name" value="{{$user->name}}">
                                @error('first_name')
                                    <div class="text text-danger first_name_error">{{$message}}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Last Name<span>*</span></p>
                                    <input type="text" value="{{ old('last_name')}}" name="last_name">
                                    @error('last_name')
                                    <div class="text text-danger last_name_error">{{$message}}</div>
                                @enderror
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Country<span>*</span></p>
                            <input type="text" name="country" value="{{ old('country')}}">
                            @error('country')
                            <div class="text text-danger country_error">{{$message}}</div>
                        @enderror
                        </div>
                        <div class="checkout__input">
                            <p>Address<span>*</span></p>
                            <input type="text" placeholder="Street Address" value="{{ old('address')}}" name="address" class="checkout__input__add">
                            @error('address')
                                    <div class="text text-danger address_error">{{$message}}</div>
                                @enderror
                        </div>
                        <div class="checkout__input">
                            <p>Town/City<span>*</span></p>
                            <input type="text" name="city" value="{{ old('city')}}">
                            @error('city')
                            <div class="text text-danger city_error">{{$message}}</div>
                        @enderror
                        </div>
                        <div class="checkout__input">
                            <p>Country/State<span>*</span></p>
                            <input type="text" name="state" value="{{ old('state')}}">
                            @error('state')
                            <div class="text text-danger state_error">{{$message}}</div>
                        @enderror
                        </div>
                        <div class="checkout__input">
                            <p>Postcode / ZIP<span>*</span></p>
                            <input type="text" name="zip_code" value="{{ old('zip_code')}}">
                            @error('zip_code')
                            <div class="text text-danger zip_code_error">{{$message}}</div>
                        @enderror
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Phone<span>*</span></p>
                                    <input type="text" name="phone" value="{{ old('phone')}}">
                                    @error('phone')
                                    <div class="text text-danger phone_error">{{$message}}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="text" name="email" value="{{$user->email}}">
                                    @error('email')
                                    <div class="text text-danger email_error">{{$message}}</div>
                                @enderror
                                </div>
                            </div>
                        </div>
                      
                       
                       
                       
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Your Order</h4>
                            <div class="checkout__order__products">Products <span>Total</span></div>
                            <ul>
                                @foreach ($groupedCarts as $item)
                                    
                                
                                <li>{{$item['product']->name }} <span>{{ $item['product']->price }}×{{ $item['quantity']}}={{ $item['total_price'] }}</span></li>
                               
                                @endforeach
                            </ul>
                            <div class="checkout__order__subtotal">Subtotal <span>{{$totalPrice}}Rs</span></div>
                            <div class="checkout__order__total">Total <input type="hidden" name="total_price" value="{{$totalPrice}}"> <span>{{$totalPrice}}Rs</span></div>
                           
                        
                            <div class="checkout__input__checkbox">
                                <label for="payment">
                                    Cash on Delivery
                                    <input type="radio" id="payment" name="payment" value="cash on delivery">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="paypal">
                                    Easypaisa/Jazzcash
                                    <input type="radio" id="paypal" name="payment" value="easypaisa">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            @error('payment')
                            <div class="text text-danger payment_error">{{$message}}</div>
                            @enderror
                            <button type="submit" class="site-btn">PLACE ORDER</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<script src="{{asset('frontend/js/jquery-3.3.1.min.js')}}"></script>
<script>
$(document).ready(function(){
 $('input[name="first_name"]').on('input',function(){
$('div.first_name_error').hide();
})
$('input[name="last_name"]').on('input',function(){
$('div.last_name_error').hide()
})
$('input[name="country"]').on('input',function(){
$('div.country_error').hide();
})
$('input[name="address"]').on('input',function(){
$('div.address_error').hide();
})
$('input[name="city"]').on('input',function(){
$('div.city_error').hide();
})

$('input[name="state"]').on('input',function(){
$('div.state_error').hide();
})

$('input[name="zip_code"]').on('input',function(){
$('div.zip_code_error').hide();
})

$('input[name="phone"]').on('input',function(){
$('div.phone_error').hide();
})

$('input[name="email"]').on('input',function(){
$('div.email_error').hide();
})
$('input[name="payment"]').on('change',function(){
$('div.payment_error').hide();
})



})

</script>
@endsection