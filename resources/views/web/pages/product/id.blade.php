@extends('layouts.app')

@php $i_er=1; @endphp
@foreach( explode(',',$product->thumb) as $thumb )
    @if ($i_er < 2)
        @php
            $thumb_t = url('/images/uploads/picture/product'.'/'.$thumb.'.jpg');
        @endphp
    @endif
    @php $i_er++; @endphp
@endforeach

@if($product->publish == 'draft')
    @section('title','پیش‌نویس : خرید، فروش، قیمت و مشخصات '. $product->title )
@else
    @section('title','خرید، فروش، قیمت و مشخصات '. $product->title )
@endif

@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@section('web_robots', $product->robots ? $product->robots : 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1'  )
@section('web_description', preg_replace( "/\r|\n|\t/", "", mb_substr( strip_tags( str_replace('   ','',$product->content)) ,0,100, "utf-8") . '‍...') )
@section('web_type', 'product' )
@section('web_date', $product->created_at )
@section('thumb', $thumb_t )
@section('web_size_w', '1080' )
@section('web_size_h', '1080' )
@section('web_amp', route('home').'/shop/'.$product->slug.'/amp' )


@section('content')
<div class="col">
    <div class="box-pan">
        <div class="content-product product col-m-12">

            <section class="single card hidden">

                @can('content_edit')
                <div class="toolbar-editor">
                    <a class="btn btn-danger text-white btn-edit" href="admin/product/{{$product->id}}/edit" title="ویرایش محصول">
                        <i class="icn block white" style="background-image:url('/icons/pencil.svg');"></i>
                        ویرایش محصول
                    </a>
                </div>
                @endcan

                @if($product->publish == 'draft')
                <div class="panel draft">
                    <div class="circ"></div>
                    <div class="txt">پیش‌نویس</div>
                </div>
                @endif

                <div class="thumbr-info">

                    <div class="thumb gallary xzoom-container">
                        <div class="figure">
                            @php $i_er=1; @endphp
                            @foreach(explode(',',$product->thumb) as $thumb )
                                @if ($i_er < 2)
                                    @if ( file_exists(storage_path( 'uploads/picture/product/'. $thumb .'.jpg' )) )
                                        <img id="xzoom-magnific" class="xzoom5 thumb sec-{{$i_er}}"  alt="{{$product->title}}" width="500" height="500"
                                             src="/generated/images/product/500x500/{{$thumb}}.webp"
                                             xoriginal="/images/uploads/picture/product/{{$thumb}}.jpg">
                                    @else
                                        <img class="thumb" src="/assets/lazy/gallary.jpg" alt="{{$product->title}}" width="500" height="100%">
                                    @endif
                                @endif
                                @php $i_er++; @endphp
                            @endforeach
                        </div>
                        <ul class="sub-thumb sub-gallary xzoom-thumbs">
                            @php $i_er=1; @endphp
                            @foreach( explode(',',$product->thumb) as $thumb )
                                @if ($i_er < 5)
                                <li class="thumb-btn btn-gallary sec-{{$i_er}}" title="{{$product->title}}"
                                    href="/images/uploads/picture/product/{{$thumb}}.jpg?w=1080&h=1080">
                                    @if ( file_exists(storage_path( 'uploads/picture/product' .'/'. $thumb .'.jpg' )) )
                                        <img class="xzoom-gallery5 thumb-s" alt="{{$product->title}}" width="80" height="80"
                                                src="/generated/images/product/80x80/{{$thumb}}.webp"
                                                xpreview="/images/uploads/picture/product/{{$thumb}}.jpg" />
                                    @else
                                        <img class="xzoom-gallery5 thumb-s" alt="{{$product->title}}" width="80" height="80"
                                                src="/assets/lazy/load.jpg" />
                                    @endif
                                </li>
                                @endif
                                @php $i_er++; @endphp
                            @endforeach
                            <span class="caption-sli">{{$product->title}}</span>
                        </ul>
                    </div>

                    <div class="info">
                        <div class="title-ht toolbar">
                            <h1 class="text-right" itemprop="name">{{$product->title}}</h1>
                        </div>

                        <div class="info-content">
                            <div class="info-right">

                                <div class="box-pa">
                                    <div class="box blue">
                                        <div class="pa-ic">
                                            <div class="cio txt"><div class="que">پارت نامبر محصول:</div><div class="txt extra"><h2 class="sku-number-txt">{{$product->sku_n}}</h2></div></div>
                                        </div>
                                    </div>
                                </div>

                                @if(!empty($categories))
                                <div class="box-pa category categories-row-in-product-page">
                                    <div class="box default">
                                        <div class="pa-ic">
                                            <div class="cio txt">
                                                <div class="que">دسته‌بندی:</div>
                                                <ul class="extra txt">
                                                <!-- pages.product.id -->
                                                @foreach( $categories as $cat)
                                                    @if( $cat->menu )
                                                        @if ( $cat->menu->parent == '0' )
                                                            <li>
                                                                <a href="products/cat/{{$cat->menu->slug}}" title="{{ $cat->menu->title }}" data-ft="i:{{$cat->menu->id}}-p:{{$cat->menu->parent}}">{{ $cat->menu->title }}</a>
                                                            </li>
                                                        @else
                                                            <li>
                                                                <a href="products/cat/{{$cat->menu->slug}}/{{$cat->menu->slug}}" title="{{ $cat->menu->title }}" data-ft="i:{{$cat->menu->id}}-p:{{$cat->menu->parent}}">{{ $cat->menu->title }}</a>,
                                                            </li>
                                                        @endif
                                                    @endif
                                                @endforeach
                                                <li></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @if(!empty($product->tags) && !empty($product->tagsTranslated) && $product->tagsTranslated->count() > 0)
                                <div class="box-pa category categories-row-in-product-page">
                                    <div class="box default">
                                        <div class="pa-ic">
                                            <div class="cio txt">
                                                <div class="que">برچسب:</div>
                                                <ul class="extra txt">
                                                @foreach( $product->tagsTranslated as $tag)
                                                        <li>
                                                            <a href="/tags/{{ $tag->name_translated }}" target="_self">
                                                            {{ $tag->name_translated }}
                                                            </a>
                                                        </li>
                                                @endforeach
                                                    <li></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                <div class="box-pa">
                                    <div class="box yellow">
                                        <div class="pa-ic">
                                            <i class="icn block fill" style="background-image:url('/icons/verified.svg');"></i>
                                            <div class="txt">پشتیبانی ضمانت محصول</div>
                                        </div>
                                        <div class="pa-ic">
                                            <i class="icn block fill" style="background-image:url('/icons/truck.svg');"></i>
                                            <div class="txt">ارسال سریع به سراسر کشور</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="box-pa">
                                    <div class="box orange big-icn">
                                        <i class="icn fill" style="background-image: url(/icons/fcc.svg);"></i>
                                        <i class="icn fill" style="background-image: url(/icons/ce.svg);"></i>
                                        <i class="icn fill" style="background-image: url(/icons/rohs.svg);"></i>
                                    </div>
                                </div>
                                <div class="aria-clearfix"></div>
                                @if($product->pdf)
                                @foreach( explode(',',$product->pdf) as $item )
                                    <div class="box-pa attach">
                                        <a style="display:block; " href="{{config('path.download.pdf')}}/{{$item}}.pdf" target="_blank">
                                            <img style="vertical-align:middle" src="/icons/download-cloud.svg" />
                                                دانلود فایل راهنمای
                                                {{$item}}.pdf
                                        </a>
                                        <div class="aria-clearfix"></div>
                                    </div>
                                @endforeach
                                @endif

                                @if($product->zip)
                                @foreach( explode(',',$product->zip) as $item )
                                <div class="box-pa attach">
                                    <a href="{{config('path.download.zip')}}/{{$item}}.zip" target="_blank">
                                        <img style="vertical-align:middle" src="/icons/download-cloud.svg" />
                                    دانلود فایل فشرده {{$item}}.zip
                                    </a>
                                    <div class="aria-clearfix"></div>
                                </div>
                                @endforeach
                                @endif

                            </div>
                            <div class="info-left">

                                <div class="box-pa no-select">
                                    <div class="box rfr">
                                        <i class="icn fill" style="background-image: url(/icons/award.svg);"></i>
                                        <div class="que big bold">فروشنده: آی‌تی‌تلکام</div>
                                    </div>
                                </div>

                                <div class="box-pa eer no-select">
                                    <div class="box">
                                        <div class="qe">
                                            <i class="icn block fill" style="background-image:url('/icons/help-circle.svg');"></i>
                                            به مشاوره نیاز دارید؟<br>فقط کافیست با ما در میان بگذارید تا شما را راهنمایی کنیم.
                                        </div>
                                        <div class="ay">
                                            <div class="bold"><i class="icn block fill" style="background-image:url('/icons/phone.svg');"></i>تماس بگیرید</div>
                                            <div class="bold ltr"><a class="ltr" href="tel:+982144446012">۰۲۱-۴۴۴۴۶۰۱۲</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="tab-content">
                    <div class="pan-tabs">
                        <ul class="tabs-list">
                            <li class="tab btn-t description bold first active" data-id="1">
                                <img style="vertical-align:middle" src="/icons/glasses.svg" width="24px" />
                                توضیحات محصول
                            </li>
                            @if($product->detials)
                            <li class="tab btn-t detials bold" data-id="2">
                                <img style="vertical-align:middle" src="/icons/clipboard-list.svg" width="24px" />
                                مشخصات فنی و تخصصی
                            </li>
                            @endif
                            {{-- <li class="tab btn-t comments bold last" data-id="3" data-id-pro="427" data-x-pro="0">نظرات کاربران</li> --}}
                        </ul>
                    </div>
                    <div class="data tab-content description ">
                        <div class="content-i data-1 show"><h3 class="hidden">{{$product->title}}</h3>{!! $product->content !!}</div>
                        <div class="content-i data-2"><h3 class="hidden">مشخصات فنی {{$product->title}}</h3>{!! $product->detials !!}</div>
                    </div>
                </div>
            </section>
            @if(!empty($menu_id))
            <section class="card box-lists">
                <div class="title-ts no-line">
                    <div class="txt extra"><i class="icn block fill" style="background-image:url('/icons/arrow-left-right.svg');"></i>محصولات مرتبط</h3></div>
                </div>
                <ul class="lists grid grid-1 gap-2 product">
                        @foreach( \App\Models\Category::orderBy('created_at', 'DESC')->where( 'type','=','product' )->where( 'menu_ids','=', $menu_id->menu_ids )->limit(5)->get() as $product )
                            @if ( $id != $product->no_id && $product->product_id($product->no_id)->publish == 'on' )
                                <li>
                                <a href="/shop/{{$product->product_id($product->no_id)->slug}}" title="{{$product->product_id($product->no_id)->title}}">
                                    @foreach( explode(',', $product->product_id($product->no_id)->thumb ) as $thumb => $val)
                                        @if($thumb == 0)
                                        <div class="thumb-l">
                                            @if ( file_exists(storage_path( 'uploads/picture/product' .'/'. $val .'.jpg' )) )
                                                <img class="thumb" src="/images/uploads/picture/product/{{$val}}.jpg" alt="{{$product->product_id($product->no_id)->title}}" width=170 height=170>
                                            @else
                                                <img class="thumb" src="/assets/lazy/product.jpg" alt="{{$product->product_id($product->no_id)->title}}" width=170 height=170>
                                            @endif
                                            </div>
                                        @endif
                                    @endforeach
                                    <div class="text-center">{{ $product->product_id($product->no_id)->title }}</div>
                                </a>
                                </li>
                            @endif
                        @endforeach
                </ul>
                <div class="aria-clearfix"></div>
            </section>
            @endif

        </div>
    </div>
</div>
@endsection

{{-- @push('popup')
<div class="popup hide" data-popup="slideshow" style="width:700px;height:500px;">
    <div class="header bold">گالری : {{$product->title}}</div>
    <div class="body form-checkbox gallary">
    @foreach( explode(',',$product->thumb) as $thumb )
        <img class="thumb lazyload-open" src="/images/uploads/picture/product/{{$thumb}}.jpg?w=1080&h=1080" alt="{{$product->title}}">
    @endforeach
    </div>
    <div class="footer">
        <div class="btn btn-danger btn-close-popup btn-close-abs">بستن</div>
    </div>
</div>
@endpush --}}

@section('breadcrumb')
    <div class="breadcrumb">
        <i class="icn fill" style="background-image: url(/icons/map-pin.svg);"></i>
        <ul itemscope="" itemtype="http://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a href="{{route('home')}}" itemprop="item" title="خانه"><span itemprop="name">خانه</span></a><meta content="1" itemprop="position"></li>
            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a href="/shop" itemprop="item" title="فروشگاه"><span itemprop="name">فروشگاه</span></a><meta content="2" itemprop="position"></li>
            @foreach( $categories as $cat)
            @if ( $cat->menu )
                @if ( $cat->menu->parent == '0' )
                    <li class="lin" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                        <a href="products/cat/{{$cat->menu->slug}}" title="{{$cat->menu->title}}" itemprop="item" ><span itemprop="name">{{$cat->menu->title}}</span><meta content="3" itemprop="position"></a>
                    </li>
                @endif
            @endif
            <li class="las-tit"><span itemprop="name" content="{{$product->title}}">{{$product->title}}</span></li>
            @endforeach
        </ul>
        <div class="aria-clearfix"></div>
        {{--<div class="txt">{{$product->title}}</div>--}}
    </div>
@endsection

@section('schema_org')
    @php $product = \App\Models\Product::where('id', $product->no_id)->first(); @endphp
    @if($product)
    <script type="application/ld+json">
        {
            "@context":"https://schema.org",
            "@type":"Product",
            "name":"{{ $product->title }}",
            "description":"{{ preg_replace( "/\r|\n|\t/", "", mb_substr( strip_tags( str_replace('   ','',$product->content)) ,0,100, "utf-8") . '‍...') }}",
            "datePublished":"{{ $product->created_at }}",
            "dateModified":"{{ $product->created_at }}",
            "publisher":{
                "@type": "Organization",
                "url": "{{ url("/") }}",
                "name": "{{ $product->title}}",
                "logo": {
                    "@type": "ImageObject",
                    "url": "{{ url('/assets/logo.jpg') }}"
                    },
                "contactPoint": {
                    "@type": "ContactPoint",
                    "telephone": "+982144446012",
                    "email": "sale@ittelecom.ir",
                    "contactType": "Customer service"
                }
            },
            "mainEntityOfPage":{
                "@type":"WebPage",
                "@id":"{{ url('/shop/'.$product->slug) }}"
            },
            "author":{
                "@type": "Person",
                "name": "فروشگاه اینترنتی آی‌تی‌تلکام",
                "url": "{{ url("/") }}"
            },
            "image":{
                "@type":"ImageObject",
                "url":"{{ $thumb_t }}","width":1200,"height":630
            },
            "sku":"{{ $product->sku_n }}",
            "mpn": "{{ $product->sku_n }}",
            "brand": {
                "@type": "Brand",
                "name": "{{ $product->brand }}"
            },
            "aggregateRating": {
            "@type": "AggregateRating",
                "ratingValue": "4.99",
                "reviewCount": "1"
            },
            "offers": {
                "@type": "Offer",
                "url":"{{ url('/shop/'.$product->slug) }}",
                "hasMerchantReturnPolicy": "https://schema.org/hasProductReturnPolicy",
                "shippingDetails": "Free",
                "priceCurrency": "IRR",
                "price": "1",
                "priceValidUntil" : "{{ date('Y-m-d H:i:s +03:00', strtotime('now + 5 years')) }}" ,
                "itemCondition": "https://schema.org/NewCondition",
                "availability": "https://schema.org/InStock",
                "seller": {
                    "@type": "Organization",
                    "name":"فروشگاه اینترنتی آی‌تی‌تلکام"
                }
            },
            "review": {
                "@type": "Review",
                        "reviewRating": {
                        "@type": "Rating",
                        "ratingValue": "5"
                        },
                "name": "{{ $product->title }}",
                "author": {
                        "@type": "Person",
                        "name": "فروشگاه اینترنتی آی‌تی‌تلکام"
                },
                "datePublished": "{{ $product->created_at }}",
                "reviewBody": "{{ str_replace(array("\r","\n","\t","<p>","</p>"),'', mb_substr( preg_replace( "/\r|\n|\t/", "", mb_substr( strip_tags( str_replace('   ','',$product->content)) ,0,100, "utf-8") . '‍...') ,0,5, "utf-8")) }}",
                "publisher": {
                        "@type": "Organization",
                        "name":"فروشگاه اینترنتی آی‌تی‌تلکام"
                }
            }
        }
    </script>
    @endif
@endsection
