@extends('dashbord.app')

@section('content')
<div class="container-fluid mt-2">
    <div class="fw-bold text-black h4 mb-3">{{__('All products')}}</div>
    <div class="d-flex justify-content-between mb20 m-2">
        {{-- CREATE --}}
        <div class="col-left">
            <div class="title-actions">
                <a href="{{route('products.create')}}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> {{__('Add product')}}</a>
            </div>
        </div>
        {{-- SEARCH--}}
        <div class="col-left">
            <form action="{{route('products.index')}}" method="GET" class="filter-form filter-form-right d-flex justify-content-end flex-column flex-sm-row" role="search">
                <input type="text" value="{{Request()->name}}" name="name_search" placeholder="{{__('Search by name')}}" class="form-control" required />
                <button type="submit"  class="btn btn-info btn-sm ml-3 w-75"><i class="fas fa-search"></i>  {{__('Search')}}</button>
            </form>
        </div>
    </div>
    <div class="card p-1">
        <div class="card-body">
            <table class="table table-responsive-lg">
                @php
                    $n=1;
                @endphp
                <thead>
                    <tr class="bg-light">
                        <th>N°</th>
                        <th>Product name</th>
                        <th>Product price</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $products as $product )
                        <tr>
                            <td>{{$n++}}</td>
                            <td class="card-title">
                                <a href="{{route('products.edit',['product'=>$product->id])}}">{{$product->name}}</a>
                            </td>
                            <td class="text-black">
                                {{$product->price}}$
                            </td>
                            <td>
                                {{$product->category->name_category}}
                            </td>
                            <td width="100px">
                                @if($product->status)
                                  <span class="badge badge-success btn-sm">poblish</span>
                                @else
                                  <span class="badge badge-danger btn-sm">blockd</span>
                                @endif
                            </td>
                            <td width="150px">
                                <a href="{{route('products.edit',['product'=>$product->id])}}"class="btn btn-primary btn-sm"><i class="fas fa-edit "></i></a>
                                <button data-id='{{$product->id}}'  data-toggle="modal" data-target="#log2"  type="submit"  class="btn btn-danger btn-sm deleteP"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $products->links() }}
        </div>
    </div>
</div>
@include('stock::products.panel_delete')
@endsection
