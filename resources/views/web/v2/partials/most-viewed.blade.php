@if(@$posts_visit && sizeof($posts_visit) > 0)
<div class="archive">
    <div class="archi-visit">
        <aside class="card box">
            <i class="icn fill" style="background-image: url(/icons/flame.svg);"></i>
            <div class="h1 bold">پربازدیدترین مقاله‌ها</div>
            <ul class="category lists-s">
                @foreach($posts_visit as $row)
                    <li class="list">
                        <a class="block" href="/blog/{{$row->slug}}" title="{{$row->title}}">
                            @foreach( explode(',',$row->thumb) as $thumb => $val)
                                @if($thumb == 0 && !empty($val))
                                    <img class="thumb" src="/generated/images/post/85x42/{{$val}}.webp" alt="{{$row->title}}"  width="85" height="42">
                                @endif
                            @endforeach
                            <div class="txt">{{\Illuminate\Support\Str::limit( strip_tags( str_replace('   ','',$row->title)) ,30)}}</div>
                        </a>
                    </li>
                @endforeach
            </ul>
            <div class="aria-clearfix"></div>
        </aside>
    </div>
</div>
@endif
