@extends('admin.admin_dashboard')
@section('admin_content')
<div class="page-content">
    <div class="container-fluid">
      
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                       
                        
                      <form action="{{route('updateVendor',$editVendor->id)}}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label for="example-search-input" class="col-sm-2 col-form-label">Vendor Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="name" value="{{$editVendor->name}}" type="text" placeholder="name" >
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="example-email-input" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="email" name="email" value="{{$editVendor->email}}" placeholder="Email" >
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                         
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Select Status</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="status" aria-label="Default select example">
                                    <option selected="" disabled> select Status</option>
                                
                                    <option value="active"{{$editVendor->status=='active'?'selected':''}}>active</option>
                                    <option value="inactive"{{$editVendor->status=='inactive'?'selected':''}}>inactive</option>
                                    
                                    </select>
                                    @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                       
                        <!-- end row -->
                      
                    
                        <div>
        
                            <input class="btn btn-primary" type="submit" value="updateVendor">
                        </div>
                    </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        
        
    </div>
    
</div>
@endsection
