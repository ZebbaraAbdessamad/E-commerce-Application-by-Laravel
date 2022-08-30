  <!--panel change password -->
  <div class="modal" id="modal_password_users">
    <div class="col-md-5 container my-5 ">
        <div class="card" style=" width:auto; height:auto;">
            <div class="card-body" style="height:auto; padding-left:20px;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
                <div class="panel-body p-2">
                    <form method="post" id="formP2" action="javascript:void(0)">
                    <div class="success2 mt-1"></div>
                        @csrf
                        <input type="hidden" name='id_user' id="id_hidden_users" value="">
                        <div class="form-group">
                            <label>New Password</label>
                            <div class="d-flex">
                                <i class="fas fa-eye clk1 mt-2 mr-1"></i>   <input type="password" value="" placeholder="New Password" name="password" class="form-control password myInput1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Password Confirmation</label>
                            <div class="d-flex">
                                <i class="fas fa-eye clk2 mt-2 mr-1"></i>   <input type="password" value="" placeholder="Password" name="password_confirmation" class="form-control myInput2">
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary btn-sm" id="change_password_users"> <i class="fa fa-save"></i> Change Password </button>
                        </div>
                        <div class="error2 mt-3"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@section('script2')
<script>
    $(document).ready(function(){
        $('#change_password_users').click(function(e){
            e.preventDefault();
            $('.error2').html('');
            /*Ajax Request Header setup*/
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('formP2')
                }
            });
            /* Submit form data using ajax*/
            $.ajax({
                url: "{{route('users.change_password')}}",
                method: 'POST',
                data: $('#formP2').serialize(),
                success: function(response){
                    var  success = response.success;
                    $('.success2').html(`<div class="alert alert-success" style="margin-right:3px;">
                    <span>  ${success}</span>
                    <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button> </div>`);
                },
                error: function(response){
                    var errors = response.responseJSON.errors;
                    var password_errors = '';
                    errors.password.forEach(function(element) {
                            password_errors =   password_errors + `<li>${element}</li>`;
                        });
                    $('.error2').html(`<div class="text-danger">
                    <ul style="list-style-type: none; padding-left: 0px;">
                        ${password_errors}
                    </ul>
                    </div>`);
                },
            });
        });
    });
</script>
<script>
    $('.changePassword2').on('click',function (params) {
        $('#id_hidden_users').val($(this).data('id'))
    })
</script>
@endsection
