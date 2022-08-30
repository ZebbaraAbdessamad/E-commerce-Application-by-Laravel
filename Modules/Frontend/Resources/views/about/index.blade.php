@extends('Frontend.app')
@section('content')
<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image:url('{{asset('images/about/1625248255.jpg')}}'); margin-top:-30px;">
    <h2 class="ltext-105 cl0 txt-center">
        About
    </h2>
</section>

<!-- Content page -->
<section class="bg0 p-t-75 p-b-20">
    <div class="container">
        <div class="row p-b-48">
            <div class="col-md-7 col-lg-8">
                <div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
                    <h3 class="mtext-111 cl2 p-b-16">
                        Our Story
                    </h3>

                    <p class="stext-113 cl6 p-b-26">
                        Artisanant Store is an online store that offers you the best products of Moroccan craftsmanship. Carefully and finely crafted by our master craftsmen. A wide choice is available for you with the best value for money.
                        Manufacturer, wholesaler and retailer, at Artisanant Store you will find a multitude of products purely from Moroccan craftsmanship: Blankets, Fouta, scarves, poufs, cushions, table runners and tablecloths, curtains and tiebacks, carpets, traditional clothing, slippers and sandals, bag, belt and basket, the art of wood, copper, silver metal, pottery, candle and perfumes. Thus, for a better satisfaction,
                        Artisanant Store guarantees you the personalization of certain products under order.
                    </p>
                </div>
            </div>

            <div class="col-11 col-md-5 col-lg-4 m-lr-auto">
                <div class="how-bor1 ">
                    <div class="hov-img0">
                        <img src="{{asset('images/about/artisans-2048-shot-2-1.jpg')}}" alt="IMG">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="order-md-2 col-md-7 col-lg-8 p-b-30">
                <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
                    <h3 class="mtext-111 cl2 p-b-16">
                        Our Mission
                    </h3>

                    <p class="stext-113 cl6 p-b-26">
                        The task of Artisanat Store is to promote Moroccan crafts products in national and international markets, encourage the development of craft production and facilitate its sale both in the internal market and in the foreign market.
                    </p>
                    <p class="stext-113 cl6 p-b-26">
                        Do not hesitate to follow us on our Instagram and Facebook page and invite your friends and relatives to follow our news and promotions and take full advantage of them.
                    </p>

                </div>
            </div>

            <div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
                <div class="how-bor2">
                    <div class="hov-img0">
                        <img src="{{asset('images/about/abdu_2048x2048.webp')}}" alt="IMG">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
