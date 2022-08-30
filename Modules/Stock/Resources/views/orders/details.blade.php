@extends('dashbord.app')

@section('content')
    <div class="container-fluid mt-2">
        <div class="fw-bold text-black h4 mb-3"> {{__('Details')}}</div>
        <div class="card border-left-primary p-1">
            <div class="card-body">
                <table class="table table-responsive-lg">
                    <thead>
                        <tr class="bg-light">
                            <th>Product</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($command->products as $key => $product)
                            <tr>
                                <td>
                                    <img class="img-thumbnail" style="width:100px;height: 100px;" src="{{asset('images/Products/'.$product->category->name_category.'/'.$product->image)}}" alt="img_product">
                                </td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->price}}$</td>
                                <td width="200px">
                                    @foreach($command_products as $comm_pro)
                                        @if ($comm_pro->product_id == $product->id)
                                            {{$comm_pro->quantity}}
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-right text-black">
                    <strong>Delivery address:</strong>
                    <i>
                        @if($facture->command->delivery->method_delivery=='relay point')
                            {{$facture->command->delivery->sepecified_address}}
                        @else
                            {{$facture->command->user->address}}
                        @endif
                   </i>
                   <br>
                    <strong>Date of order: {{$facture->date_command}}</strong>
                    <br>
                    <strong>Total amount: {{$facture->total_amount}} $</strong>
                    <br>
                    <strong>Total quantity:{{$facture->quantity}} </strong>
                </div>
            </div>
        </div>
    </div>
@endsection
