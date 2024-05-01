@if (Request()->url_fetch == 'category/article' )
@foreach ($posts_id as $id)
    @forelse($archive_cat_fetch as $row)
        @if ( $id->no_id == $row->id )
    <li class="post list card">
        <article class="pan">
        <div class="arch-header">
{{--                @foreach($users as $row_a)--}}
{{--                    @if( $row_a->id == $row->author )--}}
{{--                        <a href="author/{{$row_a->username}}" class="block">--}}
{{--                            <img class="profile" src="{{'/images/uploads/picture/profile'}}/{{$row_a->photo}}" alt="{{$row_a->name}}" width="40" height="40">--}}
{{--                            <div class="txt-o">{{$row_a->name}}</div>--}}
{{--                        </a>--}}
{{--                    @endif--}}
{{--                @endforeach--}}
            </div>
            <div class="arch-cater 2">
                @foreach(explode(",", $row->menu_ids) as $split_cat)
                @foreach($category_blog as $cat_menu  )
                @if( $cat_menu->id == $split_cat  )
                <a class="bo-btb" href="{{'category/article'}}/{{$cat_menu->slug}}">{{$cat_menu->title}}</a>
                @endif
                @endforeach
                @endforeach
                <div class="date">تاریخ انتشار: {{ jdate($row->created_at)->ago()  }}</div>
            </div>
            <div class="arch-content">
                <a class="block" href="/blog/{{$row->slug}}" title="{{$row->title}}">
                    <div class="txt-o bold">{{$row->title}}</div>
                    @foreach( explode(',',$row->thumb) as $thumb => $val)
                        @if($thumb == 0)
                        <div class="thumbnail wewtq">
                            @if ( file_exists(storage_path( 'uploads/picture/post' .'/'. $val .'.jpg' )) )
                                <img class="thumb" src="{{'/images/uploads/picture/post'}}/{{$val}}.jpg" alt="{{$row->title}}" width=800 height=400>
                            @else
                                <img class="thumb" src="/assets/lazy/post.jpg" alt="{{$row->title}}" width=800 height=400>
                            @endif
                        </div>
                        @endif
                    @endforeach
                    <div class="para">{!! \Illuminate\Support\Str::limit( strip_tags( str_replace('   ','',$row->content)) ,250) !!}...<span class="more bold" title="ادامه مطلب {{$row->title}}">ادامه مطلب</span></div>
                </a>
            </div>
        </article>
    </li>
         @endif
        @endforeach
    @endforeach
@endif
