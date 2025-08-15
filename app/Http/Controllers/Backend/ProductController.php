<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Shop;
class ProductController extends Controller
{

    public function allProucts()
    {
        $products = Product::all();
        return view('admin.products.all_products', compact('products'));

    }
    public function addProduct()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $shops = Shop::all();


        return view('admin.products.add_product', compact('categories', 'subcategories', 'shops'));

    }
    public function storeProduct(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:4',
            'product_image' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'category_id' => 'required',
            'shop_id' => 'required',
            'description' => 'required'
        ]);
        $alreadyExist = Product::where('category_id', $request->category_id)->where('name', $request->name)->where('shop_id', $request->shop_id)->first();

        if ($alreadyExist) {

            return redirect()->back()->withErrors(['name' => 'This product for this shop already exists']);
        }


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
            'unit'=>$request->unit,
            'size'=>$request->size,

            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'shop_id' => $request->shop_id,
            'description' => $request->description,
        ]);
        return redirect()->route('allProducts')->with('success', 'new product added successfull');

    }
    public function editProduct($id)
    {

        $editProduct = Product::find($id);
        $categories = Category::all();
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $shops = Shop::all();

        return view('admin.products.edit_product', compact('editProduct', 'categories', 'subcategories', 'shops'));

    }
    public function updateProduct(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|min:4',
            'price' => 'required',
            'quantity' => 'required',
            'category_id' => 'required',

            'shop_id' => 'required',
            'description' => 'required'

        ]);
        $product = Product::find($id);
        $product->user_id = auth()->user()->id;
        $product->name = $request->name;
        if ($request->file('product_image')) {
            @unlink(public_path('upload/product_image/' . $product->product_image));
            $file = $request->file('product_image');
            $fileName = date('ymdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/product_image'), $fileName);
            $product['product_image'] = $fileName;

        }
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->unit=$request->unit;
        $product->size=$request->size;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->shop_id = $request->shop_id;
        $product->description = $request->description;
        $product->save();
        return redirect()->route('allProducts')->with('success', 'product updated successfull');

    }
    public function deleteProduct($id)
    {
        $deleteProduct = Product::find($id);
        @unlink(public_path('upload/product_image/' . $deleteProduct->product_image));
        $deleteProduct->delete();
        return redirect()->route('allProducts')->with('success', 'product deleted successfull');

    }





}
