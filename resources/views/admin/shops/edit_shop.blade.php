@extends('admin.admin_dashboard')
@section('admin_content')
<div class="page-content">
    <div class="container-fluid">
      
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h2 class="m-5">Edit Shop</h2>
                    <div class="card-body">
                      
                      <form action="{{route('updateShop',$editShop->id)}}" method="POST">
                        @csrf
                        <input type="hidden" id="latitude" name="latitude" value="{{$editShop->latitude}}">
                        <input type="hidden" id="longitude" name="longitude" value="{{$editShop->longitude}}">
                       

                        <input type="hidden" id="distance_in_km" name="distance_in_km" value="{{$editShop->distance_in_km}}">
                        <input type="hidden" id="distance_in_time" name="distance_in_time" value="{{$editShop->distance_in_time}}">
                        <div class="row mb-3">
                            <label for="example-search-input" class="col-sm-2 col-form-label">Shop Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" value="{{$editShop->shop_name}}" name="shop_name" type="text" placeholder="shop name" >
                                @error('shop_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                        </div>
                        <div class="row mb-3">
                            <label for="example-search-input" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="address" name="address" value="{{$editShop->address}}" type="text" placeholder="address" >
                                @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                        </div>
                        
                        {{-- row1 start --}}
                        <div class="row">
                            {{-- col1 start --}}
                            <div class="col-md-4">
                       
                        <div class="row mb-3">
                            <label class="col-sm-5 col-form-label">Select Category</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="category_id[]" aria-label="Default select example" multiple>
                                    <option selected="" disabled>select category</option>
                                    @foreach($categories as $category)
                                    <option  value="{{$category->id}}"{{in_array($category->id,$editShop->categories->pluck('id')->toArray())?'selected':""}}>{{$category->name}}</option>
                                    @endforeach
                                    </select>
                            </div>
                        </div>
                    </div>
                    {{-- col1 end --}}
                     {{-- col1 start --}}
                     <div class="col-md-4">
                       
                        <div class="row mb-3">
                            <label class="col-sm-6 col-form-label">Select Subcategory</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="subcategory_id" aria-label="Default select example">
                                    <option selected="" disabled>select subcategory</option>
                                    @foreach($subcategories as $subcategory)
                                    <option value="{{$subcategory->id}}"{{$subcategory->id==$editShop->subcategory_id?"selected":""}}>{{$subcategory->name}}</option>
                                    @endforeach
                                    </select>
                            </div>
                        </div>
                    </div>
                    {{-- col1 end --}}
                     {{-- col1 start --}}
                     <div class="col-md-4">
                       
                        <div class="row mb-3">
                            <label class="col-sm-4 col-form-label">Select Vendor</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="vendor_id" aria-label="Default select example">
                                    <option selected="" disabled>select vendor</option>
                                    @foreach($vendors as $vendor)
                                    <option value="{{$vendor->id}}"{{$vendor->id==$editShop->vendor_id?"selected":""}}>{{$vendor->name}}</option>
                                    @endforeach
                                    </select>
                            </div>
                        </div>
                    </div>
                    {{-- col1 end --}}
                    </div>
                       
                        
                       
                       
                    
                        <div>
        
                            <input class="btn btn-primary" type="submit" value="UpdateShop">
                        </div>
                    </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        
        
    </div>
    
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_KydD32dnz6pHLHboOrlirZ_gGn5yPMI&libraries=places"></script>
<script>
    $(document).ready(function(){
        var autoComplete;
        var id = 'address';
        autoComplete = new google.maps.places.Autocomplete((document.getElementById(id)), {
            // types: ['geocode']
        });
    
        google.maps.event.addListener(autoComplete, 'place_changed', function(){
            var near_place = autoComplete.getPlace();
            jQuery("#latitude").val(near_place.geometry.location.lat());
            jQuery("#longitude").val(near_place.geometry.location.lng());
        if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    jQuery("#current_latitude").val(position.coords.latitude);
                    jQuery("#current_longitude").val(position.coords.longitude);
                    calculateDistance(position.coords.latitude, position.coords.longitude, near_place.geometry.location.lat(), near_place.geometry.location.lng());
                }, function(error) {
                    console.error("Error in getting current location: ", error.message);
                });
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        });
        
    });
    
    function calculateDistance(currentLat, currentLng, destLat, destLng){
        var service = new google.maps.DistanceMatrixService();
            service.getDistanceMatrix({
            origins: [new google.maps.LatLng('33.5803191', '72.9776058')],
            destinations: [new google.maps.LatLng(destLat, destLng)],
            travelMode: google.maps.TravelMode.DRIVING,
            unitSystem: google.maps.UnitSystem.METRIC,
            avoidHighways: false,
            avoidTolls: false
        }, callback);
    }
    
    
    function callback(response, status){
        if (status != google.maps.DistanceMatrixStatus.OK) {
            console.log('Something went wrong: ' + status);
        } else {
            if (response.rows[0].elements[0].status == 'ZERO_RESULTS') {
                console.log('No roads to cover distance');
            } else {
                var distance = response.rows[0].elements[0].distance;
                var time = response.rows[0].elements[0].duration;
                console.log(distance,time)
    
                
                jQuery('#distance_in_km').val(distance.value / 1000); // Convert meters to kilometers
                jQuery('#distance_in_time').val(time.value / 60); // Convert seconds to minutes
            }
        }
    }
    </script>
@endsection
