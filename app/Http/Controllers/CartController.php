<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;

use Auth;
use Exception;

class CartController extends Controller
{

    public function cartPage()
    {
        $temp_user = session()->get('temp_user');
        $totalPrice = 0;
    
        
        $carts = Cart::where('status', 1)->where(function($query) use($temp_user) {
           
            if (auth()->check()) {
                $query->where('user_id', $temp_user)
                      ->orWhere('user_id', auth()->user()->id);
            } else {
               
                $query->where('user_id', $temp_user);
            }
        })->get();
    
      
        $totalPrice = $carts->sum(function ($cart) {
            return $cart->price * $cart->quantity;
        });
    
        return view('frontend.cart.shoping_cart', compact('carts', 'totalPrice'));
    }
    

    public function storeCart(Request $request)
{
    // dd($request->all());
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'price' => 'required|numeric',
        'quantity' => 'required|numeric',
        'unit' => 'required|string', // Validate unit as a required string
    ]);

    try {
        $product = Product::find($request->product_id);

        if (!session()->has('temp_user')) {
            session()->put('temp_user', rand(1, 1000));
        }

        $user_id = auth()->check() ? auth()->user()->id : session()->get('temp_user');

        // Check if the cart already has this product with the same unit
        $cart = Cart::where('product_id', $product->id)
                    ->where('user_id', $user_id)
                    ->where('status', 1)
                    ->where('unit', $request->unit) // Match the unit
                    ->first();

        if ($product->quantity > 0) {
            $quantityToAdd = $request->quantity;

            if ($cart) {
                
                $cart->increment('quantity', $quantityToAdd);
            } else {
                Cart::create([
                    'user_id' => $user_id,
                    'product_id' => $request->product_id,
                    'image' => $product->product_image,
                    'price' => $request->price, 
                    'quantity' =>1,
                    'unit' => $request->unit,
                    'status' => 1,
                ]);
            }

            // Decrement the product quantity based on the quantity added to the cart
            $product->decrement('quantity', $quantityToAdd);

            return response()->json(['success' => true, 'message' => 'Product added to cart successfully!']);
        } else {
            return response()->json(['success' => false, 'message' => 'Product not in stock']);
        }

    } catch (Exception $e) {
        return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
    }
}

    public function countCart()
    {
        // Determine the user ID based on authentication status
        if(auth()->check()) {
            $user_id = auth()->user()->id;
        } else {
            $user_id = session()->get('temp_user');
        }
        $carts = Cart::where('status', 1)
            ->where('user_id', $user_id)
            ->get();
        $cartCount = $carts->count();
        $totalPrice = $carts->sum(function ($cart) {
            return $cart->price*$cart->quantity;
        });
        $totalPrice = round($totalPrice, 2);
      return response()->json(['success' => true, 'cartCount' => $cartCount, 'totalPrice' => $totalPrice]);
    }
    
    
    public function decrementQuantity($id)
    {
        try {

            $cart = Cart::findOrFail($id);
            if ($cart->quantity > 1) {
                $cart->quantity--;
                $cart->save();
                $product = Product::find($cart->product_id);
                if ($product) {
                    $product->quantity++;
                    $product->save();
                }

                return response()->json(['success' => true, 'message' => 'Quantity decreased successfully!']);
            } else {
                return response()->json(['success' => false, 'message' => 'Quantity cannot be less than 1']);
            }
        } catch (Exception $e) {

            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function incrementQuantity($id)
    {
        try {


            $cart = Cart::findOrFail($id);


            $product = Product::find($cart->product_id);

            if ($product->quantity > 0) {
                $cart->quantity++;
                $cart->save();

                $product->quantity--;
                $product->save();
            } else {

                return response()->json(['success' => false, 'message' => 'no quantity in stock']);
            }

            return response()->json(['success' => true, 'message' => 'cart quantity updated successfull']);
        } catch (Exception $e) {
            return response()->json(['success' => true, 'message' => $e->getMessage()]);
        }

    }
    public function checkoutPage()
    {
        $user_id = auth()->user()->id;
        $carts = Cart::where('user_id', $user_id)->where('status', 1)->with('product')->get();
        $groupedCarts = $carts->groupBy('product_id')->map(function ($group) {
            $firstItem = $group->first();
            $totalQuantity = $group->sum('quantity');
            $totalPrice = $firstItem->price * $totalQuantity;
            return [
                'product' => $firstItem->product, 
                'quantity' => $totalQuantity,
                'total_price' => $totalPrice,
            ];
        });
        $totalPrice = $groupedCarts->sum('total_price');
        $user=User::where('id',$user_id)->where('role','user')->get();
        $user = User::find($user_id);
        if ($user && $user->role === 'user') {
            return view('frontend.cart.checkout', compact('totalPrice', 'groupedCarts', 'user'));
        } else {
           
            abort(403, 'Unauthorized action.');
        }
    }
    
    public function DeletCartItem($id){
        try{
        $temp_user=session()->get('temp_user');
        $deleteCartItem=Cart::where('user_id',$temp_user)->where('id',$id)->first();
        if($deleteCartItem){
        $product = Product::find($deleteCartItem->product_id);
        $deleteCartItem->delete();
        $product->quantity+= $deleteCartItem->quantity;
        $product->save();
        }
        return response()->json(['success'=>true,'message'=>'cart item deleted successfull']);
    }catch(Exception $e){
        return response()->json(['success'=>false,'message'=>$e->getMessage()]);

    }
}


}
