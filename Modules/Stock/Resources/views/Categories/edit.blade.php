@extends('dashbord.app')

@section('content')
    <div class="container">
        <div class="col-md-10 offset-md-1">
            <div class="card p-2">
                <form action="{{route('categories.update',['category'=>$category->id])}}" method="POST"  enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    @csrf
                    <div class="card-header">
                        <h3 class="fw-bold text-black">Name : {{$category->name_category}}</h3>
                    </div>
                    <div class="row ">
                        <div class="col-md-8 mt-2">
                            <div class="col-md-12 pl-4">
                                <div class="form-group">
                                    <label for=""><i class="text-info fas fa-caret-right"></i>  Category name</label>
                                    <input type="text" name="name_cat" class="form-control @if($errors->get('name_cat')) is-invalid @endif"  value="{{old('name_cat',$category->name_category) ?? ''}}">
                                    @if($errors->get('name_cat'))
                                        <div class="text-danger" >
                                            <ul style="list-style-type: none;">
                                                @foreach($errors->get('name_cat') as $message)
                                                <li>{{$message}}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12 pl-4">
                                <div class="form-group mt-4">
                                    <label> <i class="text-info fas fa-caret-right"></i> Category status</label>
                                    <br>
                                    <span class="badge badge-success mr-5"> available</span>
                                    <input type="radio"   name="etat_cat"   @if($category->etat_category) checked  @endif class=" @if($errors->get('etat_cat')) is-invalid @endif"  value="{{old('etat_cat',1) ?? '' }}">
                                    <span class="badge badge-danger ml-5"> unavailable</span>
                                    <input type="radio"   name="etat_cat"   @if($category->etat_category==0) checked  @endif  class=" @if($errors->get('etat_cat')) is-invalid @endif" value="{{old('etat_cat',0) ?? '' }}"  >
                                    @if($errors->get('etat_cat'))
                                        <div class="text-danger" >
                                            <ul style="list-style-type: none;">
                                                @foreach($errors->get('etat_cat') as $message)
                                                <li>{{$message}}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group mt-5">
                                    <button type="submit" class="form-control btn btn-primary center w-100"><i class="fas fa-chevron-circle-down"></i> submit</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mt-2 pl-5">
                            <label for=""><i class="text-info far fa-image ml-5"></i> Image</label>
                            <div class="form-group">
                                <img class="img-thumbnail ml-2" src="{{asset('images/Categories/icons/'.$category->image_category)}}"  style="width: 10rem;height: 10rem; ">
                            </div>
                            <div class="form-group pl-4">
                                <input type="file" name="img_cat" id="file" class="inputfile  @if($errors->get('img_cat')) is-invalid @endif"/>
                                <label for="file" required name="img_cat" style="margin-bottom: -7px;"   class=" @if($errors->get('img_cat')) is-invalid @endif"> <i class="fas fa-upload"></i> Choose file</label>
                                @if($errors->get('img_cat'))
                                    <div class="text-danger" >
                                        <ul style="list-style-type: none;">
                                            @foreach($errors->get('img_cat') as $message)
                                            <li>{{$message}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

