@extends('Frontend.app')
@section('content')

<div class="bg0 m-t-23 p-b-140">
    <div class="container">
        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                    <i class=" fas fa-align-justify" style="font-size: 20px;"></i>
                    All Products
                </button>
                @foreach ($categories as $category )
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".{{$category->name_category}}">
                        <img src="{{asset('images/Categories/icons/'.$category->image_category)}}" alt="img_ctegory" style="height: 40px; width: 40;">{{__($category->name_category)}}
                    </button>
                @endforeach
            </div>
            <div class="flex-w flex-c-m m-tb-10">
                <div class="bor17 of-hidden pos-relative">
                    <form action="" method="GET" class="filter-form filter-form-right d-flex justify-content-end flex-column flex-sm-row" role="search">
                        <input class="stext-103 cl2 plh4 size-116 p-l-28 p-r-55" type="text" value="{{Request()->name}}" name="name_search" placeholder="Search" required>
                        <button type="submit" class="flex-c-m size-122 ab-t-r fs-18 cl4 hov-cl1 trans-04">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="row isotope-grid">
            @foreach ($products as $product)
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{$product->category->name_category}}">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <img src="{{asset('images/products/'.$product->category->name_category.'/'.$product->image)}}" alt="IMG-PRODUCT" style="width: 200px;height:200px ;">
                            <a href="{{route('product.show',['slug'=>$product->slug])}}" id="show-product" class="block2-btn flex-c-m stext-103 cl2 size-102 bg2 bor2 hov-btn1 p-lr-15 trans-04">
                                Details
                            </a>
                        </div>
                        <div class="block2-txt flex-w flex-t p-t-14" >
                            <div class="block2-txt-child1 flex-col-l ">
                                <strong  class="stext-104 cl4 hov-cl1 trans-04 text-black ">
                                   {{__($product->name)}}
                                </strong>
                                <a href="{{route('add.cart',['id'=>$product->id])}}" class="btn btn-primary btn-sm mt-2 add_cart">
                                   <i class="fas fa-cart-plus"></i> {{__('Add to cart')}}
                                 </a>
                            </div>
                            <div class="block2-txt-child2" >
                                <span class="fw-bold  text-success">
                                    {{__($product->price)}}$
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $products->links() }}
        <!-- Load more -->
        <div class="flex-c-m flex-w w-full p-t-45 mb-3">
            <a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                Load More
            </a>
        </div>
    </div>
</div>

@endsection
