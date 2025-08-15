@extends('admin.admin_dashboard')
@section('admin_content')
<div class="page-content">
    <div class="container-fluid">
      
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                       
                        
                      <form action="{{route('updateRate',$editRate->id)}}" method="POST">
                        @csrf
                        {{-- row1 --}}
                        <div class="row">
                            {{-- col1 --}}
                            <div class="col-md-4">
                            <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Select Shop</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="shop_id" aria-label="Default select example">
                                    <option selected="" disabled> select shop</option>
                                    @foreach($shops as $shop)
                                    <option value="{{$shop->id}}"{{$shop->id==$editRate->shop_id?"selected":''}}>{{$shop->shop_name}}</option>
                                    @endforeach
                                    </select>
                                    @error('shop_id')
                                    <div class="alert alert-danger shop_id_error">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    {{-- col1 end --}}
                    {{-- col2 --}}
                    <div class="col-md-4">
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Select Product</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="product_id" aria-label="Default select example">
                                    <option selected="" disabled> select product</option>
                                    @foreach($products as $product)
                                    <option value="{{$product->id}}"{{$product->id==$editRate->product_id?"selected":''}}>{{$product->name}}</option>
                                    @endforeach
                                    </select>
                                    @error('product_id')
                                    <div class="alert alert-danger product_id_error">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    {{-- end col2 --}}
                     {{-- col3 --}}
                     <div class="col-md-4">
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Select Area</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="area_id" aria-label="Default select example">
                                    <option selected="" disabled>select area</option>
                                    @foreach($areas as $area)
                                    <option value="{{$area->id}}"{{$area->id==$editRate->area_id?"selected":''}}>{{$area->area_name}}</option>
                                    @endforeach
                                    </select>
                                    @error('area_id')
                                    <div class="alert alert-danger area_id_error">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    {{-- end col3 --}}
                    </div>
                    {{-- end row1 --}}
                    {{-- row2 --}}
                    <div class="row">
                        {{-- col1 --}}
                        <div class="col-md-6">
                        <div class="row mb-3">
                            <label for="example-search-input" class="col-sm-3 col-form-label">App Rate</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="app_rate" value="{{$editRate->app_rate}}" type="text" placeholder="app rate" >
                                @error('app_rate')
                                <div class="alert alert-danger app_rate_error">{{ $message }}</div>
                                @enderror
                            </div>
                            
                        </div>
                    </div>
                    {{--end col1  --}}
                    {{-- col2 --}}
                    <div class="col-md-6">
                        <div class="row mb-3">
                            <label for="example-search-input" class="col-sm-4 col-form-label">Home Delivery Rate</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="home_delivery_rate" value="{{$editRate->home_delivery_rate}}"   type="text" placeholder="app rate" >
                                @error('home_delivery_rate')
                                <div class="alert alert-danger home_delivery_rate_error">{{ $message }}</div>
                                @enderror
                            </div>
                            
                        </div>
                    </div>
                    {{-- end col2 --}}
                    </div>
                        <!-- end row2 -->
                            {{-- row3 --}}
                    <div class="row">
                        {{-- col1 --}}
                        <div class="col-md-6">
                        <div class="row mb-3">
                            <label for="example-search-input" class="col-sm-3 col-form-label">Single Item  Rate</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="single_item_delivery_rate" value="{{$editRate->single_item_delivery_rate}}" type="text" placeholder="single item delivery rate" >
                                @error('single_item_delivery_rate')
                                <div class="alert alert-danger 	single_item_delivery_rate_error">{{ $message }}</div>
                                @enderror
                            </div>
                            
                        </div>
                    </div>
                    {{--end col1  --}}
                    {{-- col2 --}}
                    <div class="col-md-6">
                        <div class="row mb-3">
                            <label for="example-search-input" class="col-sm-4 col-form-label">Total Order Delivery</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="total_delivery_rate" value="{{$editRate->total_delivery_rate}}"  type="text" placeholder="total order Delivery rate" >
                                @error('total_delivery_rate')
                                <div class="alert alert-danger total_delivery_rate_error">{{ $message }}</div>
                                @enderror
                            </div>
                            
                        </div>
                    </div>
                    {{-- end col2 --}}
                    </div>
                        <!-- end row3 -->
                        <div class="mt-5">
        
                            <input class="btn btn-primary float-end" type="submit" value="Update Rate">
                        </div>
                    </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        
        
    </div>
    
</div>
@endsection
<script src="{{asset('backend/assets/js/jquery-3.7.1.min.js')}}"></script>
<script>
$(document).ready(function(){
$('select[name="shop_id"]').on('input',function(){
$('div.alert.shop_id_error').hide();

})

$('select[name="product_id"]').on('input',function(){
$('div.alert.product_id_error').hide();

})
$('input[name="app_rate"]').on('input',function(){
$('div.alert.app_rate_error').hide();

})

$('input[name="home_delivery_rate"]').on('input',function(){
$('div.alert.home_delivery_rate_error').hide();

})


})

</script>
