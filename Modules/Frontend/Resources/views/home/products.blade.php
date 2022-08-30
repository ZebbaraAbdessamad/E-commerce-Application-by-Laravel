  <!-- Product -->
  <section class="sec-product bg0 p-t-50 p-b-50">
    <div class="container">
        <div class="p-b-32">
            <h3 class="ltext-105 cl5 txt-center  p-b-20 respon1">
                Store Overview
            </h3>
        </div>
        <!-- Tab01 -->
        <div class="tab01">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                @foreach ($categories as $category )
                <input type="hidden" id="category1" value="{{$category->id}}">
                    <li class="nav-item p-b-10">
                        <a class="nav-link" data-toggle="tab" href="#{{$category->name_category}}" role="tab">
                            <img src="{{asset('images/Categories/icons/'.$category->image_category)}}" alt="img_ctegory" style="height: 40px; width: 40;">{{__($category->name_category)}}
                        </a>
                    </li>
                @endforeach
            </ul>
            <!-- Tab panes -->
            <div class="tab-content p-t-50">
                {{-- Orginal Box --}}
                    <div class="tab-pane fade show active" id="{{$example_category->name_category}}" role="tabpanel">
                        <!-- Slide2 -->
                        <div class="wrap-slick2">
                            <div class="slick2">
                                @foreach ($example_products as $product)
                                        <div class="item-slick2 p-t-1 p-b-100 ">
                                            <!-- Block2 -->
                                            <div class="block2"  style="width: 200px;height:200px; margin-left: 50px;">
                                                <div class="block2-pic hov-img0">
                                                    <img src="{{asset('images/products/'.$example_category->name_category.'/'.$product->image)}}" alt="IMG-PRODUCT" style="width: 200px;height:200px ;">
                                                    <a   href="{{route('product.show',['slug'=>$product->slug])}}" id="show-product" class="block2-btn flex-c-m stext-103 cl2 size-102 bg2 bor2 hov-btn1 p-lr-15 trans-04">
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
                        </div>
                    </div>

                {{-- secound Box --}}
                @foreach ($categories as $category )
                    <div class="tab-pane fade" id="{{$category->name_category}}" role="tabpanel">
                        <!-- Slide2 -->
                        <div class="wrap-slick2">
                            <div class="slick2">
                                @foreach ($products as $product)
                                    @if ( $category->id == $product->category->id )
                                        <div class="item-slick2 p-t-1 p-b-100 ">
                                            <!-- Block2 -->
                                            <div class="block2"  style="width: 200px;height:200px; margin-left: 50px;">
                                                <div class="block2-pic hov-img0">
                                                    <img src="{{asset('images/Products/'.$category->name_category.'/'.$product->image)}}" alt="IMG-PRODUCT" style="width: 200px;height:200px ;">
                                                    <a href="{{route('product.show',['slug'=>$product->slug])}}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg2 bor2 hov-btn1 p-lr-15 trans-04">
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
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@section('script')
@endsection
