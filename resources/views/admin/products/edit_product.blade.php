@extends('admin.admin_dashboard')
@section('admin_content')
<div class="page-content">
    <div class="container-fluid">
      
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                       
                        
                      <form action="{{route('updateProduct',$editProduct->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-sm-10 mb-2">
                            <img  width="800px" height="400px" src="{{!empty($editProduct->product_image)?url('upload/product_image/'.$editProduct->product_image):url('upload/no_image.jpg')}}" alt="">
                         </div>
                        <div class="row mb-3">
                            <label for="example-search-input" class="col-sm-2 col-form-label">Product Image</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="product_image" type="file" placeholder="product image" >
                                @error('product_image')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            
                        </div>
                        {{-- row-1 --}}
                        <div class="row">
                            {{-- col-1 --}}

                            <div class="col-md-4">

                          
                        <div class="row mb-3">
                            <label for="example-search-input" class="col-sm-5 col-form-label">Product Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="name" value="{{$editProduct->name}}" type="text" placeholder="product name" >
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                        </div>
                    </div>
                    {{-- end col-1 --}}
                    {{-- start-col2 --}}
                    
                    <div class="col-md-4">

                          
                        <div class="row mb-3">
                            <label for="example-search-input" class="col-sm-5 col-form-label">Price</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="price" value="{{$editProduct->price}}" type="text" placeholder="product price">
                               
                                @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                        </div>
                    </div>
                    {{-- end col-2 --}}
                        {{-- start-col3 --}}
                    
                        <div class="col-md-4">

                          
                            <div class="row mb-3">
                                <label for="example-search-input" class="col-sm-5 col-form-label">Quantity</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="quantity" value="{{$editProduct->quantity}}" type="text" placeholder="product quantity">
                                    @error('quantity')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                            </div>
                        </div>
                        {{-- end col-3 --}}
                </div>
                {{-- end row1 --}}
               
                    {{-- row3  --}}
                        <div class="row">
                            {{-- col1 --}}
                            <div class="col-md-4">
                                <div class="row mb-3">
                                    <label class="col-sm-5 col-form-label">Unit</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="unit" aria-label="Unit">
                                            <option selected disabled>Select Unit</option>
                                            <option value="kg" {{ $editProduct->unit === 'kg' ? 'selected' : '' }}>KG</option>
                                            <option value="liter" {{$editProduct->unit==='liter'?'selected':""}}>Liter</option>
                                            <option value="dozen" {{$editProduct->unit==='dozen'?'selected':""}}>Dozen</option>
                                           
                                            <!-- Add other units as needed -->
                                        </select>
                                        @error('unit')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            {{-- col1 end --}}
                            <div class="col-md-4">
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Category</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="category_id" aria-label="Default select example">
                                    <option selected="" disabled> select category</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}"{{$category->id==$editProduct->category_id ? "selected":''}}>{{$category->name}}</option>
                                    @endforeach
                                    </select>
                                    @error('category_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    {{-- end col2 --}}
                    {{-- col3 --}}
                    <div class="col-md-4">
                        <div class="row mb-2">
                            <label class="col-sm-4 col-form-label">Subcategory</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="subcategory_id" aria-label="Default select example">
                                    <option selected="" disabled> select subcategory</option>
                                    @foreach($subcategories as $subcategory)
                                    <option value="{{$subcategory->id}}"{{$subcategory->id==$editProduct->subcategory_id?'selected':''}}>{{$subcategory->name}}</option>
                                    @endforeach
                                    </select>
                                    @error('subcategory_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    {{-- end col3 --}}
                    {{-- col3 --}}
                    <div class="col-md-4">
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Shop</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="shop_id" aria-label="Default select example">
                                    <option selected="" disabled> select shop</option>
                                    @foreach($shops as $shop)
                                    <option value="{{$shop->id}}"{{$shop->id==$editProduct->shop_id?'selected':''}}>{{$shop->shop_name}}</option>
                                    @endforeach
                                    </select>
                                    @error('shop_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    {{-- end col3 --}}
                    <div class="col-md-6">
                        <div class="row mb-3">
                            <label for="product-size" class="col-sm-5 col-form-label">Size</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="size" value="{{$editProduct->size}}" type="text" placeholder="Product Size">
                                @error('size')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    </div>
                    {{-- end row3 --}}
                     {{-- row-2 --}}
       
                        
                        <div class="mb-3">
                            <label>Description</label>
                            <div>
                                <textarea name="description" class="form-control" rows="5">{{$editProduct->description}}</textarea>
                            </div>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- end row -->
                       
                        
                       
                       
                    
                        <div>
        
                            <input class="btn btn-primary float-end" type="submit" value="Update Product">
                        </div>
                    </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        
        
    </div>
    
</div>
@endsection
