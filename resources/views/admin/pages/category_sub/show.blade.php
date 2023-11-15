<form action="{{ route('subcategory.store') }}" method="post" enctype="multipart/form-data">
    <div class="modal-body">
        @csrf
        <div class="form-group">
            <input type="hidden" name="parent_id" value="{{ $detail->id }}">
            <label for="exampleInputEmail1">Nama Sub kategori</label>
            <input type="text" name="name" class="form-control" id="name" aria-describedby="name"
                placeholder="Masukan nama kategori">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Tipe kategori</label>
            <select name="type" id="type" class="form-control">
                <option value="artikel" {{ $detail->type == 'artikel' ? 'selected' : '' }}>Artikel</option>
                <option value="produk" {{ $detail->type == 'produk' ? 'selected' : '' }}>Produk</option>
                <option value="edukasi" {{ $detail->type == 'edukasi' ? 'selected' : '' }}>Edukasi</option>
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>
