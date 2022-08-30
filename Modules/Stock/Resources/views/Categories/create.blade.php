
@extends('dashbord.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <form action="{{route('categories.store')}}" method="POST" class="needs-validation" enctype="multipart/form-data">
                @csrf
                <div class="col-md-10 offset-md-1 mt-2">
                    <div class="fw-bold text-black h4 ">
                        Add new category
                     </div>
                    <div class="card  border-left-secondary shadow  mt-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> <i class="text-info fas fa-caret-right"></i>Category name</label>
                                        <input type="text" required name="name_cat"  value="{{old('name_cat') ?? '' }}"  class="form-control @if($errors->get('name_cat')) is-invalid @endif">
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
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mt-3">
                                        <label> <i class="text-info fas fa-caret-right"></i>Category status</label>
                                        <br>
                                        <span class="badge badge-success mr-5"> available</span>
                                        <input type="radio"   name="etat_cat" value="{{old('etat_cat',1) ?? '' }}" class=" @if($errors->get('etat_cat')) is-invalid @endif"  >
                                        <span class="badge badge-danger ml-5"> unavailable</span>
                                        <input type="radio"   name="etat_cat" value="{{old('etat_cat',0) ?? '' }}" class="ml-5" @if($errors->get('etat_cat')) is-invalid @endif"  >
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
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="text-left mb-2 ">
                                        <label > <i class="text-info fas fa-caret-right"></i> Image</label>
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
                                <div class="col">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

