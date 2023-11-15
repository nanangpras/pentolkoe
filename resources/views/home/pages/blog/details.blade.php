@extends('home.layouts.layout-pages')
@section('content')
 <!-- PAGE DETAILS AREA START (blog-details) -->
 <div class="ltn__page-details-area ltn__blog-details-area mb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="ltn__blog-details-wrap">
                    <div class="ltn__page-details-inner ltn__blog-details-inner">
                        <div class="ltn__blog-meta">
                            <ul>
                                <li class="ltn__blog-category">
                                    <a href="#">{{$detailBlog->category->name}}</a>
                                </li>
                            </ul>
                        </div>
                        <h2 class="ltn__blog-title">{{$detailBlog->titles}}</h2>
                        <div class="ltn__blog-meta">
                            <ul>
                                <li class="ltn__blog-author">
                                    <a href="#"><img src="img/blog/author.jpg" alt="#">By: {{$detailBlog->author->name}}</a>
                                </li>
                                <li class="ltn__blog-date">
                                    <i class="far fa-calendar-alt"></i>{{$detailBlog->created_at}}
                                </li>
                                <li>
                                    <a href="#"><i class="far fa-comments"></i>0 Comments</a>
                                </li>
                            </ul>
                        </div>
                        <p>{!!$detailBlog->body!!}</p>

                    </div>
                    <!-- blog-tags-social-media -->
                    <div class="ltn__blog-tags-social-media mt-80 row">
                        <div class="ltn__tagcloud-widget col-lg-8">
                            <h4>Releted Tags</h4>
                            <ul>
                                @foreach ($tags as $item)
                                    <li>
                                        <a href="#">{{$item}}</a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <div class="ltn__social-media text-right text-end col-lg-4">
                            <h4>Social Share</h4>
                            <ul>
                                <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>

                                <li><a href="#" title="Youtube"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <!-- prev-next-btn -->
                    <div class="ltn__prev-next-btn row mb-50">
                        <div class="blog-prev col-lg-6">
                            <h6>Prev Post</h6>
                            <h3 class="ltn__blog-title"><a href="#">Tips On Minimalist</a></h3>
                        </div>
                        <div class="blog-prev blog-next text-right text-end col-lg-6">
                            <h6>Next Post</h6>
                            <h3 class="ltn__blog-title"><a href="#">Less Is More</a></h3>
                        </div>
                    </div>
                    <hr>
                    <!-- related-post -->
                    <div class="related-post-area mb-50">
                        <h4 class="title-2">Related Post</h4>
                        <div class="row">
                            @foreach ($related as $item)
                                <div class="col-md-6">
                                    <!-- Blog Item -->
                                    <div class="ltn__blog-item ltn__blog-item-6">
                                        <div class="ltn__blog-img">
                                            <a href="{{route('blog.detail',$item->slug)}}"><img src="{{url('themes-frontend/img/blog/blog-details/11.jpg')}}" alt="Image"></a>
                                        </div>
                                        <div class="ltn__blog-brief">
                                            <div class="ltn__blog-meta">
                                                <ul>
                                                    <li class="ltn__blog-date ltn__secondary-color">
                                                        <i class="far fa-calendar-alt"></i>June 22, 2020
                                                    </li>
                                                </ul>
                                            </div>
                                            <h3 class="ltn__blog-title"><a href="{{route('blog.detail',$item->slug)}}">{{$item->titles}}</a></h3>
                                            <p>{{ Str::limit($item->description, 20) }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <!-- comment-area -->
                    <div class="ltn__comment-area mb-50">
                        {{-- <div class="ltn-author-introducing clearfix">
                            <div class="author-img">
                                <img src="{{url('themes-frontend/img/blog/author.jpg')}}" alt="Author Image">
                            </div>
                            <div class="author-info">
                                <h6>Written by</h6>
                                <h1>{{$detailBlog->author->name}}</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation is enougn for today.</p>
                            </div>
                        </div> --}}
                        {{-- <h4 class="title-2">03 Comments</h4>
                        <div class="ltn__comment-inner">
                            <ul>
                                <li>
                                    <div class="ltn__comment-item clearfix">
                                        <div class="ltn__commenter-img">
                                            <img src="img/testimonial/1.jpg" alt="Image">
                                        </div>
                                        <div class="ltn__commenter-comment">
                                            <h6><a href="#">Adam Smit</a></h6>
                                            <span class="comment-date">20th May 2020</span>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, omnis fugit corporis iste magnam ratione.</p>
                                            <a href="#" class="ltn__comment-reply-btn"><i class="icon-reply-1"></i>Reply</a>
                                        </div>
                                    </div>
                                    <ul>
                                        <li>
                                            <div class="ltn__comment-item clearfix">
                                                <div class="ltn__commenter-img">
                                                    <img src="img/testimonial/3.jpg" alt="Image">
                                                </div>
                                                <div class="ltn__commenter-comment">
                                                    <h6><a href="#">Adam Smit</a></h6>
                                                    <span class="comment-date">21th May 2020</span>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, omnis fugit corporis iste magnam ratione.</p>
                                                    <a href="#" class="ltn__comment-reply-btn"><i class="icon-reply-1"></i>Reply</a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="ltn__comment-item clearfix">
                                        <div class="ltn__commenter-img">
                                            <img src="img/testimonial/4.jpg" alt="Image">
                                        </div>
                                        <div class="ltn__commenter-comment">
                                            <h6><a href="#">Adam Smit</a></h6>
                                            <span class="comment-date">25th May 2020</span>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, omnis fugit corporis iste magnam ratione.</p>
                                            <a href="#" class="ltn__comment-reply-btn"><i class="icon-reply-1"></i>Reply</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div> --}}
                    </div>
                    <hr>
                    <!-- comment-reply -->
                    {{-- <div class="ltn__comment-reply-area ltn__form-box mb-60---">
                        <h4 class="title-2">Post Comment</h4>
                        <form action="#">
                            <div class="input-item input-item-textarea ltn__custom-icon">
                                <textarea placeholder="Type your comments...."></textarea>
                            </div>
                            <div class="input-item input-item-name ltn__custom-icon">
                                <input type="text" placeholder="Type your name....">
                            </div>
                            <div class="input-item input-item-email ltn__custom-icon">
                                <input type="email" placeholder="Type your email....">
                            </div>
                            <div class="input-item input-item-website ltn__custom-icon">
                                <input type="text" name="website" placeholder="Type your website....">
                            </div>
                            <label class="mb-0 input-info-save"><input type="checkbox" name="agree"> Save my name, email, and website in this browser for the next time I comment.</label>
                            <div class="btn-wrapper">
                                <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit"><i class="far fa-comments"></i> Post Comment</button>
                            </div>
                        </form>
                    </div> --}}
                </div>
            </div>
            <div class="col-lg-4">
                <aside class="sidebar-area blog-sidebar ltn__right-sidebar">
                    <!-- Author Widget -->
                    {{-- <div class="widget ltn__author-widget">
                        <h4 class="ltn__widget-title ltn__widget-title-border">About Me</h4>
                        <div class="ltn__author-widget-inner text-center">
                            <img src="img/blog/author-3.jpg" alt="Image">
                            <h5>Rosalina D. Willaimson</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis distinctio, odio, eligendi suscipit reprehenderit atque.</p>
                            <div class="ltn__social-media">
                                <ul>
                                    <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>

                                    <li><a href="#" title="Youtube"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div> --}}
                    <!-- Search Widget -->
                    <div class="widget ltn__search-widget">
                        <h4 class="ltn__widget-title ltn__widget-title-border">Search Objects</h4>
                        <form action="#">
                            <input type="text" name="search" placeholder="Search your keyword...">
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                    <!-- Popular Post Widget -->
                    <div class="widget ltn__popular-post-widget">
                        <h4 class="ltn__widget-title ltn__widget-title-border">Popular Feeds</h4>
                        <ul>
                            @foreach ($popularView as $item)
                                <li>
                                    <div class="popular-post-widget-item clearfix">
                                        <div class="popular-post-widget-img">
                                            <a href="{{ route('blog.detail', $item->slug) }}"><img src="{{$item->thumbnail}}" alt="#"></a>
                                        </div>
                                        <div class="popular-post-widget-brief">
                                            <h6><a href="{{ route('blog.detail', $item->slug) }}">{{$item->titles}}</a></h6>
                                            <div class="ltn__blog-meta">
                                                <ul>
                                                    <li class="ltn__blog-date">
                                                        <a href="#"><i class="far fa-calendar-alt"></i>{{$item->created_at}}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Menu Widget (Category) -->
                    <div class="widget ltn__menu-widget ltn__menu-widget-2 ltn__menu-widget-2-color-2">
                        <h4 class="ltn__widget-title ltn__widget-title-border">Categories</h4>
                        <ul>
                            @foreach ($category as $item)
                                <li><a href="#">{{$item->name}} </a></li>
                            @endforeach

                        </ul>
                    </div>
                    <!-- Social Media Widget -->
                    {{-- <div class="widget ltn__social-media-widget">
                        <h4 class="ltn__widget-title ltn__widget-title-border">Never Miss News</h4>
                        <div class="ltn__social-media-2">
                            <ul>
                                <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                                <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>

                            </ul>
                        </div>
                    </div> --}}
                    <!-- Tagcloud Widget -->
                    <div class="widget ltn__tagcloud-widget">
                        <h4 class="ltn__widget-title ltn__widget-title-border">Popular Tags</h4>
                        <ul>
                            @foreach ($tags as $item)
                                <li>
                                    <a href="#">{{$item}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Banner Widget -->
                    <div class="widget ltn__banner-widget">
                        <a href="shop.html"><img src="{{url('themes-frontend/img/banner/banner-4.jpg')}}" alt="Banner Image"></a>
                    </div>

                </aside>
            </div>
        </div>
    </div>
</div>
<!-- PAGE DETAILS AREA END -->
@endsection
