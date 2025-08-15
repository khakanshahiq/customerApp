<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    
    public function allSubCategories(){
        $subcategories=Subcategory::all();
        return view('admin.subcategories.all_subcategories',compact('subcategories'));
        
        }
        public function addSubCategory(){
            $categories=Category::all();
        return view('admin.subcategories.add_subcategory',compact('categories'));
        
        }
        public function storeSubcategory(Request $request){
            $validated = $request->validate([
                'category_id'=>'required',
                'name' => 'required|min:4|unique:subcategories',
                'description'=>'required'
                ]);
                Subcategory::create([
                'category_id'=>$request->category_id,
                'name'=>$request->name,
                'description'=>$request->description,
                
               
                ]);
                return redirect()->route('allSubCategories')->with('success','new subcategory added successfull');
        
        }
        public function editSubcategory($id){
        
        $editSubcategory=Subcategory::find($id);
        $categories=Category::all();
        return view('admin.subcategories.edit_subcategory',compact('editSubcategory','categories'));
        
        }
        public function updateSubCategory(Request $request,$id){
            $validated = $request->validate([
                'category_id'=>'required',
                'name' => 'required|min:4',
                'description' => 'required',
                
                ]);
            Subcategory::findOrFail($id)->update([
                'category_id'=>$request->category_id,
                'name'=>$request->name,
                'description'=>$request->description,
        
            ]);
        
            return redirect()->route('allSubCategories')->with('success','subcategory updated successfull');
        
        }
        public function deleteSubCategory($id){
        $deleteSubCategory=Subcategory::find($id);
        $deleteSubCategory->delete();
        return redirect()->route('allSubCategories')->with('success','subcategory deleted successfull');
        
        }


}
