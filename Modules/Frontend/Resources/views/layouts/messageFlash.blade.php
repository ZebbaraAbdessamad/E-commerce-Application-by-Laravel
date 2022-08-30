

<div class="container">
    <div class="row">
        <div class="col-10 offset-1">
            @if(session()->has('update_profile'))
                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                    {{session()->get('update_profile')}}
                </div>
            @endif
            @if(session()->has('error_old_password'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                    {{session()->get('error_old_password')}}
                </div>
            @endif
            @if(session()->has('success_password'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                    {{session()->get('success_password')}}
                </div>
            @endif





        </div>
     </div>
</div
