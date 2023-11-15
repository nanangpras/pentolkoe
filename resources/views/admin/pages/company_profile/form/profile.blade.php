<form action="{{route('setting-company.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Nama</label>
        <input type="text" name="name" class="form-control" id="name"
            aria-describedby="name" placeholder="Masukan nama banner">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Tagline</label>
        <input type="text" name="tagline" class="form-control" id="name"
            aria-describedby="name" placeholder="Masukan nama banner">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Telpone</label>
        <input type="text" name="phone" class="form-control" id="name"
            aria-describedby="name" placeholder="Masukan nama banner">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" name="email" class="form-control" id="name"
            aria-describedby="name" placeholder="Masukan nama banner">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Deskripsi</label>
        <input type="text" name="description" class="form-control" id="description"
            aria-describedby="name" placeholder="Masukan deskripsi banner">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Alamat</label>
        <input type="text" name="address" class="form-control" id="description"
            aria-describedby="name" placeholder="Masukan deskripsi banner">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Link Maps</label>
        <input type="text" name="link" class="form-control" id="description"
            aria-describedby="name" placeholder="Masukan link banner apabila ada">
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">Link FB</label>
                <input type="text" name="link_fb" class="form-control" id="description"
                    aria-describedby="name" placeholder="Masukan link banner apabila ada">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">Link Tiktok</label>
                <input type="text" name="link_tiktok" class="form-control" id="description"
                    aria-describedby="name" placeholder="Masukan link banner apabila ada">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">Link IG</label>
                <input type="text" name="link_ig" class="form-control" id="description"
                    aria-describedby="name" placeholder="Masukan link banner apabila ada">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Gambar</label>
        <div class="input-group mb-3">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="imagecompany"
                    name="imagecompany" onchange="previewImageCompany()">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
        </div>
        <img class="img-preview-company img-fluid col-sm-5">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Logo</label>
        <div class="input-group mb-3">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="logocompany"
                    name="logocompany" onchange="previewImageLogo()">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
        </div>
        <img class="img-preview-logo img-fluid col-sm-5">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
