<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class vendorController extends Controller
{
    
    public function vendorDashboard(){
        if(auth()->check() && auth()->user()->role=='vendor'){
        return view('vendor.index');
        }
        else{
    
            return redirect()->back();
        }
    }
    public function vendorLogout(Request $request)
    {
        Auth::guard('web')->logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }


}
