@extends('layouts.app')
@section('title','لیست، خرید محصولات '. $menu->title)
@section('titleWebname',' | '. 'آی‌تی‌تلکام')
@section('web_type', 'Archive' )
@section('web_description', $menu->short_description ?? mb_substr( strip_tags( str_replace('   ','',$menu->content)) ,0,250, "utf-8") )
@section('web_type', 'Archive' )
@section('web_date', $menu->created_at )
@section('schema_org')
@include('web.inc.schema.product_category')
@endsection
@section('content')
<div class="lists" data-fetch="scroll">
    <div class="lists-pan col-m-12">
    @include('web.inc.breadcrumb.category')
        <div class="card info hidden">
            <div class="title-ht toolbar">
                <i class="icn fill" style="background-image: url(/icons/box.svg);"></i>
                <h1 class="mt-0 text-right">
                    محصولات
                    {{$menu->title}}
                </h1>
            </div>
            <div class="desc cuntter ">
                {!! nl2br($menu->content) !!}

                <div class="icon-text nav-link">
                    <ul style="list-style-type: none;">
                        @foreach( $subCategories as $row_sub )
                            <li style="list-style-type: none;" class="box-{{$row_sub->class_name}} ">
                                <a class="txt bold {{$row_sub->class_name}}" href="products/cat/{{$menu->slug}}/{{$row_sub->slug}}" title="{{$row_sub->title}}">{{$row_sub->title}}</a>
                            </li>
                        @endforeach
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
                            @can('content_view')
                                <div class="option">
                                @can('content_edit')
                                    <a href="/admin/product/{{$row->id}}/edit" title="ویرایش" class="green block">
                                        <i class="icn fill" style="background-image: url(/icons/pencil.svg);"></i>
                                    </a>
                                @endcan
                                @can('content_delete')
                                    <button class="btn-grid-ert last block delete-btn-sql" title="حذف" data-txt="شماره محصول {{ $row->id }}" data-id="{{ $row->id }}"><i class="icn fill" style="background-image: url(/icons/trash-2.svg);"></i></button>
                                    <div class="bt-fr otw"><form class="delete-form-{{ $row->id }} hidden" action="{{ route('admin.product.destroy', $row->id) }}" method="POST">  @csrf @method('DELETE') <input class="hidden" type="text" name="id" autocomplete="off" value="{{ $row->id }}"></form></div>
                                @endcan
                                </div>
                            @endcan
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
@if(!empty($menu->content_bottom))
<div>
    <div class="card info p-2">
        <div class="desc cuntter">
            <h2 class="mt-0 mb-3 text-right" style="margin-bottom:1rem; margin-top: 1rem;">
                {{$menu->title}}
            </h2>
            {!! nl2br($menu->content_bottom) !!}
        </div>
        <div class="aria-clearfix"></div>
    </div>
</div>
@endif
@if($menu->faqs()->count() > 0)
    @php
        $all_faqs_for_this_category = $menu->faqs()->get();
    @endphp
    <div id="accordionITTelecom">
        <h2>سؤالات پرتکرار:</h2><br />
            @foreach($all_faqs_for_this_category as $q)
            <div class="card info p-2">
                <div class="">
                    <h5 id="faq-heading-{{ $loop->index }}">
                        <button
                                class="group relative flex w-full items-center rounded-t-[15px] border-0 bg-white px-5 py-4 text-left text-base text-neutral-800 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none dark:bg-neutral-800 dark:text-white"
                                type="button"
                                data-te-collapse-init
                                data-te-target="#faq-collapse-{{ $loop->index }}"
                                aria-expanded="false"
                                aria-controls="faq-collapse-{{ $loop->index }}">
                            {{$q->subject}}
                            <span
                                    style="margin-right:10px;"
                                    class="h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-blue-300 dark:group-[[data-te-collapse-collapsed]]:fill-white">
                                <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        class="h-6 w-6">
                                <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </span>
                        </button>
                    </h5>
                    <div
                            id="faq-collapse-{{ $loop->index }}"
                            class="!visible hidden"
                            data-te-collapse-item
                            data-te-collapse-collapsed
                            aria-labelledby="faq-heading-{{ $loop->index }}"
                            data-te-parent="#accordionITTelecom"
                    >
                        <p style="padding-left: 20px; padding-right: 20px; padding-bottom: 20px;" class="paraghraph">{{$q->body}}</p>
                    </div>
                </div>
                <div class="aria-clearfix"></div>
            </div>
            @endforeach
    </div>
@endif
@endsection

