<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;


class AdminOrderController extends Controller
{

    public function allOrders(){
        $allOrders=Order::all();
        return view('admin.admin_order.all_orders',compact('allOrders'));
        }

        public function orderDetail($id){
            $orderDetail=Order::find($id);
            $ids=json_decode($orderDetail->cart_ids);
           if(count($ids)>0){
            $arr=[];
            foreach($ids as $cartItem){
                $cartData=Cart::find($cartItem);
                $product= $cartData->product;
                $arr[]=[
                    'id'=>$cartData->id,
                    'name'=>$product->name,
                    'price'=>$cartData->price,
                    'quantity'=>$cartData->quantity,

                ];

            }

           }
           else{

            'no cart item';
           }
            

            return view('admin.admin_order.order_detail',compact('orderDetail','arr'));


        }
public function deliverOrder($id){
$deliveOrder=Order::find($id);
$deliveOrder->update(['status'=>'delivered']);
return redirect()->route('allOrders');

}
public function pendingOrders(){
$pendingOrders=Order::where('status','pending')->get();
return view('admin.admin_order.pending_orders',compact('pendingOrders'));


}

public function deliveredOrders(){

    $deliveredOrders=Order::where('status','delivered')->get();
    return view('admin.admin_order.delivered_orders',compact('deliveredOrders'));
    

}

}
