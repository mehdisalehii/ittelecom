@if ($url_fetch == 'post' )
    @foreach($posts as $row)
        <li class="post list">
            <aside class="card box arch-content">

                <a
                    @if($row->publish == 'draft')
                        href="javascript:void(0);"
                    @else
                        href="{{ $row->slug }}"
                    @endif
                class="block" title="{{$row->title}}">
                    <div class="thumbnail">
                    @if($row->publish == 'draft')
                        <div class="draft"><div class="circ"></div><div class="txt">پیش‌نویس</div></div>
                    @endif
                    @if($row->thumb && is_array(explode(',',$row->thumb)))
                    @foreach(explode(',',$row->thumb) as $thumb => $val)
                        @if($thumb == 0)
                        <img class="thumb" src="{{'/images/uploads/picture/post'}}/{{$val}}.jpg" alt="{{$row->title}}" width=340 height=150>
                        @endif
                    @endforeach
                    @else
                        <img class="thumb not-img" src="/assets/lazy/load.jpg"  alt="{{$row->title}}" width=340 height=150>
                    @endif
                    </div>
                    <div class="txt">{{$row->title}}</div>
                </a>
                @include('admin.pages.post.partials.option_list')
            </aside>
        </li>
    @endforeach
@endif

@if ($url_fetch == 'post/draft' )
    @foreach($posts as $row)
        <li class="post list">
            <aside class="card box arch-content">
                <a
                    @if($row->publish == 'draft')
                        href="javascript:void(0);"
                    @else
                        href="{{ $row->slug }}"
                    @endif
                class="block" title="{{$row->title}}">
                    <div class="thumbnail">
                    @if($row->publish == 'draft')
                        <div class="draft"><div class="circ"></div><div class="txt">پیش‌نویس</div></div>
                    @endif
                    @if($row->thumb && is_array(explode(',',$row->thumb)))
                    @foreach( explode(',',$row->thumb) as $thumb => $val)
                        @if($thumb == 0)
                        <img class="thumb" src="{{'/images/uploads/picture/post'}}/{{$val}}.jpg" alt="{{$row->title}}" width=340 height=150>
                        @endif
                    @endforeach
                    @else
                        <img class="thumb not-img" src="/assets/lazy/load.jpg"  alt="{{$row->title}}" width=340 height=150>
                    @endif
                    </div>
                    <div class="txt">{{$row->title}}</div>
                </a>
                @include('admin.pages.post.partials.option_list')
            </aside>
        </li>
    @endforeach
@endif
