<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Area;

class AreaController extends Controller
{
public function allAreas(){
        $areas=Area::all();
        return view('admin.areas.all_areas',compact('areas'));
        
        }
        public function addArea(){
            $areas=Area::all();
            return view('admin.areas.add_area',compact('areas'));
        
        }
        public function storeArea(Request $request){
            $validated = $request->validate([
                'city_name'=>'required',
                'area_name'=>'required',
                'address' => 'required',
                'post_code'=>'required|integer',
                ]);
                Area::create([
                'city_name'=>$request->city_name,
                'area_name'=>$request->area_name,
                'address'=>$request->address,
                'post_code'=>$request->post_code,
                ]);
                return redirect()->route('allAreas')->with('success','new areas added successfull');
        
        }
        public function editArea($id){
        
        $editArea=Area::find($id);
        
        return view('admin.areas.edit_area',compact('editArea'));
        
        }
        public function updateArea(Request $request,$id){
            $validated = $request->validate([
                'city_name'=>'required',
                'area_name'=>'required',
                'address' => 'required',
                'post_code'=>'required|integer',
                ]);
                Area::findOrFail($id)->update([
                    'city_name'=>$request->city_name,
                    'area_name'=>$request->area_name,
                    'address'=>$request->address,
                    'post_code'=>$request->post_code,

            ]);
        
            return redirect()->route('allAreas')->with('success','areas updated successfull');
        
        }
        public function deleteArea($id){
        $deleteArea=Area::find($id);
        $deleteArea->delete();
        return redirect()->route('allAreas')->with('success','area deleted successfull');
        
        }



}
