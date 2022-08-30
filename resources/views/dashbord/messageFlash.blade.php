
<div class="container">
    <div class="row">
        <div class="col-10 offset-1">

            @if(session()->has('cerate_category'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                    {{session()->get('cerate_category')}}
                </div>
            @endif

            @if(session()->has('update_category'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                    {{session()->get('update_category')}}
                </div>
            @endif

            @if(session()->has('delete_ctegory'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                    {{session()->get('delete_ctegory')}}
                </div>
            @endif

            @if(session()->has('cerate_product'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                    {{session()->get('cerate_product')}}
                </div>
            @endif

            @if(session()->has('update_product'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                    {{session()->get('update_product')}}
                </div>
            @endif

            @if(session()->has('delete_product'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                    {{session()->get('delete_product')}}
                </div>
            @endif

            @if(session()->has('delete_image'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                    {{session()->get('delete_image')}}
                </div>
            @endif

            @if(session()->has('EditPrf'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                    {{session()->get('EditPrf')}}
                </div>
            @endif

            @if(session()->has('max_imges'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                    {{session()->get('max_imges')}}
                </div>
            @endif

            @if(session()->has('delete_stock'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                    {{session()->get('delete_stock')}}
                </div>
            @endif

            @if(session()->has('add_quantity'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                    {{session()->get('add_quantity')}}
                </div>
            @endif

            @if(session()->has('error_sup_quantity'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                    {{session()->get('error_sup_quantity')}}
                </div>
            @endif

            @if(session()->has('sucess_sup_quantity'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                    {{session()->get('sucess_sup_quantity')}}
                </div>
            @endif


            @if(session()->has('sucess_order'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                    {{session()->get('sucess_order')}}
                </div>
            @endif

            @if(session()->has('error_order'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                    {{session()->get('error_order')}}
                </div>
            @endif

            @if(session()->has('delete_order'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                    {{session()->get('delete_order')}}
                </div>
            @endif

            @if(session()->has('delete_role'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                    {{session()->get('delete_role')}}
                </div>
            @endif

            @if(session()->has('create_Permission'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                    {{session()->get('create_Permission')}}
                </div>
            @endif

            @if(session()->has('update_Permission'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                    {{session()->get('update_Permission')}}
                </div>
            @endif

            @if(session()->has('success_matirx'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                    {{session()->get('success_matirx')}}
                </div>
            @endif

            @if(session()->has('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button>
                    {{session()->get('success')}}
                </div>
            @endif

        </div>
     </div>
</div
