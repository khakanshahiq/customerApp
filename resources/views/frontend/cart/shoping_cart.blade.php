@extends('frontend.frontend_dashboard')
@section('frontend_content')

<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($carts as $key=>$cart)
                            <tr>
                                <td class="shoping__cart__item">
                                    <img width="30" height="30" src="{{!empty($cart->image)?url('upload/product_image/'.$cart->image):url('no image')}}" alt="">
                                    <h5>{{$cart['product']['name']}}</h5>
                                </td>
                                <td class="shoping__cart__price">
                                    {{$cart->price}}Rs
                                </td>
                                <td class="shoping__cart__quantity">
                                    <div class="quantity">
                                        <div>
                                            
                                            <button class="quantity-btn minus" data-id="{{ $cart->id }}">-</button>
                                            <input type="text" name="quantity" value="{{ $cart->quantity }}" readonly>
                                            <button class="quantity-btn plus" data-id="{{ $cart->id }}">+</button>
                                            
                                        </div>
                                    </div>
                                </td>
                                <td class="shoping__cart__total">
                                   {{$cart->price}}Rs
                                </td>
                                <td class="shoping__cart__item__close">
                                    <span class="icon_close" data-id="{{ $cart->id}}"></span>
                                </td>
                            </tr>
                           
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                    <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                        Upadate Cart</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Discount Codes</h5>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">APPLY COUPON</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                        <li>Subtotal <span>{{$totalPrice}}Rs</span></li>
                        <li>Total <span>{{$totalPrice}}Rs</span></li>
                    </ul>
                    <a href="{{route('checkoutPage')}}" class="primary-btn">PROCEED TO CHECKOUT</a>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="{{asset('frontend/js/jquery-3.3.1.min.js')}}"></script>
<script>

    $(document).ready(function(){
//minus
$('.minus').on('click',function(){
    const cart_id=$(this).data('id');
    
$.ajax({
    url: "{{ route('decrementQuantity', ':id') }}".replace(':id', cart_id),
type:"GET",
success:function(response){
if(response.success==true){

    location.reload()
}
else{

    alert(response.message)
}

}



})

})
//minus end

//plus quantity start
$('.plus').on('click',function(){
const cart_id=$(this).data('id');
$.ajax({
url:"{{route('incrementQuantity',':id')}}".replace(':id',cart_id),
type:'GET',
success:function(response){
if(response.success==true){

    location.reload();
}
else{

    alert(response.message)
}

}

})
   
})
//delete cart item
$('.icon_close').on('click',function(){
    const cart_id=$(this).data('id');
    $.ajax({
        url:"{{route('DeletCartItem',':id')}}".replace(':id',cart_id),
        type:"GET",
        success:function(response){
            if(response.success==true){
                alert(response.message)
                location.reload()
                
            }
            else{

                alert(response.message)
            }

        }


    })


})

    })
</script>
@endsection
