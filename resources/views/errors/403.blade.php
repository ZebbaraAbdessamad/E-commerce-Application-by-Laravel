
@extends('errors.layout')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid"style="padding-top: 150px;">
        <!-- 404 Error Text -->
        <div class="text-center" >
            <div class="error mx-auto" data-text="403">403</div>
            <p class="lead text-gray-800 mb-3">you don't have a permission !!</p>
            <p class="text-gray-500 mb-0">you do not have access to view this page , contact the admin !</p>
            <a href="{{route('frontend.home')}}">&larr; Back to Home</a>
        </div>
    </div>

@endsection

