<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class AdminController extends Controller
{
    
   public function adminDashboard(){
if(auth()->user()->role=='admin'){
return view('admin.index');
}
else{

    return redirect()->back();
}

   } 


public function adminLogout(Request $request)
{
    Auth::guard('web')->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
}
public function allVendors(){
$vendors=User::where('role','vendor')->get();
return view('admin.admin_vendor.all_vendors',compact('vendors'));

}
public function addVendor(){

return view('admin.admin_vendor.add_vendor');

}
public function storeVendor(Request $request){
    $validated = $request->validate([
        'name' => 'required|min:4',
        'email' => 'required|email|unique:users',
        'password'=>'required|min:8|confirmed'
        ]);
        User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>$request->password,
        'role'=>'vendor',
        'status'=>'active',
        ]);
        return redirect()->route('allVendors')->with('success','new vendor registed successfull');

}
public function editVendor($id){

$editVendor=User::find($id);
return view('admin.admin_vendor.edit_vendor',compact('editVendor'));

}
public function updateVendor(Request $request,$id){
    $validated = $request->validate([
        'name' => 'required|min:4',
        'email' => 'required|email',
        
        ]);
    User::findOrFail($id)->update([
        'name'=>$request->name,
        'email'=>$request->email,
        'status'=>$request->status,
        

    ]);

    return redirect()->route('allVendors')->with('success','vendor updated successfull');

}
public function deleteVendor($id){
$deleteVendor=User::find($id);
$deleteVendor->delete();
return redirect()->route('allVendors')->with('success','vendor updated successfull');

}
public function allActiveVendors(){
$allActiveVendors=User::where('role','vendor')->where('status','active')->get();
return view('admin.admin_vendor.all_active_vendors',compact('allActiveVendors'));

}
public function allInactiveVendors(){

    $allInactiveVendors=User::where('role','vendor')->where('status','inactive')->get();
    return view('admin.admin_vendor.all_inactive_vendors',compact('allInactiveVendors'));
    
}
public function inactiveVendorDetails($id){
    $inactiveVendorDetails=User::find($id);
   
return view('admin.admin_vendor.inactive_vendor_details',compact('inactiveVendorDetails')); 


}

public function activeVendor(Request $request,$id){

    $activeVendor=User::find($id);
    $activeVendor->update(['status'=>'active']);
    return redirect()->route('allActiveVendors');


}

public function activeVendorDetails($id){
    $activeVendorDetails=User::find($id);
   
return view('admin.admin_vendor.active_vendor_details',compact('activeVendorDetails')); 


}
public function inactiveVendor(Request $request,$id){

    $activeVendor=User::find($id);
    $activeVendor->update(['status'=>'inactive']);
    return redirect()->route('allInactiveVendors');


}

}
