<?php
use App\Http\Middleware\Role;

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ShopController;
use App\Http\Controllers\Backend\ShopVariationController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\RateController;
use App\Http\Controllers\Backend\AreaController;
use App\Http\Controllers\Backend\AdminOrderController;

//vendor controllers
use App\Http\Controllers\vendor\vendorController;
use App\Http\Controllers\vendor\vendorProductController;

//end vendor controllers


//frontend controllers
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

//end frontend controllers



// Route::get('/', function () {
//     return view('frontend.frontend_dashboard');
// });
//frontend routes
Route::get('/location', function () {
    return view('location');
});
Route::controller(FrontendController::class)->group(function () {
   Route::get('/','index')->name('index');    
    Route::get('/frontend/waterReFill','frontendWaterReFill')->name('frontendWaterReFill');
    Route::get('/frontend/fruits','frontendFruits')->name('frontendFruits');
    Route::get('/frontend/category/prouduct/{id}','frontendCategoryProduct')->name('frontendCategoryProduct');
    Route::get('/frontend/prescption/{id}','frontendPrescption')->name('frontendPrescption');
    Route::get('/frontend/medicalAid/{id}','frontendMedicalAid')->name('frontendMedicalAid');
    Route::post('/frontend/upload/prescption','frontendUploadPrescption')->name('frontendUploadPrescption');
    Route::get('/frontend/all/shops','frontendAllShop')->name('frontendAllShop');
   
});

   Route::controller(CartController::class)->group(function () {
    Route::get('/cart/page','cartPage')->name('cartPage'); 
    Route::post('/store/cart','storeCart')->name('storeCart');    
    Route::get('/count/cart','countCart')->name('countCart'); 
    Route::get('/decrement/quantity/{id}','decrementQuantity')->name('decrementQuantity');    
    Route::get('/increment/quantity/{id}','incrementQuantity')->name('incrementQuantity');
    Route::get('/delete/cart/item/{id}','DeletCartItem')->name('DeletCartItem'); 
    Route::get('/checkout/page','checkoutPage')->middleware(['auth', 'role:user'])->name('checkoutPage');    
    });
    Route::controller(OrderController::class)->group(function () {
        Route::post('/order/store','orderStore')->name('orderStore'); 
        
        
        });
        Route::get('/pusher/test',function(){

            return view('pusher_test');
        });
    
// Route::get('/dashboard', function () {
//     return view('frontend.cart.checkout');
// })->middleware(['auth', 'verified'])->name('checkoutPage');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//backend routes
// Route::middleware(['auth','Role:admin'])->group(function(){
    

    // });

    
     Route::middleware(['auth','role:admin'])->group(function () {
        
        Route::controller(AdminController::class)->group(function () {
            Route::get('/admin/dashboard','adminDashboard')->name('adminDashboard');
            Route::get('/admin/logout','adminLogout')->name('adminLogout');
            Route::get('/all/vendors','allVendors')->name('allVendors');
            Route::get('/add/vendor','addVendor')->name('addVendor');
            Route::post('/store/vendor','storeVendor')->name('storeVendor');
            Route::get('/edit/vendor/{id}','editVendor')->name('editVendor');
            Route::post('/update/vendor/{id}','updateVendor')->name('updateVendor');
            Route::get('/delete/vendor/{id}','deleteVendor')->name('deleteVendor');
            Route::get('/all/active/vendors','allActiveVendors')->name('allActiveVendors');
            Route::get('/all/inactive/vendors','allInactiveVendors')->name('allInactiveVendors');
            Route::get('/inactive/vendor/details/{id}','inactiveVendorDetails')->name('inactiveVendorDetails');
            Route::post('/active/vendor/{id}','activeVendor')->name('activeVendor');
            Route::get('/active/vendor/details/{id}','activeVendorDetails')->name('activeVendorDetails');
            Route::post('/inactive/vendor/{id}','inactiveVendor')->name('inactiveVendor');




        });
        Route::controller(CategoryController::class)->group(function () {
           
            Route::get('/all/categories','allCategories')->name('allCategories');
            Route::get('/add/category','addCategory')->name('addCategory');
            Route::post('/store/category','storeCategory')->name('storeCategory');
            Route::get('/edit/category/{id}','editCategory')->name('editCategory');
            Route::post('/update/category/{id}','updateCategory')->name('updateCategory');
            Route::get('/delete/category/{id}','deleteCategory')->name('deleteCategory');
        });
        Route::controller(SubCategoryController::class)->group(function () {
           
            Route::get('/all/subcategories','allSubCategories')->name('allSubCategories');
            Route::get('/add/subcategory','addSubCategory')->name('addSubCategory');
            Route::post('/Store/subcategory','storeSubCategory')->name('storeSubCategory');
            Route::get('/edit/subcategory/{id}','editSubCategory')->name('editSubCategory');
            Route::post('/update/subcategory/{id}','updateSubCategory')->name('updateSubCategory');
            Route::get('/delete/subcategory/{id}','deleteSubCategory')->name('deleteSubCategory');
        });
        Route::controller(ShopController::class)->group(function () {
           
            Route::get('/all/shops','allShops')->name('allShops');
            Route::get('/add/shop','addShop')->name('addShop');
            Route::post('/Store/shop','storeShop')->name('storeShop');
            Route::get('/edit/shop/{id}','editShop')->name('editShop');
            Route::post('/update/shop/{id}','updateShop')->name('updateShop');
            Route::get('/delete/shop/{id}','deleteShop')->name('deleteShop');
        });
        Route::controller(ShopVariationController::class)->group(function () {
           
            Route::get('/all/shop/variations','allShopVariations')->name('allShopVariations');
            Route::get('/add/variation','addShopVariation')->name('addShopVariation');
            Route::post('/Store/variation','storeShopVariation')->name('storeShopVariation');
            Route::get('/edit/variation/{id}','editShopVariation')->name('editShopVariation');
            Route::post('/update/variation/{id}','updateShopVariation')->name('updateShopVariation');
            Route::get('/delete/variation/{id}','deleteShopVariation')->name('deleteShopVariation');
        });
        Route::controller(ProductController::class)->group(function () {
           
            Route::get('/all/prouducts','allProucts')->name('allProducts');
            Route::get('/add/product','addProduct')->name('addProduct');
            Route::post('/Store/product','storeProduct')->name('storeProduct');
            Route::get('/edit/product/{id}','editProduct')->name('editProduct');
            Route::post('/update/product/{id}','updateProduct')->name('updateProduct');
            Route::get('/delete/product/{id}','deleteProduct')->name('deleteProduct');
        });

        Route::controller(RateController::class)->group(function () {
           
            Route::get('/all/rates','allRates')->name('allRates');
            Route::get('/add/rate','addRate')->name('addRate');
            Route::post('/Store/rate','storeRate')->name('storeRate');
            Route::get('/edit/rate/{id}','editRate')->name('editRate');
            Route::post('/update/rate/{id}','updateRate')->name('updateRate');
            Route::get('/delete/rate/{id}','deleteRate')->name('deleteRate');
        });
        Route::controller(AreaController::class)->group(function () {
           
            Route::get('/all/Areas','allAreas')->name('allAreas');
            Route::get('/add/area','addArea')->name('addArea');
            Route::post('/Store/area','storeArea')->name('storeArea');
            Route::get('/edit/area/{id}','editArea')->name('editArea');
            Route::post('/update/area/{id}','updateArea')->name('updateArea');
            Route::get('/delete/area/{id}','deleteArea')->name('deleteArea');
        });
        Route::controller(ServiceController::class)->group(function () {
           
            Route::get('/all/Services','allServices')->name('allServices');
            Route::get('/add/Service','addService')->name('addService');
            Route::post('/Store/Service','storeService')->name('storeService');
            Route::get('/edit/Service/{id}','editService')->name('editService');
            Route::post('/update/Service/{id}','updateService')->name('updateService');
            Route::get('/delete/Service/{id}','deleteService')->name('deleteService');
        });
        Route::controller(AdminOrderController::class)->group(function () {
           
            Route::get('/all/orders','allOrders')->name('allOrders');
            Route::get('/order/detail/{id}','OrderDetail')->name('orderDetail');
            Route::get('/deliver/order/{id}','deliverOrder')->name('deliverOrder');
            Route::get('/all/pending/orders','pendingOrders')->name('pendingOrders');
            Route::get('/all/delivered/orders','deliveredOrders')->name('deliveredOrders');
            
        });
        });
        //end backend routes
    Route::middleware(['auth','role:vendor'])->group(function () {
        Route::controller(vendorController::class)->group(function(){
            Route::get('/vendor/dashboard','vendorDashboard')->name('vendorDashboard');
            Route::get('/vendor/logout','vendorLogout')->name('vendorLogout');

        });
        Route::controller(vendorProductController::class)->group(function(){
            Route::get('/vendor/all/products','vendorAllProducts')->name('vendorAllProducts');
            Route::get('/vendor/add/product','vendorAddProduct')->name('vendorAddProduct');
            Route::post('/vendor/store/product','vendorStoreProduct')->name('vendorStoreProduct');
            Route::get('/vendor/edit/product/{id}','vendorEditProduct')->name('vendorEditProduct');
            Route::post('/vendor/update/product/{id}','vendorUpdateProduct')->name('vendorUpdateProduct');
            Route::get('/vendor/delete/product/{id}','vendorDeleteProduct')->name('vendorDeleteProduct');


        });
    });
require __DIR__.'/auth.php';
