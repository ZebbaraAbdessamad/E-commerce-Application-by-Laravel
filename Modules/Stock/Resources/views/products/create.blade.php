
@extends('dashbord.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <form action="{{route('products.store')}}" method="POST" class="needs-validation" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12  mt-4">
                    <div class="fw-bold text-black h4 ">
                        Add new product
                     </div>
                    <div class="card  border-left-secondary shadow  mt-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> <i class="text-info fas fa-caret-right"></i> Product name</label>
                                        <input type="text" required name="name_product"  value="{{old('name_product') ?? '' }}"  class="form-control @if($errors->get('name_product')) is-invalid @endif">
                                        @if($errors->get('name_product'))
                                            <div class="text-danger" >
                                                <ul style="list-style-type: none;">
                                                    @foreach($errors->get('name_product') as $message)
                                                    <li>{{$message}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> <i class="text-info fas fa-caret-right"></i> Price</label>
                                        <input type="number" required name="price"  value="{{old('price') ?? '' }}"  class="form-control @if($errors->get('price')) is-invalid @endif">
                                        @if($errors->get('price'))
                                            <div class="text-danger" >
                                                <ul style="list-style-type: none;">
                                                    @foreach($errors->get('price') as $message)
                                                    <li>{{$message}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label> <i class="text-info fas fa-caret-right"></i> Status</label>
                                        <br>
                                        <span class="badge badge-success mr-5"> publish</span>
                                        <input type="radio"   name="status"  class=" @if($errors->get('status')) is-invalid @endif"  value="{{old('status',1) ?? '' }}">
                                        <span class="badge badge-danger ml-5 mr-5"> blocked</span>
                                        <input type="radio"   name="status"   class=" @if($errors->get('status')) is-invalid @endif" value="{{old('status',0) ?? '' }}"  >
                                        @if($errors->get('status'))
                                            <div class="text-danger" >
                                                <ul style="list-style-type: none;">
                                                    @foreach($errors->get('status') as $message)
                                                    <li>{{$message}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> <i class="text-info fas fa-caret-right"></i> Category</label>
                                        <select required name="name_cat"  value="{{old('name_cat') ?? '' }}" class="form-control @if($errors->get('name_cat')) is-invalid @endif">
                                            @foreach ( $catgories as $catgory)
                                                <option value="{{$catgory->id}}">{{$catgory->name_category}}</option>
                                            @endforeach
                                        </select>
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> <i class="text-info fas fa-caret-right"></i> Description</label>
                                        <textarea required name="description"  class="form-control @if($errors->get('description')) is-invalid @endif"> {{old('description') ?? '' }} </textarea>
                                        @if($errors->get('description'))
                                            <div class="text-danger" >
                                                <ul style="list-style-type: none;">
                                                    @foreach($errors->get('description') as $message)
                                                    <li>{{$message}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> <i class="text-info fas fa-caret-right"></i> Stock quantity</label>
                                        <input type="number" required name="stock_quantity" value="{{old('stock_quantity') ?? '' }}"  class="form-control @if($errors->get('stock_quantity')) is-invalid @endif"></textarea>
                                        @if($errors->get('stock_quantity'))
                                            <div class="text-danger" >
                                                <ul style="list-style-type: none;">
                                                    @foreach($errors->get('stock_quantity') as $message)
                                                    <li>{{$message}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mt-3">
                                    <div class="text-left">
                                        <label> <i class="text-info far fa-image ml-2"></i> Gallery</label>
                                        <br>
                                        <input type="file" id="files" name="img_product[]" multiple  class="inputfile2"/>
                                        <label for="files"  style="margin-bottom: -7px;"><i class="fas fa-upload"></i>  {{__('Select images')}}</label>
                                        @if($errors->get('img_product'))
                                            <div class="text-danger" >
                                                <ul style="list-style-type: none;">
                                                    @foreach($errors->get('img_product') as $message)
                                                    <li>{{$message}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3 p-l-3">
                                    <div class="text-center">
                                        <label> <i class="text-info fas fa-caret-right"></i> Principal image</label>
                                        <br>
                                        <input type="file" name="principe" id="file" class="inputfile"  />
                                        <label for="file" style="margin-bottom: -7px;"> <i class="fas fa-upload"></i> Choose file</label>
                                        @if($errors->get('principe'))
                                            <div class="text-danger" >
                                                <ul style="list-style-type: none;">
                                                    @foreach($errors->get('principe') as $message)
                                                    <li>{{$message}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary mt-5"><i class="fas fa-chevron-circle-down"></i> submit</button>
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

