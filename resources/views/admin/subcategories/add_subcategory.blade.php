@extends('admin.admin_dashboard')
@section('admin_content')
<div class="page-content">
    <div class="container-fluid">
      
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                       
                        
                      <form action="{{route('storeSubCategory')}}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label for="example-search-input" class="col-sm-2 col-form-label">Category Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="name" type="text" placeholder="subcategory name" >
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Select Category</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="category_id" aria-label="Default select example">
                                    <option selected="" disabled> select category</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                    </select>
                                    @error('category_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Description</label>
                            <div>
                                <textarea name="description" class="form-control" rows="5"></textarea>
                            </div>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- end row -->
                       
                        
                       
                       
                    
                        <div>
        
                            <input class="btn btn-primary" type="submit" value="AddSubCategory">
                        </div>
                    </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        
        
    </div>
    
</div>
@endsection
