  <!--panel change password -->
  <div class="modal" id="modal_password">
    <div class="col-md-5 container my-5 ">
        <div class="card" style=" width:auto; height:auto;">
            <div class="card-body" style="height:auto; padding-left:20px;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <div class="panel-body p-2">
                    <form method="post" id="formP1" action="javascript:void(0)">
                    <div class="success1 mt-1"></div>
                        @csrf
                        <input type="hidden" name='id_user' id="id_hidden" value="">
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
                            <button type="submit" class="btn btn-primary btn-sm" id="change_password_prf"> <i class="fa fa-save"></i> Change Password </button>
                        </div>
                        <div class="error1 mt-3"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@section('script2')
    <script>
    $('.changePassword').on('click',function (params) {
        $('#id_hidden').val($(this).data('id'))
    })
    </script>
@endsection
