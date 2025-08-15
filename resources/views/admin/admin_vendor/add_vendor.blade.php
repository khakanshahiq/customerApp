@extends('admin.admin_dashboard')
@section('admin_content')
<div class="page-content">
    <div class="container-fluid">
      
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                        @endif
                        
                      <form action="{{route('storeVendor')}}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label for="example-search-input" class="col-sm-2 col-form-label">Vendor Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="name" type="text" placeholder="name" >
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="example-email-input" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="email" name="email" placeholder="Email" >
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                       
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="example-password-input" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="password" name="password">
                                @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="example-password-input" class="col-sm-2 col-form-label">Confirm Password</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="password"   name="password_confirmation" >
                            </div>
                        </div>
                    
                        <div>
        
                            <input class="btn btn-primary" type="submit" value="AddVendor">
                        </div>
                    </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        
        
    </div>
    
</div>
@endsection
