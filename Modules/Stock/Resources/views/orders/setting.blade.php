@extends('dashbord.app')

@section('content')
    <div class="container-fluid mt-2">
        <div class="fw-bold text-black h4 mb-3"> {{__('Setting status')}}</div>
        <div class="card border-left-primary p-1">
            <div class="card-body">
                <form action="{{route('orders.status_setting')}}" method="post">
                    @csrf
                    <input type="hidden" name="id_command" value="{{$command->id}}">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <input type="radio" @if ($command->stauts_command=='command_processed') checked @endif name="status" value="command_processed">
                                <span class="badge  badge-success">  Processed <i class="fa fa-check"></i></span>
                                <br>
                                <i>change order status to processed</i>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <input type="radio" @if ($command->stauts_command=='processing') checked @endif  name="status" value="processing">
                                <span class="badge  badge-primary ">  Processing <i class=" fas fa-sync"></i></span>
                                <br>
                                <i>change order status to processing</i>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <input type="radio"  @if ($command->stauts_command=='not_yet') checked @endif name="status"  value="not_yet">
                                <span class="badge  badge-warning">  Not yet <i class="fas fa-hourglass-half"></i></span>
                                <br>
                                <i>change order status to not yet</i>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit"  class="btn btn-primary btn-sm" >
                                <i class="fa fa-save" ></i> submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
