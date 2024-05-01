@if(@$reading && sizeof($reading) > 0)
<div class="archive">
    <aside class="card box">
    <div class="archive">
    <i class="icn fill" style="background-image: url(/icons/coffee.svg);"></i>
    <div class="h1 bold">مقالات مرتبط</div>
    <ul class="category lists-s">
        @foreach($reading as $row)
            <li class="list">
                <a class="block" href="blog/{{$row->slug}}" title="{{$row->title}}">
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
    </div>
    <div class="aria-clearfix"></div>
</aside>
</div>
@endif
