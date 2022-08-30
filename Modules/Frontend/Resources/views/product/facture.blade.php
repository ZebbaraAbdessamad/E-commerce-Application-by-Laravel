@extends('Frontend.app')
@section('content')

<div class="row">
    <div class="col-lg-8 offset-2 col-md-6 col-sm-6 mb-5">
       @if(!empty($downlod))
            <div class="text-right" >
                <a style="margin-right: 40px;" href="{{route('show.facture',['id'=>$facture->command->id])}}" class="btn btn-info pt-2 pb-2 mb-2" style="margin-right: -11%; width: 160px;">
                    <i class=" fas fa-file-pdf"></i> download invoice
                </a>
            </div>
        @endif
        <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
           <table style="border: 1px solid black;">
                <table style="padding: 20px;">
                    <tr>
                        <table>
                            <tr>
                                <td style="width: 260px;">
                                    <h4 class="mtext-109 cl2 p-b-30">
                                        <i class="fas fa-file-invoice"></i> Invoice
                                    </h4>
                                </td>
                                <td></td>
                                <td></td>
                                <td >
                                    <div class="smtext-109 cl2 p-b-30">
                                        contact@artisanat.com
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="stext-110 cl2">
                                    Invoice Id
                                    </span>
                                </td>
                                <td>
                                    <span class="stext-3011 cl6 p-t-2">
                                    #{{$facture->id}}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="stext-110 cl2">
                                        First name:
                                    </span>
                                </td>
                                <td>
                                    <span class="stext-3011 cl6 p-t-2">
                                        {{$facture->command->user->name}}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="stext-110 cl2">
                                        Last name:
                                    </span>
                                </td>
                                <td>
                                    <span class="stext-3011 cl6 p-t-2">
                                        {{$facture->command->user->last_name}}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="stext-110 cl2">
                                        Email:
                                    </span>
                                </td>
                                <td>
                                    <span class="stext-3011 cl6 p-t-2">
                                        {{$facture->command->user->email}}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="stext-110 cl2">
                                        Phone number:
                                    </span>
                                </td>
                                <td>
                                    <span class="stext-3011 cl6 p-t-2">
                                        +212{{$facture->command->user->tele}}
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </tr>
                    <tr>
                        <div class="bor12 mt-2 mb-2"></div>
                    </tr>
                    <tr>
                        <table>
                            <tr>
                                <td  style="width: 260px;">
                                    <span class="stext-110 cl2">
                                        Delivery
                                    </span>
                                </td>
                                <td>
                                    <p class="stext-3011 cl6 p-t-2">
                                        {{$facture->command->delivery->method_delivery}}
                                    </p>
                                    <p class="stext-111 cl6 p-t-2">
                                        @if($facture->command->delivery->method_delivery=='relay point')
                                            {{$facture->command->delivery->sepecified_address}}
                                        @else
                                           {{$facture->command->user->address}}
                                        @endif
                                    </p>
                                    <br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="stext-110 cl2">
                                        Products
                                    </span>
                                </td>
                                <td  style="width: 300px;" >
                                    <table class="table table-bordered">
                                        <tr class="bg-light">
                                            <th>name</th>
                                            <th>price</th>
                                            <th>quantity</th>
                                        </tr>
                                        @foreach ($facture->command->products as $product )
                                            <tr class="size-209">
                                                <td><span class="stext-3011 cl6 p-t-2"> {{ $product->name}}  </span></td>
                                                <td><span class="ml-2 stext-3011 cl6 p-t-2">{{ $product->price}}$</span> </td>
                                                @foreach ($command_products as $item)
                                                    @if ($item->product_id == $product->id)
                                                        <td><span>{{ $item->quantity}}</span></td>
                                                    @endif
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </table>
                                    <br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="stext-110 cl2">
                                        Date
                                    </span>
                                </td>
                                <td>
                                    <span class="stext-3011 cl6 p-t-2">
                                        {{ $facture->date_command}}
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </tr>
                    <tr>
                        <div class="bor12 mt-2 mb-2"></div>
                    </tr>
                    <tr>
                        <table>
                            <tr>
                                <td style="width: 260px;">
                                    <span class="stext-110 cl2">
                                        Total quantity:
                                    </span>
                                </td>
                                <td>
                                    <span class="stext-110 cl2">
                                        {{$facture->quantity}}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="stext-110 cl2">
                                        Total amount:
                                    </span>
                                </td>
                                <td>
                                    <span class="stext-110 cl2">
                                        {{$facture->total_amount}}$
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </tr>
                </table>
            </table>
        </div>
    </div>
</div>
@endsection
