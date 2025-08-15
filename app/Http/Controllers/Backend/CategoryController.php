<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    
public function allCategories(){
        $categories=Category::all();
        return view('admin.categories.all_categories',compact('categories'));
        
        }
        public function addCategory(){
        
        return view('admin.categories.add_category');
        
        }
        public function storeCategory(Request $request){
            $validated = $request->validate([
                
                'name' => 'required|min:4|unique:categories',
                'description'=>'required'
                ]);
                Category::create([
                'name'=>$request->name,
                'description'=>$request->description,
               
                ]);
                return redirect()->route('allCategories')->with('success','new category added successfull');
        
        }
        public function editCategory($id){
        
        $editCategory=Category::find($id);
        return view('admin.categories.edit_category',compact('editCategory'));
        
        }
        public function updateCategory(Request $request,$id){
            $validated = $request->validate([
                'name' => 'required|min:4',
                'description' => 'required',
                
                ]);
            Category::findOrFail($id)->update([
                'name'=>$request->name,
                'description'=>$request->description,
        
            ]);
        
            return redirect()->route('allCategories')->with('success','category updated successfull');
        
        }
        public function deleteCategory($id){
        $deleteCategory=Category::find($id);
        $deleteCategory->delete();
        return redirect()->route('allCategories')->with('success','category deleted successfull');
        
        }

}
