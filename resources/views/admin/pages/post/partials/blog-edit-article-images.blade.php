<div class="arch-content thumb gallary">
    <h3 class="text-center">
        عکس اصلی مقاله
    </h3>
    <div class="figure post-bl position-relative">
        <div class="images thumbnail">
            @if(isset($post))
                @foreach(explode(',',$post->thumb) as $thumb )
                    @if ($loop->first)
                        @if($thumb)
                            <img id="image-index-number-{{$loop->index}}" src="/generated/images/post/800x400/{{$thumb}}.webp" alt="{{$post->title}}" width="800" height="400">
                        @else
                            <img class="thumb" src="/assets/lazy/post.jpg" alt="lazy-gallay" width="400" height="100%">
                        @endif
                    @endif
                @endforeach
            @else
                <img class="thumb" src="/assets/lazy/post.jpg" alt="lazy-gallay" width="400" height="100%">
            @endif
        </div>
        <div class="btn-popup btn-photo" data-popup="gallary" title="انتخاب عکس">
            <i class="icn white" style="background-image: url(/icons/camera.svg);"></i>
        </div>
    </div>
    <ul class="sub-thumb sub-gallary list-txt" data-popup="gallary">
        @if(isset($post))
            @foreach(explode(',',$post->thumb) as $thumb )
                @if ($loop->index < 5)
                    <li class="thumb-btn sec-{{$loop->index}}">
                        @if($thumb)
                            <a onclick="choosePrimaryImageFunction('{{$thumb}}')" href="javascript:void(0)"><img id="image-index-number-{{$loop->index}}" class="thumb-s" src="/generated/images/post/340x170/{{$thumb}}.webp" alt="{{$post->title}}" width="80" height="80"></a>
{{--                            <input type="checkbox" class="delete_item" title="حذف" name="delete_item_chkbox" data-popup="gallary" value="{{$thumb}}" checked="checked" data-type="post">--}}
                        @else
                            <img class="thumb" src="/assets/lazy/post.jpg" alt="lazy-gallay" width="80" height="80">
                        @endif
                    </li>
                @else
                    @break
                @endif
            @endforeach
        @endif
    </ul>
    <input name="thumb" type="hidden" value="{{ old('thumb', isset($post) ? $post->thumb : '') }}" data-popup="gallary" autocomplete="off">
</div>
<div class="clear"></div>
