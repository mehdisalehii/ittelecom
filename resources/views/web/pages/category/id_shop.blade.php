@extends('layouts.app')
@section('title','لیست، خرید محصولات '. $menu->title)
@section('titleWebname',' | '. 'آی‌تی‌تلکام')
@section('web_type', 'Archive' )
@section('web_amp', URL::current().'/amp' )
@section('web_description', $menu->content )
@section('web_type', 'Archive' )
@section('web_date', $menu->created_at )
@section('schema_org')
@include('web.inc.schema.product_category')
@endsection
@section('content')
<div class="lists" data-fetch="scroll">
    <div class="lists-pan col-m-12">
    @include('web.inc.breadcrumb.category')
        <aside class="card info hidden">
            @php $submenu = '0'; @endphp
            @foreach( cache()->remember('aria.menuAll', 518400, function () { return \App\Models\Menu::orderBy('sort', 'ASC')->get(); }) as $row_sub )
                @if ( $row_sub->parent == $menu->id )
                    @php $submenu = '1'; @endphp
                @endif
            @endforeach
            <div class="@if ($menu->content || $submenu == '1' ) title-ht  @endif toolbar">
                <i class="icn fill" style="background-image: url(/icons/box.svg);"></i>
                <h1 class="mt-0 text-right">محصولات {{$menu->title}}</h1>
            </div>
            <div class="desc cuntter ">
                @if ($menu->content)
                    <p class="paraghraph">
                    {!! $menu->content !!}
                    </p>
                @endif

                <div class="icon-text nav-link">
                    <ul>
                        @foreach( cache()->remember('aria.menuAll', 518400, function () { return \App\Models\Menu::orderBy('sort', 'ASC')->get(); }) as $row_sub )
                            @if( $row_sub->class_name != 'display-none' )
                                @if ( $row_sub->parent == $menu->id )
                                    <li class="box-{{$row_sub->class_name}} ">
                                        <a class="txt bold {{$row_sub->class_name}}" href="products/cat/{{$menu->slug}}/{{$row_sub->slug}}" title="{{$row_sub->title}}">{{$row_sub->title}}</a>
                                    </li>
                                @endif
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>


        </aside>
        <div class="archive">
            <ul class="products fd category lists grid grid-1 gap-3" data-str="0" data-limit="20" data-id="{{$cat_id}}" data-slug="{{$last_url}}">
            {{-- @foreach ($products_id as $id)
            id-{{ $id->no_id }} : mrnu-{{ $id->menu_ids }} <br>
            @endforeach --}}
            @foreach ($products_id as $id)
                @forelse($archive_cat_products as $row)
                    @if ( $id->no_id == $row->id )
                    <li class="product list">
                        <aside class="card de box">
                            <a class="block text-center" href="/shop/{{$row->slug}}" title="{{$row->title}}">
                                @if($row->publish == 'draft')
                                    <div class="draft"><div class="circ"></div><div class="txt">پیش‌نویس</div></div>
                                @endif
                                @if($row->thumb)
                                @foreach( explode(',',$row->thumb) as $thumb => $val)
                                    @if($thumb == 0)
                                        <img class="thumb" src="/generated/images/product/300x300/{{$val}}.webp" alt="{{$row->title}}" width=300 height=300>
                                    @endif
                                @endforeach
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
                    @endif
                @empty
                    <li class="no-data">محصولی وجود ندارد.</li>
                @endforelse
            @endforeach
            </ul>
        </div>
        {{-- @php $i_er=1; @endphp
        @forelse($archive_cat_products as $row)
            @if ($i_er < 2)
            @if ($menu->content_bottom)
            <aside class="card det-bottom hidden">
                <div class="@if ($menu->content || $submenu == '1' ) title-ht  @endif toolbar">
                    <i class="icn fill" style="background-image: url(/icons/box.svg);"></i>
                    <div class="h1 bold">محصولات {{$menu->title}}</div>
                </div>
                @if ($menu->content_bottom)
                    <div class="desc cuntter ">
                        <span class="paraghraph">
                        {!!$menu->content_bottom!!}
                        </span>
                        <button class="btn-link more">(ادامه‌ی متن)</button>
                    </div>
                @endif
            </aside>
            @else
                @if ($menu->content)
                    <aside class="card det-bottom hidden">
                        <div class="@if ($menu->content || $submenu == '1' ) title-ht  @endif toolbar">
                            <i class="icn fill" style="background-image: url(/icons/box.svg);"></i>
                            <div class="h1 bold">محصولات {{$menu->title}}</div>
                        </div>
                        <div class="desc cuntter ">
                            <span class="paraghraph">
                            {!!$menu->content!!}
                            </span>
                            <button class="btn-link more">(ادامه‌ی متن)</button>
                        </div>
                    </aside>
                @endif
            @endif
            @endif
            @php $i_er++; @endphp
        @empty
        @endforelse --}}
    </div>
</div>
@endsection
