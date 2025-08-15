<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Shop;
use App\Models\ShopVariation;


class ShopVariationController extends Controller
{
    public function allShopVariations(){
        $shopVariations=ShopVariation::all();
        return view('admin.shop_variations.all_shop_variations',compact('shopVariations'));
        
        }
        public function addShopVariation(){
           
            $products=Product::all();
            $shops=Shop::all();
        return view('admin.shop_variations.add_shop_variation',compact('products','shops'));
        
        }
        public function storeShopVariation(Request $request){
            $validated = $request->validate([
                'product_id'=>'required',
                'price' => 'required',
                'quantity'=>'required',
                'shop_id'=>'required'
                ]);
                ShopVariation::create([
                'product_id'=>$request->product_id,
                'price'=>$request->price,
                'quantity'=>$request->quantity,
                'shop_id'=>$request->shop_id,

              ]);
                return redirect()->route('allShopVariations')->with('success','new shop added successfull');
        
        }
        public function editShopVariation($id){
        
        $editShopVariation=ShopVariation::find($id);
        $products=Product::all();
        $shops=Shop::all();
        return view('admin.shop_variations.edit_shop_variation',compact('editShopVariation','products','shops'));
        
        }
        public function updateShopVariation(Request $request,$id){
            $validated = $request->validate([
               'product_id'=>'required',
                'price' => 'required',
                'quantity'=>'required',
                'shop_id'=>'required'
                ]);
            ShopVariation::findOrFail($id)->update([
                'product_id'=>$request->product_id,
                'price'=>$request->price,
                'quantity'=>$request->quantity,
                'shop_id'=>$request->shop_id,
        
            ]);
        
            return redirect()->route('allShopVariations')->with('success','shop variation updated successfull');
        
        }
        public function deleteShopVariation($id){
        $deleteShopVariation=ShopVariation::find($id);
        $deleteShopVariation->delete();
        return redirect()->route('allShopVariations')->with('success','shop variation deleted successfull');
        
        }

}
