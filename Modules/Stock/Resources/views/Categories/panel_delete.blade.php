 <!--panel delete -->
 <div class="modal" id="log1">
    <div class="col-md-5 container my-5 ">
        <div class="card">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <div class="bootbox-body">Do you want to delete?</div>
                </div>
                <div class="modal-footer">
                        <form method="POST"action="{{route('categories.destroy')}}">
                            @csrf
                            @method('delete')
                            <input type="hidden" name='id' id="id_hidden" value="">
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
    $('.deleteModal').on('click',function (params) {
        $('#id_hidden').val($(this).data('id'))
    })
    </script>
@endsection
