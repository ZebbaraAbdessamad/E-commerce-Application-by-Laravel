@extends('Frontend.app')
@section('content')
    <div class="container-fluid">
        <div class="bg0 p-t-20  p-lr-15h-lg ow-pos3-parent">
            <div class="row  ml-5">
                <div class="col-md-6 col-lg-6 col-sm-12 p-b-30 " style="padding-bottom: 3%;">
                    <div class=" p-r-1 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w" style="width: 500px;height: 500px;">
                            <div class="wrap-slick3-dots" style="width: 100px;height:100px;"></div>
                            <div class="wrap-slick3-arrows flex-sb-m flex-w"  style="width:70%;height: 70%;"></div>
                            <div class="slick3 gallery-lb" style="width: 70%;height:70%;">
                                <div class="item-slick3" data-thumb="{{asset('images/Products/'.$product->category->name_category.'/'.$product->image)}}">
                                    <div class="wrap-pic-w pos-relative">
                                        <img src="{{asset('images/Products/'.$product->category->name_category.'/'.$product->image)}}" alt="IMG-PRODUCT" >
                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{asset('images/Products/'.$product->category->name_category.'/'.$product->image)}}">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>
                                </div>
                                @if (isset($product->images))
                                    @foreach ( $product->images as $image)
                                    <div class="item-slick3" data-thumb="{{asset('images/Products/'.$product->category->name_category.'/'.$image->name)}}">
                                        <div class="wrap-pic-w pos-relative">
                                            <img src="{{asset('images/Products/'.$product->category->name_category.'/'.$image->name)}}" alt="IMG-PRODUCT" >
                                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{asset('images/Products/'.$product->category->name_category.'/'.$image->name)}}">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12 mt-1">
                    <div class="p-r-50 p-t-1 pl-4">
                        <h4 class="mtext-105 cl2">
                         {{$product->name}}
                        </h4>
                        <span class="mtext-106 cl2 text-success">
                            {{$product->price}}$
                        </span>
                        <p class="stext-102 cl3 p-t-13">
                            {{$product->description}}
                        </p>

                        <!--  -->
                        <form action="{{route('add.cart',['id'=>$product->id])}}" method="post">
                            @csrf
                            <div class="p-t-33">
                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-203 flex-c-m respon6">
                                        Quantity
                                    </div>
                                    <div class="size-204 respon6-next">
                                        <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-minus"></i>
                                            </div>
                                            <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1">
                                            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-plus"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-204 respon6-next">
                                        <button  type="submit" class="btn btn-primary hov-btn1">
                                            <i class="fas fa-cart-plus"></i>  Add to cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--  -->
                        <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row mb-4" style="margin-top: -90px; margin-left: 50px;margin-right: 40px; ">
            <div class="wrap-slick2">
                <h5 class="fw-bold text-black mb-4"><i class="fas fa-list-alt"></i> OTHER PRODUCTS IN THE SAME CATEGORY:</h5>
                <div class="slick2">
                    @foreach ($products as $product)
                            <div class="item-slick2 p-t-1 p-b-100 ">
                                <!-- Block2 -->
                                <div class="block2"  style="width: 200px;height:200px; margin-left: 50px;">
                                    <div class="block2-pic hov-img0">
                                        <img src="{{asset('images/products/'.$product->category->name_category.'/'.$product->image)}}" alt="IMG-PRODUCT" style="width: 200px;height:200px ;">
                                        <a href="{{route('product.show',['slug'=>$product->slug])}}" id="show-product" class="block2-btn flex-c-m stext-103 cl2 size-102 bg2 bor2 hov-btn1 p-lr-15 trans-04">
                                            Details
                                        </a>
                                    </div>
                                    <div class="block2-txt flex-w flex-t p-t-14" >
                                        <div class="block2-txt-child1 flex-col-l ">
                                            <strong  class="stext-104 cl4 hov-cl1 trans-04 text-black">
                                                {{__($product->name)}}
                                             </strong>
                                             <a href="{{route('add.cart',['id'=>$product->id])}}" class="btn btn-primary btn-sm mt-2 add_cart">
                                                <i class="fas fa-cart-plus"></i> {{__('Add to cart')}}
                                            </a>
                                        </div>
                                        <div class="block2-txt-child2 flex-r p-t-3" >
                                            <span class="fw-bold  text-success">
                                                {{__($product->price)}}$
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
