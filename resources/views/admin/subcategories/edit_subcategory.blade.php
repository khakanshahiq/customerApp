@extends('admin.admin_dashboard')
@section('admin_content')
<div class="page-content">
    <div class="container-fluid">
      
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                       
                        
                      <form action="{{route('updateSubCategory',$editSubcategory->id)}}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label for="example-search-input" class="col-sm-2 col-form-label">Category Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="name" value="{{$editSubcategory->name}}" type="text" placeholder="subcategory name" >
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Select Category</label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="Default select example" name="category_id">
                                    <option selected="" disabled> select category</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}"{{$editSubcategory->category_id==$category->id ? "selected":''}}>{{$category->name}}</option>
                                    @endforeach
                                    </select>
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Description</label>
                            <div>
                                <textarea name="description" class="form-control" rows="5">{{$editSubcategory->description}}</textarea>
                            </div>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- end row -->
                       
                        
                       
                       
                    
                        <div>
        
                            <input class="btn btn-primary" type="submit" value="UpdateSubCategory">
                        </div>
                    </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        
        
    </div>
    
</div>
@endsection
