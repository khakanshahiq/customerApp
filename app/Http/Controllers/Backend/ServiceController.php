<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Category;

class ServiceController extends Controller
{
    public function allServices(){
        $services=Service::all();
        return view('admin.services.all_services',compact('services'));
        
        }
        public function addService(){
            $categories=Category::all();
        return view('admin.services.add_service',compact('categories'));
        
        }
        public function storeService(Request $request){
            $validated = $request->validate([
                'category_id'=>'required',
                'service_name' => 'required|min:4|unique:services',
                'description'=>'required'
                ]);
                Service::create([
                'category_id'=>$request->category_id,
                'service_name'=>$request->service_name,
                'description'=>$request->description,
                
               
                ]);
                return redirect()->route('allServices')->with('success','new service added successfull');
        
        }
        public function editService($id){
        
        $editService=Service::find($id);
        $categories=Category::all();
        return view('admin.services.edit_service',compact('editService','categories'));
        
        }
        public function updateService(Request $request,$id){
            $validated = $request->validate([
                'category_id'=>'required',
                'service_name' => 'required|min:4',
                'description' => 'required',
                
                ]);
            Service::findOrFail($id)->update([
                'category_id'=>$request->category_id,
                'service_name'=>$request->service_name,
                'description'=>$request->description,
        
            ]);
        
            return redirect()->route('allServices')->with('success','service updated successfull');
        
        }
        public function deleteService($id){
        $deleteService=Service::find($id);
        $deleteService->delete();
        return redirect()->route('allServices')->with('success','service deleted successfull');
        
        }  



}
