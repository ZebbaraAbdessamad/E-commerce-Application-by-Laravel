
@extends('errors.layout')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid"style="padding-top: 150px;">
        <!-- 404 Error Text -->
        <div class="text-center">
            <div class="error mx-auto" data-text="404">404</div>
            <p class="lead text-gray-800 mb-5">Page Not Found <i class="fas fa-sad-tear"></i></p>
            <p class="text-gray-500 mb-0"> It looks like you found a glitch in the matrix...</p>
            <a href="{{route('frontend.home')}}">&larr; Back to Home</a>
        </div>
    </div>
@endsection

