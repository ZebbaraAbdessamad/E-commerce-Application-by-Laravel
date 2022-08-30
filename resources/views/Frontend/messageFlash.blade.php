

<div class="container">
    <div class="row">
        <div class="col-md-4 offset-4 mt-4">

            @if(session()->has('Add_to_cart'))
                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                    {{session()->get('Add_to_cart')}}
                </div>
            @endif
            @if(session()->has('remove_fromCart'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                    {{session()->get('remove_fromCart')}}
                </div>
            @endif
            @if(session()->has('edit_cart'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                    {{session()->get('edit_cart')}}
                </div>
            @endif
            @if(session()->has('account_error'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                    {{session()->get('account_error')}}
                </div>
            @endif

            @if(session()->has('add_command'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                    {{session()->get('add_command')}}
                </div>
            @endif

            @if(session()->has('command_empty'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                {{session()->get('command_empty')}}
            </div>
            @endif


            @if(session()->has('select_command'))
            <div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                {{session()->get('select_command')}}
            </div>
            @endif

            @if(session()->has('error_select_address'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                {{session()->get('error_select_address')}}
            </div>
            @endif


        </div>
     </div>
</div
