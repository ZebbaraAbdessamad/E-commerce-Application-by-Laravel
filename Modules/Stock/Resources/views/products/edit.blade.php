@extends('dashbord.app')
@section('content')
    <div class="container-fluid">
        <div class="col-md-12 mt-3">
            <div class="text-left">
                <h4 class="fw-bold text-black">Product name : <span style="font-size: 18px;">{{__($product->name)}}</span></h4>
            </div>
            <div class="card p-4">
                <form action="{{route('products.update',['product'=>$product->id])}}" method="POST"  enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for=""><i class="text-info fas fa-caret-right"></i> Product name</label>
                                <input type="text" name="name_product" class="form-control @if($errors->get('name_product')) is-invalid @endif"  value="{{old('name_product',$product->name) ?? ''}}">
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
                                <label for=""><i class="text-info fas fa-caret-right"></i>  Product price</label>
                                <input type="text" name="price_product" class="form-control @if($errors->get('price_product')) is-invalid @endif"  value="{{old('price_product',$product->price) ?? ''}}">
                                @if($errors->get('price_product'))
                                    <div class="text-danger" >
                                        <ul style="list-style-type: none;">
                                            @foreach($errors->get('price_product') as $message)
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
                                <label for=""><i class="text-info fas fa-caret-right"></i>  Product description </label>
                                <textarea rows="3" name="description_product" class="form-control @if($errors->get('description_product')) is-invalid @endif">
                                    {{old('description_product',$product->description) ?? ''}}
                                </textarea>
                                @if($errors->get('description_product'))
                                    <div class="text-danger" >
                                        <ul style="list-style-type: none;">
                                            @foreach($errors->get('description_product') as $message)
                                            <li>{{$message}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mt-4">
                                <label> <i class="text-info fas fa-caret-right"></i> Status</label>
                                <br>
                                <br>
                                <span class="badge badge-success mr-5"> publish</span>
                                <input type="radio"   name="status"   @if($product->status==1) checked  @endif class=" @if($errors->get('status')) is-invalid @endif"  value="{{old('status',1) ?? '' }}">
                                <span class="badge badge-danger ml-5 mr-5"> blocked</span>
                                <input type="radio"   name="status"   @if($product->status==0) checked  @endif  class=" @if($errors->get('status')) is-invalid @endif" value="{{old('status',0) ?? '' }}"  >
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
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> <i class="text-info fas fa-caret-right"></i> Category</label>
                                <select required name="name_cat" class="form-control @if($errors->get('name_cat')) is-invalid @endif">
                                    @foreach ( $catgories as $catgory)
                                        <option value="{{$catgory->id}}" @if($catgory->id==$product->category_id) selected @endif>{{$catgory->name_category}}</option>
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for=""><i class="text-info fas fa-caret-right"></i> Product date </label>
                                <input type="date" name="date_product" value="@if(isset($product->created_at)){{old('date_product',date('Y-m-d',strtotime($product->created_at)))}}@else{{old('date_product')}}@endif" class="form-control has-datepicker input-group date @if($errors->get('date_product')) is-invalid @endif">
                                @if($errors->get('date_product'))
                                    <div class="text-danger" >
                                        <ul style="list-style-type: none;">
                                            @foreach($errors->get('date_product') as $message)
                                            <li>{{$message}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group-item" >
                                <div class="row">
                                    <div class="col-md-8">
                                        <label for=""><i class="text-info fas fa-caret-right"></i> Gallery</label>
                                        <div class="row">
                                            @if(!empty($product->images))
                                            @foreach($product->images as $image)
                                                <div class=" col-md-4">
                                                <img src="{{asset('images/Products/'.$product->category->name_category.'/'.$image->name)}}" class=" img-thumbnail img-responsive" style="width: 190px; height:170px;">
                                                <a style="margin-top:-68px;" href="{{route('image.remove',['id'=>$image->id])}}" class="btn btn-danger sm-btn p-1 ml-2" > <i class="fa fa-trash"></i></a>
                                                </div>
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4 pl-5">
                                        <label for=""><i class="text-info fas fa-caret-right pl-3"></i> Principal image</label>
                                        <img src="{{asset('images/Products/'.$product->category->name_category.'/'.$product->image)}}" class=" img-thumbnail img-responsive  border-left-primary shadow ml-3" style="width: 190px; height:170px;">
                                        <div class="form-group pl-5 pt-2">
                                            <input type="file" name="principe" id="file" class="inputfile ">
                                            <label for="file" required name="principe" style="margin-bottom: -7px;"> <i class="fas fa-upload"></i> Choose file</label>
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="file" id="files" name="img_product[]" multiple  class="inputfile2"/>
                                <label for="files"  style="margin-bottom: -7px;"><strong> <i class="fa fa-plus-circle" style="font-size:15px;"></i> {{__('Select images')}}</strong></label>
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
                        <div class="col-md-6">
                            <div class="text-right mt-5">
                                <button type="submit" class="form-control btn btn-primary center w-25"><i class="fas fa-chevron-circle-down"></i> submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
