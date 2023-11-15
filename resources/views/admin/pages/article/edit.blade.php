@extends('admin.layouts.layout-dashboard')
@section('content')


<!-- Page-header end -->

<div class="page-info">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Data Artikel</a></li>
            <li class="breadcrumb-item active" aria-current="page">Form</li>
        </ol>
    </nav>
</div>
<div class="main-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title">
                <p class="page-desc">Input data dengan benar</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Input Artikel</h5>
                    <form action="{{route('article.update',$editArticle->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="exampleInputEmail1">Judul</label>
                            <input type="text" name="titles" class="form-control" value="{{$editArticle->titles}}" id="title" aria-describedby="name" placeholder="Masukan judul">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tipe kategori</label>
                            <select name="category_id" id="category_id" class="form-control">
                                @foreach ($category as $item)
                                    <option value="{{$item->id}}" {{$item->id == $editArticle->category_id ? 'selected' : ''}}>{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Isi</label>
                            <textarea id="summernote" name="body">{{$editArticle->body}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Thumbnail</label>
                            <input type="hidden" value="{{ $editArticle->thumbnail }}" name="oldThumbnail">
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="imageThumbnail" name="thumbnailedit" onchange="previewThumbnail()" accept="image/png, image/gif, image/jpeg">
                                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                            @if ($editArticle->thumbnail)
                                <img src="{{ $editArticle->thumbnail }}" class="img-preview-thumbnail img-fluid col-sm-5 mt-3">
                            @else
                                <img class="img-preview-thumbnail img-fluid col-sm-5 mt-3">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Image</label>
                            <input type="hidden" value="{{ $editArticle->image }}" name="oldImage">
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="imageArticle" name="imageedit" onchange="previewImage()" accept="image/png, image/gif, image/jpeg">
                                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                            @if ($editArticle->image)
                                <img src="{{ $editArticle->image }}" class="img-preview-image img-fluid col-sm-5 mt-3">
                            @else
                                <img class="img-preview-image img-fluid col-sm-5 mt-3">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tags</label>
                            <input class="form-control @error('tags') is-invalid @enderror" value="{{ $editArticle->tags }}" data-role="tagsinput" type="text" name="tags" id="target_market">
                            {{-- <input type="file" name="image" class="form-control" id="name" aria-describedby="name" placeholder="Masukan nama kategori"> --}}
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@push('after-scripts')
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 250
            });
        });
    </script>
    <script src='https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js'></script>
    <script>
        $(function () {
           $('#target_market').on('change', function (event) {

              var $element = $(event.target);
              var $container = $element.closest('.example');

              if (!$element.data('tagsinput'))
                 return;

              var val = $element.val();
              if (val === null)
                 val = "null";
              var items = $element.tagsinput('items');

              $('code', $('pre.val', $container)).html(($.isArray(val) ? JSON.stringify(val) : "\"" + val.replace('"', '\\"') + "\""));
              $('code', $('pre.items', $container)).html(JSON.stringify($element.tagsinput('items')));


           }).trigger('change');
        });
    </script>
    <script>
        function previewThumbnail() {
            const image     = document.querySelector('#imageThumbnail');
            const imgprev   = document.querySelector('.img-preview-thumbnail');
            imgprev.style.display = 'block';

            const ofReader = new FileReader();
            ofReader.readAsDataURL(image.files[0]);

            ofReader.onload = function(oFREvent){
                imgprev.src = oFREvent.target.result;
            }
         }

    </script>
    <script>
        function previewImage() {
            const image     = document.querySelector('#imageArticle');
            const imgprev   = document.querySelector('.img-preview-image');
            imgprev.style.display = 'block';

            const ofReader = new FileReader();
            ofReader.readAsDataURL(image.files[0]);

            ofReader.onload = function(oFREvent){
                imgprev.src = oFREvent.target.result;
            }
         }
    </script>
@endpush

