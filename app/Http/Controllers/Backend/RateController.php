<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rate;
use App\Models\Shop;
use App\Models\Product;
use App\Models\Area;



class RateController extends Controller
{
    
    public function allRates(){
        $rates=Rate::all();
        return view('admin.rates.all_rates',compact('rates'));
        
        }
        public function addRate(){
            $shops=Shop::all();
            $products=Product::all();
            $areas=Area::all();


        return view('admin.rates.add_rate',compact('shops','products','areas'));
        
        }
        public function storeRate(Request $request){
            $validated = $request->validate([
                'shop_id'=>'required',
                'product_id' => 'required',
                'area_id' => 'required',
                'app_rate'=>'required|integer',
                'home_delivery_rate'=>'required|integer',
                'single_item_delivery_rate'=>'required|integer',
                'total_delivery_rate'=>'required|integer'


                ]);
                Rate::create([
                'shop_id'=>$request->shop_id,
                'product_id'=>$request->product_id,
                'area_id'=>$request->area_id,
                'app_rate'=>$request->app_rate,
                'home_delivery_rate'=>$request->home_delivery_rate,
                'single_item_delivery_rate'=>$request->single_item_delivery_rate,
                'total_delivery_rate'=>$request->total_delivery_rate,

              ]);
                return redirect()->route('allRates')->with('success','new rates added successfull');
        
        }
        public function editRate($id){
        
        $editRate=Rate::find($id);
        $shops=Shop::all();
        $products=Product::all();
        $areas=Area::all();
        return view('admin.rates.edit_rate',compact('editRate','shops','products','areas'));
        
        }
        public function updateRate(Request $request,$id){
            $validated = $request->validate([
                'shop_id'=>'required',
                'product_id' => 'required',
                'area_id'=>'required',
                'app_rate'=>'required|integer',
                'home_delivery_rate'=>'required|integer',
                'single_item_delivery_rate'=>'required|integer',
                'total_delivery_rate'=>'required|integer'
                ]);
                Rate::findOrFail($id)->update([
                'shop_id'=>$request->shop_id,
                'product_id'=>$request->product_id,
                'area_id'=>$request->area_id,
                'app_rate'=>$request->app_rate,
                'home_delivery_rate'=>$request->home_delivery_rate,
                 'single_item_delivery_rate'=>$request->single_item_delivery_rate,
                'total_delivery_rate'=>$request->total_delivery_rate,

            ]);
        
            return redirect()->route('allRates')->with('success','rates updated successfull');
        
        }
        public function deleteRate($id){
        $deleteRate=Rate::find($id);
        $deleteRate->delete();
        return redirect()->route('allRates')->with('success','rate deleted successfull');
        
        }


}
