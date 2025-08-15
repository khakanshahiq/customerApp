<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Prescption;
use App\Models\Service;
use App\Models\Shop;
use Illuminate\Support\Facades\DB;



class FrontendController extends Controller
{
    public function index(){
        $categories=Category::withCount('shops')->get();
        $options1=$categories->filter(function($category){
          return in_array($category->name,['Water refill','Vegetables','Fruits','Dairy Products','Cylinder refill']);  

        });
       $options2=$categories->filter(function($category){
        return in_array($category->name,['Pharmacy']);

       });
       $options2_2=$categories->filter(function($category){
        return in_array($category->name,['Medical Aid']);
      
       });
       $options3=$categories->filter(function($category){
        return in_array($category->name,['Electrician','Plumber']);
       });
        return view('frontend.index',compact('options1','options2','options2_2','options3'));
    }


public function frontendWaterReFill(){

return view('frontend.shop_pages.water_refill');

}

public function frontendCategoryProduct($id)
{
  
    $categoryProducts = Product::with('rates')->where('category_id',$id)->get();
    
  
    $categories=Category::withCount('shops')->get();
    $options1=$categories->filter(function($category){
      return in_array($category->name,['Water refill','Vegetables','Fruits','Dairy Products','Cylinder refill']);  

    });
   $options2=$categories->filter(function($category){
    return in_array($category->name,['Pharmacy']);

   });
   $options2_2=$categories->filter(function($category){
    return in_array($category->name,['Medical Aid']);
  
   });
   $options3=$categories->filter(function($category){
    return in_array($category->name,['Electrician','Plumber']);
   });

    if (!$categoryProducts) {
        return response()->json(['message' => 'Category not found'], 404);
    }

    return view('frontend.shop_pages.category_products', compact('categoryProducts','options2_2','options1','options2','options3'));
}

public function frontendPrescption($id){
  $categories=Category::withCount('shops')->get();
  $options1=$categories->filter(function($category){
    return in_array($category->name,['Water refill','Vegetables','Fruits','Dairy Products','Cylinder refill']);  

  });
 $options2=$categories->filter(function($category){
  return in_array($category->name,['Pharmacy']);

 });
 $options2_2=$categories->filter(function($category){
  return in_array($category->name,['Medical Aid']);

 });
 $options3=$categories->filter(function($category){
  return in_array($category->name,['Electrician','Plumber']);
 });
return view('frontend.shop_pages.prescption_form',compact('options1','options2','options2_2','options3','categories'));


}

public function frontendUploadPrescption(Request $request){

  // $validated = $request->validate([
    
  //   'prescption_image' => 'required',
  //   ]);
  $rand=rand(1,1000);

    $file=$request->file('prescption_image');
    $fileName=date('ymdHi').$file->getClientOriginalName();
    $file->move(public_path('upload/prescption_image'),$fileName);
    $data['prescption_image']=$fileName;
    $rand=rand(1,1000);

    $da=Prescption::create([
      'user_id'=>$rand,
      'prescption_image'=>$fileName,
  ]);
  $categories=Category::get();
  $options1=$categories->filter(function($category){
    return in_array($category->name,['Water refill','Vegetables','Fruits','Dairy Products','Cylinder refill']);  

  });
 $options2=$categories->filter(function($category){
  return in_array($category->name,['Pharmacy']);

 });
 $options2_2=$categories->filter(function($category){
  return in_array($category->name,['Medical Aid']);

 });
 $options3=$categories->filter(function($category){
  return in_array($category->name,['Electrician','Plumber']);
 });
 $medicalAidCategory = $options2->first();
 

 if ($medicalAidCategory) {
     $categoryProducts = Product::where('category_id', $medicalAidCategory->id)->get();
    
 }

  return view('frontend.shop_pages.pharmacy_product',compact('categoryProducts','options1','options2','options2_2','options3'));
}
public function frontendMedicalAid(){
  $categories=Category::get();
  $options1=$categories->filter(function($category){
    return in_array($category->name,['Water refill','Vegetables','Fruits','Dairy Products','Cylinder refill']);  

  });
 $options2=$categories->filter(function($category){
  return in_array($category->name,['Pharmacy']);

 });
 $options2_2=$categories->filter(function($category){
  return in_array($category->name,['Medical Aid']);

 });
 $options3=$categories->filter(function($category){
  return in_array($category->name,['Electrician','Plumber']);
 });
 $medicalAidCategory = $options2_2->first();
    
 if ($medicalAidCategory) {
     $services = Service::where('category_id', $medicalAidCategory->id)->get();
 } else {
     $services = collect(); 
 }



return view('frontend.shop_pages.medical_aid',compact('options1','options2','options2_2','options3','services'));


}
public function frontendAllShop(Request $request)
{
    // Get user location from request
    $userLatitude = $request->input('latitude');
    $userLongitude = $request->input('longitude');

    // Check if location data is provided
    if (!$userLatitude || !$userLongitude) {
        return response()->json(['error' => 'User location is required'], 400);
    }

    // Fetch shops with distance calculation
    $frontendAllShops = Shop::select('id', 'shop_name', 'latitude', 'longitude')
        ->selectRaw("(
            6371 * acos(
                cos(radians(?)) * cos(radians(latitude)) * cos(radians(longitude) - radians(?)) +
                sin(radians(?)) * sin(radians(latitude))
            )
        ) AS distance_km", [$userLatitude, $userLongitude, $userLatitude])
        ->with('products') // Eager load products
        ->get()
        ->map(function ($shop) {
            // Calculate distance in meters
            $shop->distance_m = $shop->distance_km * 1000;

            // Estimate walking time (average walking speed: 5 km/h)
            $shop->distance_mins = round(($shop->distance_km / 20) * 60);

            return $shop;
        });

    return response()->json($frontendAllShops);
}



}
