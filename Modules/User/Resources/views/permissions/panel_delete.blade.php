 <!--panel delete -->
 <div class="modal" id="log_permission">
    <div class="col-md-5 container my-5 ">
        <div class="card">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <div class="bootbox-body">Do you want to delete?</div>
                </div>
                <div class="modal-footer">
                        <form method="POST"action="{{route('permissions.destroy')}}">
                            @csrf
                            @method('delete')
                            <input type="hidden" name='permission_id' id="permission_id_hidden" value="">
                            <button type="submit" class="btn btn-primary bootbox-accept"><i class="fa fa-check"></i> Confirm</button>
                        </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>

@section('script2')
    <script>
    $('.delete_permission').on('click',function (params) {
        $('#permission_id_hidden').val($(this).data('id'))
    })
    </script>
@endsection
