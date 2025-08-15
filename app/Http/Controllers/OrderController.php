<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;
use App\Events\NewOrderPlaced;
class OrderController extends Controller
{
    
public function orderStore(Request $request){
$request->validate([
        'first_name' => 'required|min:4',
        'last_name' => 'required|min:4',
        'country' => 'required',
        'address' => 'required',
        'city' => 'required',
        'state' => 'required',
        'zip_code' => 'required|numeric',
        'phone' => 'required|numeric',
        'email' => 'required|email',
        'payment'=>'required'
        
      
    ]);
$cartItems = Cart::where('user_id', auth()->user()->id)->where('status',1)->get();
if ($cartItems->isEmpty()) {
    return response()->json(['message' => 'No cart items found for this user.'], 404);
}
$user_id = $cartItems->first()->user_id;
$cartData=[];
foreach($cartItems as $cart){
$cartData[]=$cart->id;

}

$order=Order::create([
'first_name'=>$request->first_name,
'last_name'=>$request->last_name,
'user_id'=>$user_id,
'country'=>$request->country,
'address'=>$request->address,
'city'=>$request->city,
'state'=>$request->state,
'zip_code'=>$request->zip_code,
'phone'=>$request->phone,
'email'=>$request->email,
'total_price'=>$request->total_price,
'cart_ids'=>json_encode($cartData),
'payment'=>$request->payment,
'status'=>'pending',

]);
if($order==null){

    return redirect()->route('index');
}
Cart::where('user_id',auth()->user()->id)->update(['status'=>2]);
event(New NewOrderPlaced($order));
return redirect()->route('index');

}

}
