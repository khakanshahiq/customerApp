@extends('admin.admin_dashboard')
@section('admin_content')
<div class="page-content">
    <div class="container-fluid">
      
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                       
                        
                      <form action="{{route('storeArea')}}" method="POST">
                        @csrf
                        
                    {{-- row2 --}}
                    <div class="row">
                        {{-- col1 --}}
                        <div class="col-md-4">
                        <div class="row mb-3">
                            <label for="example-search-input" class="col-sm-3 col-form-label">City Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="city_name" value="{{old('city_name')}}" type="text" placeholder="city name" >
                                @error('city_name')
                                <div class="alert alert-danger city_name_error">{{ $message }}</div>
                                @enderror
                            </div>
                            
                        </div>
                    </div>
                    {{--end col1  --}}
                    {{-- col2 --}}
                    <div class="col-md-4">
                        <div class="row mb-3">
                            <label for="example-search-input" class="col-sm-4 col-form-label">Area Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="area_name" value="{{old('area_name')}}"  type="text" placeholder="area name" >
                                @error('area_name')
                                <div class="alert alert-danger area_name_error">{{ $message }}</div>
                                @enderror
                            </div>
                            
                        </div>
                    </div>
                    {{-- end col2 --}}
                    <div class="col-md-4">
                        <div class="row mb-3">
                            <label for="example-search-input" class="col-sm-4 col-form-label">Post Code/Zip code</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="post_code" value="{{old('post_code')}}"  type="text" placeholder="post code" >
                                @error('post_code')
                                <div class="alert alert-danger post_code_error">{{ $message }}</div>
                                @enderror
                            </div>
                            
                        </div>
                    </div>
                    {{-- end col2 --}}
                    
                    </div>
                        <!-- end row2 -->
                        <div class="mb-3">
                            <label>Address</label>
                            <div>
                                <textarea name="address" class="form-control" rows="5"></textarea>
                            </div>
                            @error('address')
                            <div class="alert alert-danger address_error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-5">
        
                            <input class="btn btn-primary float-end" type="submit" value="Add Area">
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
$('input[name="city_name"]').on('input',function(){
$('div.alert.city_name_error').hide();

})

$('input[name="area_name"]').on('input',function(){
$('div.alert.area_name_error').hide();

})
$('input[name="post_code"]').on('input',function(){
$('div.alert.post_code_error').hide();

})
$('textarea[name="address"]').on('input',function(){
$('div.alert.address_error').hide();

})
})

</script>
