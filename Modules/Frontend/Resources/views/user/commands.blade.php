@extends('frontend::layouts.master')
@section('content')
    <div class="container">
        <div class="row pl-5 pr-5 pt-2">
            <div class="card p-1">
                <div class="card-body">
                    <table class="table table-responsive-lg">
                        <thead>
                            <tr class="bg-light">
                                <th>N°</th>
                                <th>Status of order</th>
                                <th>Delivery method</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                               $p=1;
                            @endphp
                            @foreach($commands as $command)
                                <tr>
                                    <td>{{$p++}}</td>
                                    <td>
                                        @if ($command->stauts_command=='command_processed')
                                            <span class="badge badge-success"> Processed</span>
                                        @elseif ($command->stauts_command=='processing')
                                            <span class="badge badge-info">Processing</span>
                                        @else
                                            <span class="badge badge-warning">Not yet</span>
                                        @endif
                                    </td>
                                    <td>
                                       {{$command->delivery->method_delivery}}
                                    </td>
                                    <td >{{$command->created_at->toDateString()}}</td>
                                    <td width="200px">
                                        <a href="{{route('user.commands_details',['slug'=>$command->slug])}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> show</a>
                                        @foreach ($factures as $facture )
                                            @if ($facture->command_id==$command->id)
                                                <a href="{{route('show.facture',['id'=>$facture->id])}}" class="btn btn-success btn-sm"><i class="fa fa-file-pdf"></i> invoice</a>
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                        {{ $commands->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
