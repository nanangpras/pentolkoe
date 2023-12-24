<div class="page-sidebar">
    <div class="logo-box">
        <a href="{{route('home')}}" class="logo-text">Konveksi</a><a href="#" id="sidebar-close">

            <i class="material-icons">close</i></a> <a href="#" id="sidebar-state">
            <i class="material-icons">adjust</i><i class="material-icons compact-sidebar-icon">panorama_fish_eye</i>
        </a>
    </div>
    @if(Auth::user()->role =='user')
    <div class="page-sidebar-inner slimscroll">
        <ul class="accordion-menu">
            <li>
                <a href="{{route('member.course.list')}}"><i class="material-icons">login</i>Kembali ke Dashboard</a>
            </li>
            @if($detail && $detail->chapters)
                @foreach ($detail->chapters as $chapter)
                    <li class="{{set_active('category.index')}}">
                        <a href="#"><i class="material-icons">category</i><i class="material-icons has-sub-menu">add</i>{{$chapter->name}}</a>
                        @forelse ($chapter->lessons as $lesson)    
                            <ul class="sub-menu">
                                <li>
                                    <a href="#" id="menu_lesson" data-id="{{$lesson->id}}" data-video="{{$lesson->video}}" class="{{set_active_sub('purchase.create')}}">{{$lesson->name}}</a>
                                    {{-- <a href="#" id="menu_course_{{$lesson->id}}" class="{{set_active_sub('purchase.create')}}">{{$lesson->name}}</a> --}}
                                </li>
                            </ul>
                        @empty
                            <ul class="sub-menu">
                                <li>
                                    <a href="#">---</a>
                                </li>
                            </ul>
                        @endforelse
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
    @endif

</div>
@push('after-scripts')
    <script>
        $('iframe').hide();
        $('a[id="menu_lesson"]').click(function (e) { 
            e.preventDefault();
            var id = $(this).attr('data-id');
            var video = $(this).attr('data-video');
            var convertUrl = video.replace("watch?v=", "embed/");

            $('iframe').attr('src',convertUrl).show();
            // $('#video_lesson').attr('src',convertUrl);
        });
    </script>
@endpush
