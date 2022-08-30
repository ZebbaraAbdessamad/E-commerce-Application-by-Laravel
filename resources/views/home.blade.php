@extends('dashbord.app')
@section('content')

<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-4 col-sm-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <a href="{{route('categories.index')}}" class="nav-link">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <h5 class="font-weight-bold text-primary mb-1 w-75">
                                Categories management
                                </h5>
                            </div>
                            <div class="col-auto">
                                <i class=" fas fa-grip-horizontal text-primary" style="font-size: 45px;"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <a href="{{route('stock.index')}}" class="nav-link">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <h5 class="font-weight-bold  text-success mb-1 w-75">
                                    Stock management
                                </h5>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-boxes text-success" style="font-size: 45px;"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <a href="{{route('users.index')}}" class="nav-link">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <h5 class="font-weight-bold  text-info mb-1 w-75">
                                        Users management
                                </h5>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users  text-info"style="font-size: 45px;"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <a href="{{route('roles.index')}}" class="nav-link">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <h5 class="font-weight-bold  text-warning w-75">
                                    Roles & Permmision management
                                </h5>
                            </div>
                            <div class="col-auto">
                               <i class="fas fa-user-lock text-warning" style="font-size: 45px;"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-4">
            <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                    <a href="{{route('orders.index')}}" class="nav-link">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <h5 class="font-weight-bold  text-secondary mb-1 w-75">
                                    Orders management
                                </h5>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-hand-holding text-secondary" style="font-size: 45px;"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
