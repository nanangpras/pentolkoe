@extends('course.layouts.layout-course-member')
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
            <div class="col-lg-6 mt-4">
                <div class="card">
                    <div class="card-body">
                        <iframe id="video_lesson" width="315" height="150" src="" 
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>

                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
