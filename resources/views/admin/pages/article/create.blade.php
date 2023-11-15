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
                    <form action="{{route('article.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Judul</label>
                            <input type="text" name="titles" class="form-control" id="title" aria-describedby="name" placeholder="Masukan judul">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tipe kategori</label>
                            <select name="category_id" id="category_id" class="form-control">
                                @foreach ($category as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Sub Kategori</label>
                            <select name="subcategory_id" id="subcategory_id" class="form-control">
                                <option>Pilih Sub</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Isi</label>
                            <textarea id="summernote" name="body"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Thumbnail</label>
                            <input type="file" name="thumbnail" class="form-control" id="name" aria-describedby="name" placeholder="Masukan nama kategori">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Image</label>
                            <input type="file" name="image" class="form-control" id="name" aria-describedby="name" placeholder="Masukan nama kategori">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tags</label>
                            <input class="form-control @error('tags') is-invalid @enderror" value="{{ old('tags') }}" data-role="tagsinput" type="text" name="tags" id="target_market">
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
        $(document).ready(function () {
            $('select[name="category_id"]').on('change',function () {
                let category_id = $(this).val();
                if (category_id) {
                    jQuery.ajax({
                        url:"/subcategory/article/"+category_id,
                        type:'GET',
                        dataType:'json',
                        success:function(data){
                            // console.log(data);
                            $('select[name="subcategory_id"]').empty();
                            $.each(data,function (key,value) {
                                $('select[name="subcategory_id"]').append('<option value="'+ value.id +'"> ' + value.name + '</option>');
                            })
                        }
                    })
                }else{
                    $('select[name="subcategory_id"]').empty();
                }
            });
        });
     </script>
@endpush

