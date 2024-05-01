@if (Request()->url_fetch == 'forum' )
    @foreach($forum as $row)
        <li class="topic list card">
        <article class="box">
{{--            <div class="arch-header">--}}
{{--            @foreach($users as $row_a)--}}
{{--            @if( $row_a->id == $row->author )--}}
{{--                <a href="author/{{$row_a->username}}" class="block">--}}
{{--                        <img class="profile" src="{{'/images/uploads/picture/profile'}}/{{$row_a->photo}}" alt="{{$row_a->name}}" width="40" height="40">--}}
{{--                        <div class="txt-o">{{$row_a->name}}</div>--}}
{{--                </a>--}}
{{--            @endif--}}
{{--            @endforeach--}}
{{--            </div>                                    --}}
            <div class="arch-cater 4">
            <div class="bo-btb no-hov"><i class="icn fill" style="background-image: url(/icons/corner-up-left.svg);"></i>{{$row->answer}} پاسخ</div>
            <div class="date">تاریخ انتشار: {{ jdate($row->created_at)->ago()  }}</div>
            </div>
            <div class="arch-content">
                <a class="block" href="forum/{{$row->slug}}" title="{{$row->title}}">
                <div class="txt-o bold">{{$row->title}}</div>
                <div class="para">{!! mb_substr( strip_tags( str_replace('   ','',$row->content)) ,0,250, "utf-8") !!}...</div>
                </a>
            </div>
            <div class="arch-cater 5">
            @foreach(explode(",", $row->menu_ids) as $split_cat)
            @foreach($category_blog as $cat_menu  )
            @if( $cat_menu->id == $split_cat  )
            <a class="bo-btb" href="forum/cats/{{$cat_menu->slug}}">{{$cat_menu->title}}</a>
            @endif
            @endforeach
            @endforeach
            </div>
        </article>
        </li>
    @endforeach
@endif
