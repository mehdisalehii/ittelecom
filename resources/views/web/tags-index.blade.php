@extends('layouts.app')
@section('title','لیست، خرید محصولات '. $tag_string)
@section('titleWebname',' | '. 'آی‌تی‌تلکام')
@section('web_type', 'Archive' )
@section('web_description', $tag_string )
@section('web_type', 'Archive' )
{{--@section('schema_org')--}}
{{--    @include('web.inc.schema.product_category')--}}
{{--@endsection--}}
@section('content')
    <div class="lists" data-fetch="scroll">
        <div class="lists-pan col-m-12">
{{--            @include('web.inc.breadcrumb.category')--}}
            <div class="aria-clearfix"></div><br>
            <div class="card info hidden">
                <div class="title-ht toolbar">
                    <i class="icn fill" style="background-image: url(/icons/box.svg);"></i>
                    <h1 class="mt-0 text-right">
                        محصولات
                        با برچسب
                        {{ $tag_string }}
                    </h1>
                </div>
                <div class="desc cuntter ">
                    <div class="icon-text nav-link">
                        <ul style="list-style-type: none;">
{{--                            @foreach( $subCategories as $row_sub )--}}
{{--                                <li style="list-style-type: none;" class="box-{{$row_sub->class_name}} ">--}}
{{--                                    <a class="txt bold {{$row_sub->class_name}}" href="products/cat/{{$menu->slug}}/{{$row_sub->slug}}" title="{{$row_sub->title}}">{{$row_sub->title}}</a>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
                        </ul>
                    </div>
                </div>
                <div class="aria-clearfix"></div>
            </div>
            <div class="archive">
                <ul class="products fd category lists grid grid-1 gap-3" data-str="0" data-limit="20">
                    @forelse($products as $row)
                        <li class="product list">
                            <aside class="card de box">
                                <a class="block text-center" href="/shop/{{$row->slug}}" title="{{$row->title}}">
                                    @if($row->publish == 'draft')
                                        <div class="draft"><div class="circ"></div><div class="txt">پیش‌نویس</div></div>
                                    @endif
                                    @if($row->thumb)
                                        <img class="thumb" src="/generated/images/product/300x300/{{ explode(',',$row->thumb)[0] }}.webp" alt="{{$row->title}}" width=300 height=300>
                                    @else
                                        <img class="thumb not-img" src="/assets/lazy/load.jpg" alt="{{$row->title}}" width=300 height=300>
                                    @endif
                                    <div class="p-2">
                                        <div class="my-4">
                                            {{ $row->title }}
                                        </div>
                                    </div>
                                </a>
                            </aside>
                        </li>
                    @empty
                        <li class="no-data">محصولی وجود ندارد.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
    <div class="aria-clearfix" style="height:25px;"></div>
@endsection

