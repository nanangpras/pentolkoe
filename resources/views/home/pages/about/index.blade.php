@extends('home.layouts.layout-pages')
@section('content')
 <!-- ABOUT US AREA START -->
 <div class="ltn__about-us-area pt-120--- pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center">
                <div class="about-us-img-wrap about-img-left">
                    <div class="ltn__video-img ltn__video-img-before-none ltn__animation-pulse2">
                        <img src="{{url('themes-frontend/img/others/18.png')}}" alt="video popup bg image">
                        <a class="ltn__video-icon-2 ltn__video-icon-2-border--- border-radius-no ltn__secondary-bg" href="https://www.youtube.com/embed/X7R-q9rsrtU?autoplay=1&showinfo=0"  data-rel="lightcase:myCollection">
                            <i class="fa fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 align-self-center">
                <div class="about-us-info-wrap">
                    <div class="section-title-area ltn__section-title-2">
                        <h6 class="section-subtitle ltn__secondary-color"><span><i class="fas fa-square-full"></i></span> {{$company->tagline}}</h6>
                        <h1 class="section-title">{{$company->name}}</h1>
                        <p>{{$company->tagline}}</p>
                    </div>
                    <p>{{$company->description}}</p>
                    <div class="about-author-info d-flex mt-50">
                        <div class="author-name-designation  align-self-center mr-30">
                            <!-- <h4 class="mb-0">Jerry Henson</h4>
                            <small>/ Shop Director</small> -->
                            <div class="btn-wrapper mt-0">
                                <a class="btn theme-btn-2 btn-effect-1" href="{{route('home.about')}}">About Us</a>
                            </div>
                        </div>
                        <div class="author-sign  align-self-center">
                            <img src="{{url('themes-frontend/img/icons/icon-img/author-sign.png')}}" alt="#">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ABOUT US AREA END -->
<!-- FEATURE START -->
<div class="ltn__feature-area section-bg-1--- pt-120 pb-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area ltn__section-title-2 text-center">
                    <h6 class="section-subtitle ltn__secondary-color"><span><i class="fas fa-square-full"></i></span> Our Services</h6>
                    <h1 class="section-title">Construction Solution</h1>
                </div>
            </div>
        </div>
        <div class="row align-self-center">
            <div class="col-lg-4 col-sm-6">
                <div class="ltn__feature-item ltn__feature-item-6 box-shadow-1">
                    <div class="ltn__feature-icon">
                        <span><i class="flaticon-apartment"></i></span>
                    </div>
                    <div class="ltn__feature-info">
                        <h3><a href="service-details.html">Industrial construction</a></h3>
                        <p>over 1 million+ homes for sale available
                            on the website, we can match you with a
                            house you will want to call home.</p>
                        <a class="ltn__service-btn ltn__service-btn-2" href="service-details.html">Service Details <i class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="ltn__feature-item ltn__feature-item-6 box-shadow-1">
                    <div class="ltn__feature-icon">
                        <span><i class="flaticon-excavator"></i></span>
                    </div>
                    <div class="ltn__feature-info">
                        <h3><a href="service-details.html">Oil Gas & Power Plant</a></h3>
                        <p>over 1 million+ homes for sale available
                            on the website, we can match you with a
                            house you will want to call home.</p>
                        <a class="ltn__service-btn ltn__service-btn-2" href="service-details.html">Service Details <i class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="ltn__feature-item ltn__feature-item-6 box-shadow-1">
                    <div class="ltn__feature-icon">
                        <span><i class="icon-repair"></i></span>
                    </div>
                    <div class="ltn__feature-info">
                        <h3><a href="service-details.html">Mechanical Works</a></h3>
                        <p>over 1 million+ homes for sale available
                            on the website, we can match you with a
                            house you will want to call home.</p>
                        <a class="ltn__service-btn ltn__service-btn-2" href="service-details.html">Service Details <i class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="ltn__feature-item ltn__feature-item-6 box-shadow-1">
                    <div class="ltn__feature-icon">
                        <span><i class="flaticon-slider"></i></span>
                    </div>
                    <div class="ltn__feature-info">
                        <h3><a href="service-details.html">Power & Energy</a></h3>
                        <p>over 1 million+ homes for sale available
                            on the website, we can match you with a
                            house you will want to call home.</p>
                        <a class="ltn__service-btn ltn__service-btn-2" href="service-details.html">Service Details <i class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="ltn__feature-item ltn__feature-item-6 box-shadow-1">
                    <div class="ltn__feature-icon">
                        <span><i class="flaticon-building"></i></span>
                    </div>
                    <div class="ltn__feature-info">
                        <h3><a href="service-details.html">Petroleum Refinery</a></h3>
                        <p>over 1 million+ homes for sale available
                            on the website, we can match you with a
                            house you will want to call home.</p>
                        <a class="ltn__service-btn ltn__service-btn-2" href="service-details.html">Service Details <i class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="ltn__feature-item ltn__feature-item-6 box-shadow-1">
                    <div class="ltn__feature-icon">
                        <span><i class="flaticon-house"></i></span>
                    </div>
                    <div class="ltn__feature-info">
                        <h3><a href="service-details.html">Interior Design</a></h3>
                        <p>over 1 million+ homes for sale available
                            on the website, we can match you with a
                            house you will want to call home.</p>
                        <a class="ltn__service-btn ltn__service-btn-2" href="service-details.html">Service Details <i class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- FEATURE END -->
@endsection
