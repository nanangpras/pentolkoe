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
    <h6 class="mb-4">Tipe Course</h6>
    <div class="profile-content">
        <button type="button" class="btn btn-success rounded-pill">Gratis</button>
        <button type="button" class="btn btn-success rounded-pill">Premium</button>
        <div class="col-lg-3 mt-4">
            @foreach ($list as $course)
                <div class="card">
                    <img src="{{asset('themes/assets/images/card_1.jpg')}}" class="card-img-top" alt="Placeholder">
                    <div class="card-body">
                        <h1 class="card-title">{{$course->title}}</h1> 
                        <span>{{$course->flags}}</span>
                        <p class="card-text">{!! $course->short_description !!}</p>
                        <a href="{{route('member.course.detail',$course->slug)}}" class="btn btn-primary">Tonton Sekarang</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>




@endsection

