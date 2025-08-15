@extends('admin.admin_dashboard')
@section('admin_content')
<div class="page-content">
    <div class="container-fluid">
      
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                       
                        
                      <form action="{{route('updateShopVariation',$editShopVariation->id)}}" method="POST">
                        @csrf
                      
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Select Product</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="product_id" aria-label="Default select example">
                                    <option selected="" disabled> select product</option>
                                    @foreach($products as $product)
                                    <option value="{{$product->id}}"{{$editShopVariation->product_id==$product->id?'selected':''}}>{{$product->name}}</option>
                                    @endforeach
                                    </select>
                                    @error('product_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="example-search-input" class="col-sm-2 col-form-label">Price</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="price" value="{{$editShopVariation->price}}" type="text" placeholder="price" >
                                @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                        </div>
                        <div class="row mb-3">
                            <label for="example-search-input" class="col-sm-2 col-form-label">Quantity</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="quantity" value="{{$editShopVariation->quantity}}" type="text" placeholder="quantity" >
                                @error('quantity')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                        </div>
                       
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Select Shop</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="shop_id" aria-label="Default select example">
                                    <option selected="" disabled> select shop</option>
                                    @foreach($shops as $shop)
                                    <option value="{{$shop->id}}"{{$editShopVariation->shop_id==$shop->id?'selected':''}}>{{$shop->shop_name}}</option>
                                    @endforeach
                                    </select>
                                    @error('shop_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                       
                        
                       
                       
                    
                        <div>
        
                            <input class="btn btn-primary" type="submit" value="Update Shop Variation">
                        </div>
                    </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        
        
    </div>
    
</div>
@endsection
