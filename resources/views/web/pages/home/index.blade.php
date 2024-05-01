@extends('layouts.app')
@section('title', '')
@section('titleWebname', 'فروشگاه اینترنتی آی‌تی‌تلکام' )
@section('body_class','home')
@section('web_type', 'website' )
@section('web_amp', route('home').'/amp' )
@section('content')
<div class="slider nav-menu homepage-opr">
   <div class="menu-to">
      <ul class="menu">
         <li class="list-home-menu">
         <div class="list-general menu-main">
            @if(Route::current()->getName() != '/')
                  <x-app.navlist></x-app.navlist>
            @endif
            <div class="line-menu-content-box"></div>
         </div>
         </li>
      </ul>
{{--      <div class="sidebar">--}}
{{--         <ul class="social col-m-12">--}}
{{--            <li><a class="block red" href="//instagram.com/ittelecomco" title="اینستاگرام" itemprop="url"><i class="icn" style="background-image: url('/icons/instagram.svg')"></i>اینستاگرام</a></li>--}}
{{--            <li><a class="block blue" href="//t.me/Parhammee" title="تلگرام" itemprop="url"><i class="icn" style="background-image: url('/icons/telegram.svg')"></i>کانال تلگرام</a></li>--}}
{{--         </ul>--}}
{{--      </div>--}}
    <div class="aria-clearfix"></div>
    <a class="" href="tel:+982144446012">
    <aside class="card box-ados blue phone-consultation-card my-2">
     <div class="thumb"><i class="icn block " style="background-image:url('/icons/phone-call.svg');"></i></div>
     <div class="title-wcd wew">مشاوره تلفنی با متخصصین شبکه و فیبر نوری</div>
     <div class="title-wcd">تماس بگیرید!</div>
     <div class="title-icon ltr"><a class="phone-link ltr" href="tel:+982144446012">۰۲۱-۴۴۴۴۶۰۱۲</a></div>
    </aside>
    </a>
    <div class="aria-clearfix"></div>
    <div class="sidebar">
       <ul class="social col-m-12">
           <li><a class="block red" href="//instagram.com/ittelecomco" title="اینستاگرام" itemprop="url"><i class="icn" style="background-image: url('/icons/instagram.svg')"></i>اینستاگرام</a></li>
           <li><a class="block blue" href="//t.me/Parhammee" title="تلگرام" itemprop="url"><i class="icn" style="background-image: url('/icons/telegram.svg')"></i>کانال تلگرام</a></li>
       </ul>
    </div>
   </div>
   <div class="panel-box-s">
      <div class="lists-pan">
         <aside class="card box-oler grid grid-1 gap-3">
         <div class="title-ts">
            <div class="txt title-s extra">
                  <i class="icn block fill" style="background-image:url('/icons/message-square.svg');"></i>
               نقد و بررسی تجهیزات سخت‌افزاری
            </div>
            <a class="btn-border" href="/forum" title="ورود به تاپیک‌های آی‌تی‌تلکام">
            ورود به اتاق انجمن<i class="icn block fill" style="background-image:url('/icons/chevron-left.svg');"></i></a>
         </div>
         <div class="sidebar right archive">
            <div class="h1 bold"><i class="icn block fill" style="background-image:url('/icons/twitch.svg');"></i>جدیدترین تاپیک‌ها</div>
            <ul class="category lists-s">
            @php $i_numb=1; @endphp
            @foreach($topic_last as $row)
                  <li class="topic list">
                     <a class="block link" href="forum/{{$row->slug}}" title="{{$row->title}}">
                        {{-- <div class="number bold">{{ \Morilog\Jalali\CalendarUtils::convertNumbers($i_numb) }}</div> --}}
                        <i class="icn block fill" style="background-image:url('/icons/arrow-up-left.svg');"></i>
                        <span>{{\Illuminate\Support\Str::limit( strip_tags( str_replace('   ','',$row->title)) ,35)}}</span>
                     </a>
                  </li>
                  @php $i_numb++; @endphp
            @endforeach
                  {{-- <li class="list bold more">
                     <a href="/forum" class="block" title="ادامه تاپیک‌ها">
                     <div class="txt">مشاهدهٔ همه<i class="icn fill" style="background-image: url(/icons/arrow-left.svg);"></i></div>
                     </a>
                  </li> --}}
            </ul>
         </div>
         <div class="sidebar left archive">
            <div class="h1 bold"><i class="icn block fill" style="background-image:url('/icons/package.svg');"></i>انبار تاپیک‌ها</div>
            <ul class="category lists-s">
            @php $i_numb_y=1; @endphp
            @foreach($topic_visited as $row)
                  <li class="topic list">
                     <a class="block link" href="forum/{{$row->slug}}" title="{{$row->title}}">
                        {{-- <div class="number bold">{{ \Morilog\Jalali\CalendarUtils::convertNumbers($i_numb_y) }}</div> --}}
                        <i class="icn block fill" style="background-image:url('/icons/arrow-up-left.svg');"></i>
                        <span>{{\Illuminate\Support\Str::limit( strip_tags( str_replace('   ','',$row->title)) ,35)}}</span>
                     </a>
                  </li>
                  @php $i_numb_y++; @endphp
            @endforeach
            </ul>
         </div>
         </aside>
      </div>
      <div class="box-pan">
         <div class="lists-pan">
            <section class="card box-lists">
            <div class="title-ts">
                  <div class="txt extra">
                  <i class="icn block" style="background-image:url('/icons/flame.svg');"></i>
                  <span style="  font-size: 1.25rem; line-height: 1.75rem; font-weight: 700;">پربازدیدترین‌ها</span></div>
                  <a class="btn-border block" href="/shop">
                     مشاهدهٔ همه
                     <i class="icn block fill" style="background-image:url('/icons/arrow-left.svg');"></i>
                  </a>
            </div>
            <ul class="lists grid grid-1 gap-2 product">
                  @foreach($most_visited as $row)
                     <li>
                        <a href="/shop/{{$row->slug}}" title="{{$row->title}}">
                              @foreach( explode(',',$row->thumb) as $thumb => $val)
                              @if($thumb == 0)
                              <div class="thumb-l">
                                <img class="thumb" src="/generated/images/product/170x170/{{$val}}.webp" alt="{{$row->title}}" width=170 height=170>
                              </div>
                              @endif
                              @endforeach
                              <div class="text-center">{{ $row->title }}</div>
                        </a>
                     </li>
                  @endforeach
            </ul>
            <div class="aria-clearfix"></div>
            </section>
         </div>
      </div>
{{--      <div class="motto icon-text hidden">--}}
{{--         <div class="lists-pan">--}}
{{--         <aside class="card box-motto grid grid-1 gap-3">--}}
{{--         @foreach($widget_why_us as $row)--}}
{{--            <div class="box bold">--}}
{{--                  <span class="txt icn" style="background-image:url(/icons/{{$row->thumb}})">{{$row->title}}</span>--}}
{{--            </div>--}}
{{--         @endforeach--}}
{{--         </aside>--}}
{{--         </div>--}}
{{--      </div>--}}
      @foreach($widget_main_category as $row_t)
      <div class="box-pan">
         <div class="lists-pan">
            <section class="card box-lists">
            <div class="title-ts">
                  <div class="txt extra">
                  <i class="icn block" style="background-image:url('/assets/menu/{{$row_t['thumb']}}');"></i>
                  <span style="  font-size: 1.25rem; line-height: 1.75rem; font-weight: 700;">{{$row_t['title']}}</span></div>
                  <a class="btn-border block" href="{{$row_t['slug']}}">
                     مشاهدهٔ همه
                     <i class="icn block fill" style="background-image:url('/icons/arrow-left.svg');"></i>
                  </a>
            </div>
            <ul class="lists grid grid-1 gap-2 product">
                  @foreach(\App\Models\Category::where('type','=','product')->leftJoin('products', function($leftJoin) { $leftJoin->on('categories.no_id', 'products.id'); })->where(function ($query) { $query->where('products.publish', 'publish')->orWhere('products.publish', 'on'); })->where('categories.menu_ids','=',$row_t['cat'])->limit(6)->get() as $product)
                     <li>
                        <a href="/shop/{{$product->product_id($product->no_id)->slug}}" title="{{$product->product_id($product->no_id)->title}}">
                           @foreach( explode(',', $product->product_id($product->no_id)->thumb ) as $thumb => $val)
                           @if($thumb == 0)
                            <div class="thumb-l">
                             <img class="thumb" src="/generated/images/product/170x170/{{$val}}.webp" alt="{{$val}}" width=170 height=170>
                            </div>
                           @endif
                           @endforeach
                           <div class="text-center">{{ $product->product_id($product->no_id)->title }}</div>
                        </a>
                     </li>
                  @endforeach
            </ul>
            <div class="aria-clearfix"></div>
            </section>
         </div>
      </div>
      @endforeach
      <div class="box-pan">
         <div class="lists-pan">
            <section class="card box-lists">
            <div class="title-ts">
                  <div class="txt extra">
                  <i class="icn block" style="background-image:url('/icons/book-open.svg');"></i>
                  <span style="  font-size: 1.25rem; line-height: 1.75rem; font-weight: 700;">آخرین مقالات</span></div>
                  <a class="btn-border block" href="//blog">
                     مشاهدهٔ همه
                     <i class="icn block fill" style="background-image:url('/icons/arrow-left.svg');"></i>
                  </a>
            </div>
            <ul class="lists grid grid-1 gap-2">
                  @foreach($post_last as $row)
                     <li>
                        <a href="/blog/{{$row->slug}}" title="{{$row->title}}">
                              @foreach( explode(',',$row->thumb) as $thumb => $val)
                                @if($thumb == 0)
                                <div class="thumb-l">
                                    <img class="thumb" src="/generated/images/post/340x170/{{$val}}.webp" alt="{{$row->title}}" width=340 height=170>
                                </div>
                                @endif
                            @endforeach
                              <div class="text-center">{{ $row->title }}</div>
                        </a>
                     </li>
                  @endforeach
            </ul>
            <div class="aria-clearfix"></div>
            </section>
         </div>
      </div>
   </div>
</div>
@endsection
@section('schema_org')
   <script type="application/ld+json">
   {
      "@context": "https://schema.org",
      "@type": "Organization",
      "url": "{{ route('home') }}",
      "logo": "{{ url('/assets/logo.jpg') }}",
      "contactPoint": {
         "@type": "ContactPoint",
         "telephone": "+982144446012",
         "email": "sale@ittelecom.ir",
         "contactType": "Customer service"
      }
      "@context":"https://schema.org",
      "@type": "LocalBusiness",
      "name": "آی‌تی‌تلکام",
      "image": "{{ url('/assets/logo.jpg') }}",
      "@id": "{{ url('/') }}",
      "url": "{{ url('/') }}",
      "potentialAction":{
         "@type":"SearchAction",
         "target": "/search/{search_term_string}",
         "query-input":"required name=search_term_string"
      },
      "telephone": "+982144446012",
      "email": "sale@ittelecom.ir",
      "priceRange": "IRR",
      "address": {
         "@type": "PostalAddress",
         "streetAddress": 'تهران، جنت‌آباد جنوبی، انتهای خیابان چهارباغ غربی، پلاک ۵۵ ',
         "addressLocality": 'تهران، جنت‌آباد جنوبی، انتهای خیابان چهارباغ غربی، پلاک ۵۵ ',
         "postalCode": "1473845845",
         "addressCountry": "IR"
      },
      "geo": {
         "@type": "GeoCoordinates",
         "latitude": '35.7752311',
         "longitude": '51.418075'
      },
      "openingHoursSpecification": {
         "@type": "OpeningHoursSpecification",
         "dayOfWeek": [
               "Monday",
               "Tuesday",
               "Wednesday",
               "Thursday",
               "Saturday",
               "Sunday"
         ],
         "opens": "09:00",
         "closes": "17:00"
      }
   }
   </script>
@endsection
