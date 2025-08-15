@extends('admin.admin_dashboard')
@section('admin_content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('storeProduct') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- row-1 --}}
                            <div class="row">
                                {{-- col-1 --}}
                                <div class="col-md-4">
                                    <div class="row mb-3">
                                        <label for="product-name" class="col-sm-5 col-form-label">Product Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="name" value="{{ old('name') }}" type="text" placeholder="Product Name">
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
                                        <label for="product-price" class="col-sm-5 col-form-label">Price</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="price" value="{{ old('price') }}" type="text" placeholder="Product Price">
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
                                        <label for="product-quantity" class="col-sm-5 col-form-label">Quantity</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="quantity" value="{{ old('quantity') }}" type="text" placeholder="Product Quantity">
                                            @error('quantity')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                {{-- end col-3 --}}
                            </div>
                            {{-- end row1 --}}
                            
                            {{-- row-2 --}}
                            <div class="row">
                                {{-- col1 --}}
                                <div class="col-md-4">
                                    <div class="row mb-3">
                                        <label class="col-sm-5 col-form-label">Unit</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="unit" aria-label="Unit">
                                                <option selected disabled>Select Unit</option>
                                                <option value="kg">KG</option>
                                                <option value="liter">Liter</option>
                                                <option value="dozen">Dozen</option>

                                               
                                                <!-- Add other units as needed -->
                                            </select>
                                            @error('unit')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                {{-- end col1 --}}
                                
                                {{-- col2 --}}
                                <div class="col-md-4">
                                    <div class="row mb-3">
                                        <label class="col-sm-5 col-form-label">Category</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="category_id" aria-label="Category">
                                                <option selected disabled>Select Category</option>
                                                @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                                    <div class="row mb-3">
                                        <label class="col-sm-5 col-form-label">Shop</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="shop_id" aria-label="Shop">
                                                <option selected disabled>Select Shop</option>
                                                @foreach($shops as $shop)
                                                <option value="{{ $shop->id }}">{{ $shop->shop_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('shop_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                {{-- end col3 --}}
                            </div>
                            {{-- end row-2 --}}
                            
                            {{-- row-3 --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="product-image" class="col-sm-5 col-form-label">Product Image</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="product_image" type="file" placeholder="Product Image">
                                            @error('product_image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="product-size" class="col-sm-5 col-form-label">Size</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="size" value="{{ old('size') }}" type="text" placeholder="Product Size">
                                            @error('size')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label for="product-description">Description</label>
                                        <textarea name="description" class="form-control" id="product-description" rows="5">{{ old('description') }}</textarea>
                                        @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            {{-- end row-3 --}}
                            
                            <div>
                                <input class="btn btn-primary float-end" type="submit" value="Add Product">
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>
@endsection
