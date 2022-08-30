@extends('dashbord.app')

@section('content')
    <div class="container-fluid mt-2">
        <div class="d-flex justify-content-between mb20 m-2">
        <div class="fw-bold text-black h4 mb-3"><i class="fas fa-shopping-basket"></i> {{__('All orders')}}</div>
            {{-- SEARCH--}}
            <div class="col-right">
                <form action="{{route('orders.index')}}" method="GET" class="filter-form filter-form-right d-flex justify-content-end flex-column flex-sm-row" role="search">
                    <input type="text" value="{{Request()->name}}" name="name_search" placeholder="{{__('Search by date')}}" class="form-control" required />
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
                            <th>Order date</th>
                            <th>Order user</th>
                            <th>Order delivery</th>
                            <th>Order status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $commands as $command )
                            <tr>
                                <td>{{$n++}}</td>
                                <td class="card-title">
                                     {{$command->created_at->toDateString()}}
                                </td>
                                <td class="card-title">
                                    {{$command->user->name }} {{$command->user->last_name }}
                                </td>
                                <td class="card-title">
                                    {{$command->delivery->method_delivery }}
                                </td>
                                <td>
                                    @if ($command->stauts_command=='command_processed')
                                    <span class="badge badge-success"> Processed</span>
                                    @elseif ($command->stauts_command=='processing')
                                        <span class="badge badge-info">Processing</span>
                                    @elseif($command->stauts_command=='not_yet')
                                        <span class="badge badge-danger">New</span>
                                    @endif
                                </td>
                                <td width="300px">
                                    <a href="{{route('orders.details',['slug'=>$command->slug])}}" class="btn btn-primary btn-sm"><i class=" fas fa-eye"></i> details  </a>
                                    <a href="{{route('orders.setting',['slug'=>$command->slug])}}" class="btn btn-warning btn-sm"><i class=" fas fa-cogs"></i> setting  </a>
                                    <button data-id='{{$command->id}}'  data-toggle="modal" data-target="#log_order"  class="btn btn-danger btn-sm delete_order"><i class="fas fa-trash-alt"></i> </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $commands->links() }}
            </div>
        </div>
    </div>
    @include('stock::orders.panel_delete')
@endsection
