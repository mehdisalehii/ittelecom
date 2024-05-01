
<div class="info">
    <div class="arch-header">
        <div class="pa-ic">
        @if (isset($post))
{{--            @foreach($users as $row_a)--}}
{{--                @if( $row_a->id == $post->author )--}}
{{--                    <a href="author/{{$row_a->username}}" class="block">--}}
{{--                        <img class="profile" src="{{'/images/uploads/picture/profile'}}/{{$row_a->photo}}" alt="{{$row_a->name}}" width="40" height="40">--}}
{{--                        <div class="txt-o">{{$row_a->name}}</div>--}}
{{--                    </a>--}}
{{--                @endif--}}
{{--            @endforeach--}}
        @else
            @php
                $user = Auth::user();
                $username = $user->username;
                $mobile = $user->mobile;
                $email = $user->email;
                $photo = $user->photo;
                $letter = strtoupper($username);
            @endphp
            <a href="author/{{$username}}" class="pa-ic block">
{{--                @if (strpos($photo, '#') !== false)--}}
{{--                    <div class="profile string-back" style="background:{{$photo}}">{{mb_substr($letter, 0, 1)}}</div>--}}
{{--                @else--}}
{{--                    <img class="profile" src="{{ '/images/uploads/picture/profile' .'/'. Auth::guard('web')->user()->photo }}" width="40" height="40" >--}}
{{--                @endif--}}
                <div class="txt-o">{{ e(Auth::guard('web')->user()->name) }}</div>
            </a>
        @endif
        </div>
    </div>
    <div class="aria-clearfix"></div>
    <div class="arch-header">
            <div class="pa-ic">
{{--                    <i class="icn fill" style="background-image: url(/icons/folder.svg); float:right;"></i>--}}
                    <div class="que" style="float:right;"><b>انتخاب دسته‌بندی:</b></div>
                    <ul class="extra catlist-txt">
                        @if(isset($post))
                            @foreach( $categories as $cat)
                                @if ( $cat->menu )
                                    @if ( $cat->menu->parent == '0' )
                                        <li>
                                            {{ $cat->menu->title }}
                                        </li>
                                    @elseif ( $cat->menu->parent != '0' )
                                        <li>
                                           {{ $cat->menu->title }}،
                                        </li>
                                    @endif
                                @endif
                            @endforeach
                        @else
                            <li>...</li>
                        @endif
                    </ul>
                <div class="btn-popup" style="float:right" data-popup="category" title="ویرایش دسته‌بندی"><i style="background-image:url('/icons/pencil.svg')"></i></div>
                <div class="aria-clearfix"></div>
            </div>
{{--        <input name="cat" type="text" value="{{ old('cat', isset($post) ? $post->menu_ids : '') }}" class="hidden catlist-input" autocomplete="off">--}}
    </div>
    <div class="aria-clearfix"></div>
    <br>
    <div class="arch-header">
        <div class="pa-ic">
{{--            <i class="icn fill" style="float:right;background-image: url(/icons/clock.svg);"></i>--}}
            <div class="cio bold" style="float:right;" data-date="{{ isset($post) ? jdate($post->created_at)->format('%A %d %B %Y') : jdate( now() )->format('%A %d %B %Y')  }}">
                {{ isset($post) ? jdate($post->created_at)->format('%A %d %B %Y') : jdate( now() )->format('%A %d %B %Y') }}
            </div>
        </div>
    </div>
    <div class="aria-clearfix"></div>
    <div class="arch-header">
        <div class="pa-ic">
{{--            <i class="icn fill" style="float:right;background-image: url(/icons/eye.svg);"></i>--}}
            @if(isset($post))
                <div class="cio bold" style="float:right;">
                    {{ $post->visitsForever() }}
                    بازدید
                </div>
            @endif
        </div>
    </div>
    <br>
    <br>
    <hr><br>
</div>
