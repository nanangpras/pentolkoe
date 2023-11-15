@extends('admin.layouts.layout-dashboard')
@section('content')


<!-- Page-header end -->

<div class="page-info">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Apps</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </nav>
    {{-- <div class="page-options">
        <a href="#" class="btn btn-secondary">Settings</a>
        <a href="#" class="btn btn-primary">Upgrade</a>
    </div> --}}
</div>
<div class="main-wrapper">


    <div class="profile-content">

        <div class="col-lg-8">
            <div class="mb-4">
                <h6>Detail Produk <strong>{{$detail_course->title}}</strong></h6>
                <h6>Kategori Produk <strong>{{$detail_course->category->name}}</strong></h6>
            </div>
            <div class="card card-transactions">
                <div class="card-body">
                    <h5 class="card-title">Detail Chapter<a href="#" class="card-title-helper blockui-transactions"><i class="material-icons">refresh</i></a></h5>
                    @foreach ($detail_course->chapters as $chapter)
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample{{$chapter->id}}" aria-expanded="false" aria-controls="collapseExample">
                        {{$chapter->name}}
                      </button>
                      <div class="collapse" id="collapseExample{{$chapter->id}}">
                        <div class="card card-body">
                            <p>ok</p>
                          @foreach ($chapter->lessons as $lesson)
                              <p>{{$lesson->name ?? ''}}</p>
                              <p>{{$lesson->video ?? ''}}</p>
                              <video id="player" playsinline controls data-poster="/path/to/poster.jpg">
                                <source src="{{$lesson->video}}" type="video/mp4" />
                              
                                <!-- Captions are optional -->
                                <track kind="captions" label="English captions" src="/path/to/captions.vtt" srclang="en" default />
                              </video>
                          @endforeach
                        </div>
                      </div>
                    @endforeach
                </div>
            </div>
            <a href="{{route('transaction.list')}}" type="button" id="pay-button" class="btn btn-success">Kembali</a>
        </div>
    </div>
</div>
@endsection
@push('after-scripts')
<script>
    const player = new Plyr('video', {captions: {active: true}});

// Expose player so it can be used from the console
window.player = player;
</script>
    
@endpush


