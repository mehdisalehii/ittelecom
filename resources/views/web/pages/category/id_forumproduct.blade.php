@extends('layouts.app')

@section('web_type', 'Forum' )
@section('title','اتاق انبار انجمن '. $category->title )
@section('titleWebname',' | '. 'آی‌تی‌تلکام')
@section('web_robots', 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' )
@section('web_description', 'مرجع نقد و بررسی و فروش محصولات شبکه ، دوربین مدار بسته و فیبرنوری' )

@section('content')

<div class="menubar-page red scrollbar-horizon">
   <nav class="nav">
      <div class="menu-link menu-back">
            <ul class="menu">
               <li class="-0"><a class="block" href="forum/cats/{{$category->slug}}">تاپیک‌های {{$category->title}}</a></li>
               <li class="-0"><a class="block active" href="forum/products/{{$category->slug}}">اتاق اتبار {{$category->title}}</a></li>
            </ul>
      </div>
   </nav>
</div>

<div class="lists">
   <div class="lists-pan col-m-12">

   @include('web.inc.breadcrumb.category_forum_product')

      <div class="info-fo">
         <div class="thumbnail-er">
            <img class="thumb" src="/assets/menu/{{$category->thumb}}" alt="{{$category->title}}" width=200 height=200>
            {{-- <img class="thumb back" src="/assets/background/back-300.png" alt="{{$category->title}}" width=200 height=200> --}}
         </div>
         <div class="txt bold">اتاق {{$category->title}}</div>
      </div>

      <div class="archive-col-s-12">

         <div class="new-btn">
            <a href="{{'/login'}}" class="btn btn-border red"><i class="icn fill" style="background-image: url(/icons/package-plus.svg);"></i>ثبت محصول جدید</a>
         </div>

         <div class="archive category col-9 last-bl hidden">
            <div class="head red box">
               <h1 class="text-right"><i class="icn white" style="background-image: url(/icons/package.svg);"></i>آخرین انبار</h1>
               @if ($category->content)<div class="desc">{!!$category->content!!}</div>@endif
            </div>
            <ul class="forum category lists las-er" data-str="0" data-limit="5" data-id="{{$cat_id}}" data-slug="{{$last_url}}">
               @forelse($cats_forum_products as $row)
                     @if ( $row->title )
                        @if (mb_strlen( $row->title ) > 45)
                           @php $title = mb_substr( $row->title ,0,45, "utf-8").'...'; @endphp
                        @else
                           @php $title = $row->title; @endphp
                        @endif
                     @endif

                     <li class="topic list card">
                        <article class="box">
{{--                           <div class="arch-header">--}}
{{--                                 @foreach($users as $row_a)--}}
{{--                                    @if( $row_a->id == $row->author )--}}
{{--                                       <a href="author/{{$row_a->username}}" class="block">--}}
{{--                                             <img class="profile" src="{{'/images/uploads/picture/profile'}}/{{$row_a->photo}}" alt="{{$row_a->name}}" width="40" height="40">--}}
{{--                                             <div class="txt-o">{{$row_a->name}}</div>--}}
{{--                                       </a>--}}
{{--                                    @endif--}}
{{--                                 @endforeach--}}
{{--                           </div>--}}
                           <div class="arch-cater 11">
                                 <div class="bo-btb no-hov"><i class="icn fill" style="background-image: url(/icons/corner-up-left.svg);"></i>{{$row->answer}} پاسخ</div>
                                 <div class="date">تاریخ انتشار: {{  jdate($row->created_at)->ago()  }}</div>
                           </div>
                           <div class="arch-content">
                                 <a class="block" href="forum/{{$row->slug}}" title="{{$title}}">
                                    <div class="txt-o bold">{{$title}}</div>
                                    <div class="para">{!! mb_substr( strip_tags( str_replace('   ','',$row->content)) ,0,250, "utf-8") !!}...</div>
                                 </a>
                           </div>
                           <div class="arch-cater 12">
                              @foreach(explode(",", $row->menu_ids) as $split_cat)
                              @foreach($category_forum as $cat_menu  )
                              @if( $cat_menu->id == $split_cat  )

                              <a class="bo-btb" href="forum/products/{{$cat_menu->slug}}"><i class="icn fill" style="background-image: url(/icons/hash.svg);"></i>{{$cat_menu->title}}</a>
                              @endif
                              @endforeach
                              @endforeach

                           </div>
                        </article>
                     </li>
               @empty
                     <li class="no-data">محصولی وجود ندارد.</li>
               @endforelse
            </ul>
         </div>

         <div class="sidebar archive">

            <aside class="card box border-blue">
               <i class="icn fill" style="background-image: url(/icons/message-square.svg);"></i>
               <div class="h1 bold">تاپیک‌های {{$category->title}}</div>
                  <ul class="category lists-s">
                     @php $i_numb_y=1; @endphp
                     @foreach($cats_forum as $row)
                        @if ( $row->title )
                           @if (mb_strlen( $row->title ) > 25)
                                 @php $title = mb_substr( $row->title ,0,25, "utf-8").'...'; @endphp
                           @else
                                 @php $title = $row->title; @endphp
                           @endif
                        @endif

                        <li class="topic list">
                           <a class="block" href="forum/{{$row->slug}}" title="{{$row->title}}">
                              <div class="number bold">{{ $i_numb_y }}</div>
                              <div class="txt">{{$title}}</div>
                           </a>
                        </li>
                        @php $i_numb_y++; @endphp
                     @endforeach

                     <li class="list bold more">
                        <a href="/forum/cats/{{$category->slug}}" class="block" title="ادامه تاپیک‌ها">
                        <div class="txt">بیشتر ببینید<i class="icn fill" style="background-image: url(/icons/arrow-left.svg);"></i></div>
                        </a>
                     </li>

                  </ul>
            </aside>

         </div>
      </div>
   </div>
</div>
@endsection
