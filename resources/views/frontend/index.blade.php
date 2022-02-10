@extends('layouts.frontend.master')
@section('content')
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">New Products</h3>
                    <!-- <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            <li class="active"><a data-toggle="tab" href="#tab1">Laptops</a></li>
                            <li><a data-toggle="tab" href="#tab1">Smartphones</a></li>
                            <li><a data-toggle="tab" href="#tab1">Cameras</a></li>
                            <li><a data-toggle="tab" href="#tab1">Accessories</a></li>
                        </ul>
                    </div> -->
                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <div id="tab1" class="tab-pane active">
                            <div class="products-slick" data-nav="#slick-nav-1">
                                <!-- product -->
                                @forelse ($products as $pro)
                                <div class="product">
                                    <a href="{{ url('products/'.$pro->id.'/view') }}">
                                        <div class="product-img">
                                            <img src="{{ URL::asset('imges/products/'.$pro->img); }}" alt="{{$pro->name}} photo">
                                            <div class="product-label">
                                                <!-- <span class="sale">-30%</span> -->
                                                <span class="new">NEW</span>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">{{ isset($pro->category->name) != null ? $pro->category->name : ''}}</p>
                                            <h3 class="product-name"><a title="View" href="{{ url('products/'.$pro->id.'/view') }}">{{ $pro->name ? $pro->name : ''}}</a></h3>
                                            <!-- <del class="product-old-price">$990.00</del> -->
                                            <h4 class="product-price">$ {{ $pro->price ? $pro->price : ''}} </h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-btns">
                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                <!-- <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button> -->
                                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <button title="add to cart" class="add-to-cart-btn"> <a href="{{ url('cart/'.$pro->id.'/add') }}"> <i class="fa fa-shopping-cart"></i> add to cart</a></button>
                                        </div>

                                    </a>
                                </div>
                                @empty
                                <div class="alert alert-info alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5><i class="fa fa-info"></i> NULL!</h5>
                                    NO data.
                                </div>
                                @endforelse

                                <!-- /product -->


                            </div>
                            <div id="slick-nav-1" class="products-slick-nav"></div>
                        </div>
                        <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->


@stop