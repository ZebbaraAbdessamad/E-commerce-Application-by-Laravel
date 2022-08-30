@extends('Frontend.app')
@section('content')

	@include('frontend::home.slide')
    @include('frontend::home.products')
    <!-- Load more -->
    <div class="flex-c-m flex-w w-full p-t-10">
        <a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
            Load More
        </a>
    </div>
	@include('frontend::home.blogs')

@endsection
