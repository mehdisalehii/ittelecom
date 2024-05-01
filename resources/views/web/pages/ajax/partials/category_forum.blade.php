@if (Request()->url_fetch == 'forum/cats' )
    @foreach($archive_cat_fetch_rt as $row)
        <li class="topic list card">
            <article class="box">
                <div class="arch-content">
                    <a class="block" href="forum/{{$row->slug}}" title="{{$row->title}}">
                        <div class="txt-o bold"><i class="icn fill" style="background-image: url(/icons/twitch.svg);"></i>{{$row->title}}</div>
                    </a>
                    <div class="para">{!! mb_substr( strip_tags( str_replace('   ','',$row->content)) ,0,250, "utf-8") !!}...</div>
                </div>
                <div class="arch-cater 3">
                    <div class="txt-ww date"><i class="icn fill" style="background-image: url(/icons/clock.svg);"></i> {{ jdate($row->created_at)->ago()  }}</div>
                    @foreach($users as $row_a)
                    @if( $row_a->id == $row->author )
                        <a href="author/{{$row_a->username}}" class="hidden"><img class="profile hidden" src="{{'/images/uploads/picture/profile'}}/{{$row_a->photo}}" alt="{{$row->title}}" width="40" height="40"></a>
                        <div class="txt-ww"><i class="icn fill" style="background-image: url(/icons/user.svg);"></i>{{$row->title}}</div>
                    @endif
                    @endforeach
                    <div class="txt-ww bo-btb no-hov">
                        <div class="txt ans">
                            <i class="icn fill" style="background-image: url(/icons/corner-up-left.svg);"></i>{{$row->answer}} پاسخ
                        </div>
                    </div>
                    <div class="txt-ww more">
                        <a class="btn-border more bo-btb" href="forum/{{$row->slug}}">
                        ادامه مطلب<i class="icn fill" style="background-image: url(/icons/arrow-left.svg);"></i></a>
                    </div>
                    @foreach(explode(",", $row->menu_ids) as $split_cat)
                    @foreach($category_blog as $cat_menu  )
                    @if( $cat_menu->id == $split_cat  )
                    <a class="bo-btb hidden" href="forum/cats/{{$cat_menu->slug}}"><i class="icn fill" style="background-image: url(/icons/hash.svg);"></i>{{$cat_menu->title}}</a>
                    @endif
                    @endforeach
                    @endforeach
                </div>
            </article>
        </li>
    @endforeach
@endif
