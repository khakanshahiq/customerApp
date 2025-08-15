<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Shop;

use Auth;


class vendorProductController extends Controller
{

    public function vendorAllProducts()
    {
        if(auth()->user()->role=='vendor' && auth()->user()->status=='active'){

        
        $user_id = Auth::id();
        $products = Product::where('user_id', $user_id)->get();
        return view('vendor.vendor_product.all_products', compact('products'));
    }
    else{
        return redirect()->back();
    }
    }
    public function vendorAddProduct()
    {
        if(auth()->user()->role=='vendor' && auth()->user()->status=='active'){
        $vendorId = auth()->user()->id;
        $categories = Category::whereHas('shops', function ($query) use ($vendorId) {
            $query->where('vendor_id', $vendorId);
        })->get();


        return view('vendor.vendor_product.add_product', compact('categories'));
    }
    else{

        return redirect()->back();
    }
    
    }
    public function vendorStoreProduct(Request $request)
    {
         $validated = $request->validate([
            'name' => 'required|min:4',
            'product_image' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'category_id' => 'required',
            'description' => 'required'
        ]);
        $alreadyExistProduct = Product::where('user_id', auth()->user()->id)->where('name', $request->name)->first();
        if ($alreadyExistProduct) {
            return redirect()->back()->withErrors(['name' => 'this product is alreay stored']);
        }
        $shop = Shop::where('vendor_id', auth()->user()->id)->first();
        $file = $request->file('product_image');
        $fileName = date('ymdHi') . $file->getClientOriginalName();
        $file->move(public_path('upload/product_image'), $fileName);
        $data['product_image'] = $fileName;
        $product = Product::create([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'product_image' => $fileName,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
            'shop_id' => $shop->id,
            'description' => $request->description,
        ]);

        return redirect()->route('vendorAllProducts');
    }

    public function vendorEditProduct($id)
    {
        if(auth()->user()->role=='vendor' && auth()->user()->status=='active'){
        $vendorId = auth()->user()->id;
        $categories = Category::whereHas('shops', function ($query) use ($vendorId) {
            $query->where('vendor_id', $vendorId);
        })->get();
        $editProduct = Product::where('id', $id)->where('user_id', auth()->user()->id)->first();
        return view('vendor.vendor_product.edit_product', compact('categories', 'editProduct'));
    }
    else{
        return redirect()->back();
    }
    }

    public function vendorUpdateProduct(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|min:4',
            'price' => 'required',
            'quantity' => 'required',
            'category_id' => 'required',
            'description' => 'required'

        ]);
        $product = Product::find($id);
        $product->name = $request->name;
        if ($request->file('product_image')) {
            @unlink(public_path('upload/product_image/' . $product->product_image));
            $file = $request->file('product_image');
            $fileName = date('ymdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/product_image'), $fileName);
            $product['product_image'] = $fileName;

        }
        $shop = Shop::where('vendor_id', auth()->user()->id)->first();
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category_id;
        $product->shop_id = $shop->id;
        $product->description = $request->description;
        $product->save();
        return redirect()->route('vendorAllProducts')->with('success', 'product updated successfull');
    }

    public function vendorDeleteProduct($id)
    {
        if(auth()->user()->role=='vendor' && auth()->user()->status=='active'){
        $deleteProduct = Product::where('id', $id)->where('user_id', auth()->user()->id)->first();
        @unlink(public_path('upload/product_image/' . $deleteProduct->product_image));
        $deleteProduct->delete();
        return redirect()->route('allProducts')->with('success', 'product deleted successfull');
        }else{
            return redirect()->back();
        }

    }




}
