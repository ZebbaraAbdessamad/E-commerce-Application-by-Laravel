@extends('dashbord.app')

@section('content')
    <div class="container-fluid mt-2">
        <div class="fw-bold text-black h4 mb-3">{{__('All Categories')}}</div>
        <div class="d-flex justify-content-between mb20 m-2">
            {{-- CREATE --}}
            <div class="col-left">
                <div class="title-actions">
                    <a href="{{route('categories.create')}}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> {{__('Add Category')}}</a>
                </div>
            </div>
            {{-- SEARCH--}}
            <div class="col-left">
                <form action="{{route('categories.index')}}" method="GET" class="filter-form filter-form-right d-flex justify-content-end flex-column flex-sm-row" role="search">
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
                            <th>Category name</th>
                            <th>Category status</th>
                            <th>Category image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $categories as $category )
                            <tr>
                                <td>{{$n++}}</td>
                                <td class="card-title">
                                    <a href="{{route('categories.edit',['category'=>$category->id])}}">{{$category->name_category}}</a>
                                </td>
                                <td width="200px">
                                    @if($category->etat_category)
                                      <span class="badge badge-success btn-sm">available</span>
                                    @else
                                      <span class="badge badge-danger btn-sm">unavailable</span>
                                    @endif
                                </td>
                                <td width="200px">
                                    <img style="width: 60px; height:60px;" src="{{asset('images/Categories/icons/'.$category->image_category)}}" alt="">
                                </td>
                                <td width="200px">
                                    <a href="{{route('categories.edit',['category'=>$category->id])}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit  </a>
                                    <button data-id='{{$category->id}}'  data-toggle="modal" data-target="#log1"  class="btn btn-danger btn-sm deleteModal"><i class="fa fa-trash"></i> delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $categories->links() }}
            </div>
        </div>
    </div>

    @include('stock::Categories.panel_delete')
@endsection
