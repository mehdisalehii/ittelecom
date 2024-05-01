<div class="sidebar archive">
<aside class="card box">
    <i class="icn fill" style="background-image: url(/icons/user-plus.svg);"></i>
    <div class="h1 bold">جدیدترین عضوها</div>
        <ul class="users lists-s">
            @php $i_numb_usa=1; @endphp
            @foreach($users as $row)
            @if ($i_numb_usa < 17)
                @if($row->name)
                    @php $title = $row->name  @endphp
                @else
                    @php $title = $row->username @endphp
                @endif

            <li class="user list col-3">
                <a class="block" href="author/{{$row->username}}" title="{{$title}}">
                    <div class="img">

                        @php
                        $checkThumb = $row->photo;
                        $strUSERName = $row->username;
                        $strUSERName_up = strtoupper($strUSERName);
                        @endphp

                        @if (strpos($checkThumb, '#') !== false)
                        <div class="string-back" style="background:{{$checkThumb}}">{{mb_substr($strUSERName_up, 0, 1)}}</div>
                        @else
                        <img class="thumb" src="{{ '/images/uploads/picture/profile' .'/'. $checkThumb }}" width="50" height="50" alt="{{$title}}">
                        @endif

                    </div>
                </a>
            </li>
            @php $i_numb_usa++; @endphp
            @endif
            @endforeach

        </ul>
</aside>

<aside class="card box border-blue">
    <i class="icn fill" style="background-image: url(/icons/flame.svg);"></i>
    <div class="h1 bold">پربازدترین تاپیک‌ها</div>
        <ul class="category lists-s">
            @php $i_numb_y=1; @endphp
            @foreach($topic_visited as $row)
            @if ( $row->title )
                @if (mb_strlen( $row->title ) > 25)
                        @php $title = mb_substr( $row->title ,0,25, "utf-8").'...'; @endphp
                @else
                        @php $title = $row->title; @endphp
                @endif
            @endif

            <li class="topic list">
                <a class="block" href="forum/{{$row->slug}}" title="{{$row->title}}">
                    <div class="number bold hidden">{{ $i_numb_y }}</div>
                    <div class="txt">{{$title}}</div>
                </a>
            </li>
            @php $i_numb_y++; @endphp
            @endforeach

        </ul>
</aside>
@include('web.v2.partials.social-networks')
</div>
