<form action="{{ route('subcategory.destroy',$detail->id) }}" method="post" enctype="multipart/form-data">
    <div class="modal-body">
        @csrf
        @method('DELETE')
        <div class="form-group">
        <h5 class="text-center">Apakah anda ingin hapus <b>{{$detail->name}}</b> ini ?</h5>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>
