@extends('frontend.frontend_dashboard')
@section('frontend_content')

<!-- Hero Section End -->

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('frontend/img/breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Organi Shop</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Department</h4>
                        <ul >
                            <h2 >Daily Uses</h2>
                            @foreach($options1 as $option1)
                            <div>
                            <a href="{{route('frontendCategoryProduct',$option1->id)}}" class="text-dark val w-100" data-id="{{$option1->id}}">
                                    <div class="d-flex justify-content-between  mt-1">
    
                                        <span style="padding-left:5px;">{{ $option1->name }}</span>
                                        <span class="badge border rounded-5" style="width:20px; height:20px; border-radius:50%;margin-right:8px;">
                                            {{ $option1->shops_count }}
                                        </span>
                                    </div>
                                </a>
                            </div>
                            
                            @endforeach
                            
                            </ul>
                            <ul >
                                <h2>Health && Care</h2>
                                @foreach($options2 as $option2)
                                    <div class="d-flex">
                                        <a href="{{route('frontendPrescption',$option2->id)}}" class="text-dark val w-100" data-id="{{$option2->id }}">
                                            <div class="d-flex justify-content-between mt-1">
                                                <span style="padding-left:5px;">{{ $option2->name }}</span>
                                                <span class="badge border" style="width:20px; height:20px; border-radius:50%;margin-right:8px;">
                                                    {{ $option2->shops_count }} 
                                                </span>
                                            </div>
                                                
                                    </a>
                                    </div>
                                @endforeach
                                @foreach($options2_2 as $option2)
                                <div class="d-flex">
                                    <a href="{{route('frontendMedicalAid',$option2->id)}}" class="text-dark val w-100" data-id="{{$option2->id }}">
                                        <div class="d-flex justify-content-between mt-1">
                                            <span style="padding-left:5px;">{{ $option2->name }}</span>
                                            <span class="badge border" style="width:20px; height:20px; border-radius:50%;margin-right:8px;">
                                                {{ $option2->shops_count }} 
                                            </span>
                                        </div>
                                            
                                </a>
                                </div>
                            @endforeach
                                
                                </ul>
                                <ul >
                                    <h2>Trouble shooting</h2>
                                    @foreach($options3 as $option3)
                                        <div class=" ">
                                            <a href="{{route('frontendCategoryProduct',$option3->id)}}" class="text-dark val w-100 " data-id="{{$option3->id }}">
                                                <div class="d-flex justify-content-between mt-1">
    
                                                    <span style="padding-left:5px;">{{ $option3->name }}</span>
                                                    <span class="badge border " style="width:20px; height:20px; border-radius:50%; margin-right:8px;">
                                                        {{ $option3->shops_count }}
                                                    </span>
                                                </div>
                                            </a>
                                        </div>
                                       
                                    @endforeach
                                    
                                    </ul>
                        
                    </div>
                    <div class="sidebar__item">
                        <h4>Price</h4>
                        <div class="price-range-wrap">
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="10" data-max="540">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                            <div class="range-slider">
                                <div class="price-input">
                                    <input type="text" id="minamount">
                                    <input type="text" id="maxamount">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar__item sidebar__item__color--option">
                        <h4>Colors</h4>
                        <div class="sidebar__item__color sidebar__item__color--white">
                            <label for="white">
                                White
                                <input type="radio" id="white">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--gray">
                            <label for="gray">
                                Gray
                                <input type="radio" id="gray">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--red">
                            <label for="red">
                                Red
                                <input type="radio" id="red">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--black">
                            <label for="black">
                                Black
                                <input type="radio" id="black">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--blue">
                            <label for="blue">
                                Blue
                                <input type="radio" id="blue">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--green">
                            <label for="green">
                                Green
                                <input type="radio" id="green">
                            </label>
                        </div>
                    </div>
                    <div class="sidebar__item">
                        <h4>Popular Size</h4>
                        <div class="sidebar__item__size">
                            <label for="large">
                                Large
                                <input type="radio" id="large">
                            </label>
                        </div>
                        <div class="sidebar__item__size">
                            <label for="medium">
                                Medium
                                <input type="radio" id="medium">
                            </label>
                        </div>
                        <div class="sidebar__item__size">
                            <label for="small">
                                Small
                                <input type="radio" id="small">
                            </label>
                        </div>
                        <div class="sidebar__item__size">
                            <label for="tiny">
                                Tiny
                                <input type="radio" id="tiny">
                            </label>
                        </div>
                    </div>
                    <div class="sidebar__item">
                        <div class="latest-product__text">
                            <h4>Latest Products</h4>
                            <div class="latest-product__slider owl-carousel">
                                <div class="latest-prdouct__slider__item">
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{asset('frontend/img/latest-product/lp-1.jpg')}}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Crab Pool Security</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{asset('frontend/img/latest-product/lp-2.jpg')}}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Crab Pool Security</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{asset('frontend/img/latest-product/lp-3.jpg')}}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Crab Pool Security</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="latest-prdouct__slider__item">
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{asset('frontend/img/latest-product/lp-1.jpg')}}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Crab Pool Security</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{asset('frontend/img/latest-product/lp-2.jpg')}}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Crab Pool Security</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{asset('frontend/img/latest-product/lp-3.jpg')}}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Crab Pool Security</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <div class="product__discount">
                    <div class="section-title product__discount__title">
                        <h2>Sale Off</h2>
                    </div>
                    <div class="row">
                        
                         
                        @if($services->isEmpty())
                        <h2>No service found</h2>
                    @else
                        @foreach($services as $service)
                            <div class="col-lg-4">
                                <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg"
                                        data-setbg="{{!empty($categoryProduct->product_image)
                                        ?url('upload/product_image/'.$categoryProduct->product_image):"no image"}}">
                                        <div class="product__discount__percent">-20%</div>
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__discount__item__text">
                                        <span>{{$service['category']['name']}}</span>
                                        <h5><a href="#">{{$service->service_name}}</a></h5>
                                        <h5><a href="#">{{$service->description}}</a></h5>

                                        
                                      


                                     

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    
                   
                </div>
                </div>
                <div class="filter__item">
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="filter__sort">
                                <span>Sort By</span>
                                <select>
                                    <option value="0">Default</option>
                                    <option value="0">Default</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="filter__found">
                                <h6><span>16</span> Products found</h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3">
                            <div class="filter__option">
                                <span class="icon_grid-2x2"></span>
                                <span class="icon_ul"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                 
                </div>
                <div class="product__pagination">
                    <a href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection