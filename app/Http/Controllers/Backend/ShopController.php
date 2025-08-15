<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\User;
use App\Models\Category;
use App\Models\Subcategory;



class ShopController extends Controller
{


    public function allShops()
    {
        $shops = Shop::all();
        return view('admin.shops.all_shops', compact('shops'));

    }
    public function addShop()
    {
        $vendors = User::where('role', 'vendor')->get();
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.shops.add_shop', compact('vendors', 'categories', 'subcategories'));

    }
    public function storeShop(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'vendor_id' => 'required',
            'shop_name' => 'required|min:4',
            'address' => 'required',
            'category_id' => 'required|array', // Ensure this is an array
        ]);


        $existingShop = Shop::where('vendor_id', $request->vendor_id)
            ->where('shop_name', $request->shop_name)
            ->first();

        if ($existingShop) {

            $existingCategories = $existingShop->categories()->pluck('category_id')->toArray();
            $newCategories = array_diff($request->category_id, $existingCategories);

            if (empty($newCategories)) {
                return redirect()->route('allShops')->with('error', 'Shop with this name and categories already exists.');
            }
            $existingShop->categories()->attach($newCategories);
            return redirect()->route('allShops')->with('success', 'Categories added to existing shop.');
        }
        $shop = Shop::create([
            'vendor_id' => $request->vendor_id,
            'shop_name' => $request->shop_name,
            'address' => $request->address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'distance_in_km' => $request->distance_in_km,
            'distance_in_time' => $request->distance_in_time,
        ]);
        $shop->categories()->attach($request->category_id);

        return redirect()->route('allShops')->with('success', 'New shop added successfully');
    }




    public function editShop($id)
    {

        $editShop = Shop::find($id);
        $vendors = User::where('role', 'vendor')->get();
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.shops.edit_shop', compact('editShop', 'vendors', 'categories', 'subcategories'));

    }
    public function updateShop(Request $request, $id)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'vendor_id' => 'required',
            'shop_name' => 'required|min:4',
            'category_id' => 'required|array',  // Ensure this is an array
        ]);
    
        // Find the shop by ID or fail if not found
        $shop = Shop::findOrFail($id);
    
        // Update the shop details
        $shop->update([
            'vendor_id' => $request->vendor_id,
            'shop_name' => $request->shop_name,
            'address' => $request->address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'distance_in_km' => $request->distance_in_km,
            'distance_in_time' => $request->distance_in_time,
        ]);
    
        // Sync the categories - this will remove any categories not in the array
        // and add any new categories that are not currently associated
        $shop->categories()->sync($request->category_id);
    
        return redirect()->route('allShops')->with('success', 'Shop updated successfully');
    }
    
    public function deleteShop($id)
    {
        $deleteShop = Shop::find($id);
        $deleteShop->delete();
        return redirect()->route('allShops')->with('success', 'shop deleted successfull');

    }



}
