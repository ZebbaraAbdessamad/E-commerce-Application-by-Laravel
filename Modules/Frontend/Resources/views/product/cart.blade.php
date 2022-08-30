@extends('Frontend.app')
@section('content')
	<!-- Shoping Cart -->
<form action="{{route('add.command')}}"  method="POST" class="bg0 p-t-25 p-b-85 ">
    @csrf
    <div class="container">
        <div class="row">
            <div class="@if (!empty(Auth::user()) && Auth::user()->information_etat==1) col-lg-9 offset-1  @else   col-xl-7 m-lr-auto m-b-50 @endif">
                <div class="m-l-25 m-r--80 m-lr-0-xl">
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tr class="table_head">
                                <th class="column-1">Product</th>
                                <th class="column-2"></th>
                                <th class="column-3">Price</th>
                                <th class="column-3">Quantity</th>
                                <th class="column-5">Total</th>
                                <th class="column-2">Action</th>
                            </tr>
                            @if(!empty(session('cart')))
                                @foreach ( (array) session('cart') as $key => $cart )
                                    <tr class="table_row" data-id="{{$key}}">
                                        <td class="column-1">
                                            <div class="how-itemcart1">
                                                <img src="{{asset('images/Products/'.$cart['category'].'/'.$cart['image'])}}" alt="IMG">
                                            </div>
                                            <input type="hidden" name="id_product[]" value="{{$key}}">
                                        </td>
                                        <td class="column-2">{{$cart['name']}}</td>
                                        <td class="column-3">{{$cart['price']}}$</td>
                                        <td class="column-4">
                                            <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                                <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-minus"></i>
                                                </div>
                                                <input class="mtext-104 cl3 txt-center num-product quantity-product" type="number" name="quantity[]" value="{{old('quantity[]', $cart['quantity'] ?? '')}}">
                                                <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-plus"></i>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="column-5">{{ $cart['price']*$cart['quantity']}}$</td>
                                        <td>
                                            <button class="btn btn-danger btn-sm remove-from-cart"> <i class="fa fa-trash"></i> </button>
                                            <button class="btn btn-primary btn-sm  edit-from-cart"> <i class="fa fa-edit"></i> </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                    </div>
                    <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                        <div class="flex-w flex-m m-r-20 m-tb-5">
                            @php
                                $total=0;
                            @endphp
                            @if(!empty(session('cart')))
                                @foreach ( (array) session('cart') as $key => $cart )
                                    @php
                                        $total+=$cart['price']*$cart['quantity'];
                                    @endphp
                                @endforeach
                            @endif
                            <div class="flex-c-m stext-101 cl2 size-118 bg8" style="width: 200px;">
                                Total amount : <span class="text-black ml-2"> {{$total}}$</span>
                                <input type="hidden" name="Total_amount" value="{{$total}}">
                            </div>
                        </div>

                        <div class="flex-c-m stext-101 cl2 size-118 bg8" style="width: 200px;">
                            @php
                            $quantity=0;
                            @endphp
                            @if(!empty(session('cart')))
                                @foreach ( (array) session('cart') as $key => $cart )
                                    @php
                                        $quantity+=$cart['quantity'];
                                    @endphp
                                @endforeach
                            @endif
                            Total quatity : <span class="text-black ml-2"> {{$quantity}}</span>
                            <input type="hidden" name="Total_quatity" value="{{$quantity}}">
                        </div>

                    </div>
                </div>
                <div class="col-lg-12 col-sm-6">
                    <div class="ml-1  m-r--100 mt-4">
                        <span class="bg-secondary p-2 text-white">
                            <i class=" fas fa-shipping-fast"></i> Delivery method
                        </span>
                        <div class="card mt-2">
                            <div class="card-body">
                                <strong for=""><span class="text-danger">*</span> Delivery method</strong>
                                <div class="flex-b mb-3  mt-2 ml-2">
                                    home delivery   <input class="ml-3 mr-5" type="radio" name="delivery_method" value="{{old('delivery_method' ,'home delivery') ?? ''}}" id="noCheck" onclick="javascript:yesnoCheck()">
                                    relay point  <input class="ml-3" type="radio" name="delivery_method" value="{{old('delivery_method' ,'relay point') ?? ''}}" id="yesCheck" onclick="javascript:yesnoCheck()">
                                    @if($errors->get('delivery_method'))
                                        <div class="text-danger" >
                                            <ul style="list-style-type: none;">
                                                @foreach($errors->get('delivery_method') as $message)
                                                <li>{{$message}}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <select name="sepecified_address" required class="form-control custom-select @if($errors->get('country')) is-invalid @endif"  id="ifYes" style="visibility: hidden;" >
                                        @foreach (get_address() as $address )
                                            <option value="{{$address}}"> {{$address}} </option>
                                        @endforeach
                                    </select>
                                    @if($errors->get('sepecified_address'))
                                        <div class="text-danger" >
                                            <ul style="list-style-type: none;">
                                                @foreach($errors->get('sepecified_address') as $message)
                                                <li>{{$message}}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <strong for="">Description</strong>
                                    <textarea name="description" class="form-control">
                                        {{old('description')}}
                                    </textarea>
                                </div>
                                <button class="btn btn-primary btn-sm mt-2"  type="submit">
                                    <i class="fas fa-chevron-circle-down"></i> Confirm command
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if (empty(Auth::user()) || (Auth::user()->information_etat==0) )
                <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-10">
                    <div class="row" style="margin-left: 70px;">
                        <span class="bg-secondary p-2 text-white" style="width: 90%; margin-left: 6px;" >
                            <i class="fa fa-user"></i> Personal informations
                        </span>
                        <div class="col-lg-11">
                            <div class="row">
                                <div class="flex-b mt-3">
                                    <a  class="btn btn-warning btn-sm" href="{{route('register')}}">Create account</a>
                                    <a class="btn btn-warning btn-sm ml-5" href="{{route('login')}}">Already have an account</a>
                                </div>
                                <strong class="mt-2 mb-2">Other information</strong>
                                <div class="card">
                                    <div class="card-body">
                                        <label for=""><span class="text-danger">*</span> gender</label>
                                        <div class="flex-b mb-3 form-control">
                                            Mr <input  class="ml-5 mr-5" type="radio" name="gender" value="{{old('gender' ,1) ?? ''}}">
                                            Ms <input  class="ml-5" type="radio" name="gender" value="{{old('gender' ,0) ?? ''}}">
                                        </div>
                                        @if($errors->get('gender'))
                                            <div class="text-danger" >
                                                <ul style="list-style-type: none;">
                                                    @foreach($errors->get('gender') as $message)
                                                    <li>{{$message}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <label ><span class="text-danger">*</span>country</label>
                                            <input type="text" name="country" value="{{old('country')}}" class="form-control   @if($errors->get('country')) is-invalid @endif">
                                            @if($errors->get('country'))
                                                <div class="text-danger" >
                                                    <ul style="list-style-type: none;">
                                                        @foreach($errors->get('country') as $message)
                                                        <li>{{$message}}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        <label ><span class="text-danger">*</span>city</label>
                                            <input type="text" name="city" value="{{old('city')}}" class="form-control  @if($errors->get('city')) is-invalid @endif">
                                            @if($errors->get('city'))
                                                <div class="text-danger" >
                                                    <ul style="list-style-type: none;">
                                                        @foreach($errors->get('city') as $message)
                                                        <li>{{$message}}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        <label><span class="text-danger">*</span>address</label>
                                            <input type="text" name="address"value="{{old('address')}}"  class="form-control  @if($errors->get('address')) is-invalid @endif">
                                            @if($errors->get('address'))
                                                <div class="text-danger" >
                                                    <ul style="list-style-type: none;">
                                                        @foreach($errors->get('address') as $message)
                                                        <li>{{$message}}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        <label for=""><span class="text-danger">*</span>phone number</label>
                                            <input type="number" name="phone" value="{{old('phone')}}" class="form-control  @if($errors->get('phone')) is-invalid @endif">
                                            @if($errors->get('phone'))
                                                <div class="text-danger" >
                                                    <ul style="list-style-type: none;">
                                                        @foreach($errors->get('phone') as $message)
                                                        <li>{{$message}}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        <label for=""><span class="text-danger">*</span>postal code</label>
                                            <input type="number"name="postal_code" value="{{old('postal_code')}}" class="form-control  @if($errors->get('postal_code')) is-invalid @endif">
                                            @if($errors->get('postal_code'))
                                                <div class="text-danger" >
                                                    <ul style="list-style-type: none;">
                                                        @foreach($errors->get('postal_code') as $message)
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
            @endif
        </div>
    </div>
</form>
@endsection

@section('script')
    <script type="text/javascript">
        $(".remove-from-cart").click(function (e){
            e.preventDefault();
            var ele =$(this);
            if(confirm("Are you sure want to remove it ?")){
            $.ajax({
                url:"{{route('remove.cart')}}",
                method:"DELETE",
                data:{
                    _token:"{{csrf_token()}}",
                    id:ele.parents("tr").attr("data-id")
                },
                success:function(response){
                    window.location.reload();
                }
            });
            }
        });

        $(".edit-from-cart").click(function (e){
            e.preventDefault();
            var ele =$(this);
            $.ajax({
                url:"{{route('update.cart')}}",
                method:"patch",
                data:{
                    _token:"{{csrf_token()}}",
                    id:ele.parents("tr").attr("data-id"),
                    quantity:ele.parents("tr").find(".quantity-product").val(),
                },
                success:function(response){
                     window.location.reload();
                }
            });
        });
    </script>

<script type="text/javascript">
    function yesnoCheck() {
        if (document.getElementById('yesCheck').checked) {
            document.getElementById('ifYes').style.visibility = 'visible';
        } else {
            document.getElementById('ifYes').style.visibility = 'hidden';
        }
        if (document.getElementById('noCheck').checked) {
            document.getElementById('ifYes').style.visibility = 'hidden';
        } else {
            document.getElementById('ifYes').style.visibility = 'visible';
        }
    }
</script>
@endsection
