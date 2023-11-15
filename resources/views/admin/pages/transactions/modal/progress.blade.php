<form action="{{ route('transaction.update-progress',$detail->code) }}" method="post" enctype="multipart/form-data">
    <div class="modal-body">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <input type="hidden" name="parent_id" value="{{ $detail->code }}">
            <input type="hidden" name="progress_status" value="Selesai">
            <label for="exampleInputEmail1">Note</label>
            <textarea class="form-control" name="notes" id="notes" cols="30" rows="10"></textarea>
        </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>
