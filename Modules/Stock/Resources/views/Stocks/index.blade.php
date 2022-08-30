@extends('dashbord.app')
@section('content')
    <div class="container-fluid mt-2">
        <div class="fw-bold text-black h4 mb-3">{{__('Stock')}}</div>
        <div class="d-flex justify-content-between mb20 m-2">
            {{-- CREATE --}}
            <div class="col-left">
                <div class="title-actions">
                    <a href="{{route('products.create')}}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> {{__('Add new product')}}</a>
                </div>
            </div>
            {{-- SEARCH--}}
            <div class="col-left">
                <form action="{{route('stock.index')}}" method="GET" class="filter-form filter-form-right d-flex justify-content-end flex-column flex-sm-row" role="search">
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
                            <th>Stock status</th>
                            <th>Product quantity</th>
                            <th>Add new quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $stocks as $stock )
                            <tr>
                                <td>{{$n++}}</td>
                                <td class="card-title">
                                   {{$stock->product->name}}
                                </td>
                                <td width="200px">
                                    @if($stock->status && $stock->quantity!=0 )
                                      <span class="badge badge-success btn-sm">available</span>
                                    @else
                                      <span class="badge badge-warning btn-sm">empty</span>
                                    @endif
                                </td>
                                <td>
                                    {{$stock->quantity}}
                                </td>
                                <td width="200px">
                                    <form action="{{route('stock.add_quantity')}}" method="post">
                                        @csrf
                                        <div class="d-flex">
                                            <input type="hidden" name="hidden_id_stock" value="{{$stock->id}}">
                                            <input type="number" name="stock_quantity"  required class="form-control w-50 @if($errors->get('stock_quantity')) is-invalid @endif">
                                            <button type="submit" class="btn btn-primary btn-sm ml-2"><i class="fas fa-plus-circle "></i> add</button>
                                        </div>
                                    </form>
                                </td>
                                <td>
                                    <button data-id='{{$stock->id}}'  data-toggle="modal" data-target="#log5"  class="btn btn-danger btn-sm delete_stock"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $stocks->links() }}
            </div>
        </div>
    </div>
    @include('stock::Stocks.panel_delete')
@endsection
