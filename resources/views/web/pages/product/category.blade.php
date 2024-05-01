@extends('layouts.app')

@section('title','دسته‌بندی محصولات')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@section('web_type', 'Shop' )
@section('web_amp', route('home').'/shop/amp' )

@section('content')
<div class="lists">
    <div class="lists-pan col-m-12">
    {{-- @include('web.inc.breadcrumb.shop') --}}
        {{-- <aside class="card hidden toolbar">
            <i class="icn fill" style="background-image: url(/icons/box.svg);"></i>
            <h1 class="text-right">دسته‌بندی محصولات</h1>
            @can('content_create')
            <div class="content-admin">
                <a class="btn btn-success" href="{{ route('admin.product.create') }}"><i class="icn block white" style="background-image:url('/icons/plus-circle.svg');"></i>محصول جدید</a>
                <a class="btn btn-danger" href="{{ route('admin.draft.product') }}"><i class="icn block white" style="background-image:url('/icons/list.svg');"></i>پیش‌نویس محصولات</a>
            </div>
            @endcan
        </aside> --}}
        <div class="archive">

            <div class="all-category-wrap">

                <ul class="sticky-top grid grid-1 gap-0">
                    @foreach( cache()->remember('aria.menuWhereTypeIsProductAndParentIsZero', 518400, function () { return \App\Models\Menu::orderBy('sort', 'ASC')->where('type','=','product')->where('parent','=','0')->get(); }) as $row_main )
                    <li class="menu-nav ">
                        <a class="bold" href="products/cat/{{$row_main->slug}}" title="{{$row_main->title}}" itemprop="url">
                            <i class="icn" style="background-image:url(/assets/menu/{{$row_main->thumb}})"></i>
                            <div class="txt">{{$row_main->title}}</div>
                            <div class="arrow"><i class="icn block menu" style="background-image:url('/icons/chevron-left.svg');"></i></div>
                        </a>
                    </li>
                    @endforeach
                </ul>

                <ul class="sticky-bottom">
                    @foreach( cache()->remember('aria.menuWhereTypeIsProductAndParentIsZero', 518400, function () { return \App\Models\Menu::orderBy('sort', 'ASC')->where('type','=','product')->where('parent','=','0')->get(); }) as $row_main )
                    <li class="main">
                        <a class="bold link-title" href="products/cat/{{$row_main->slug}}" title="{{$row_main->title}}" itemprop="url">
                            {{-- <i class="icn" style="background-image:url(/assets/menu/{{$row_main->thumb}})"></i> --}}
                            <div class="txt">{{$row_main->title}}</div>
                            {{-- <div class="arrow"><i class="icn block menu" style="background-image:url('/icons/chevron-left.svg');"></i></div> --}}
                        </a>
                        <div class="menu-content col-large grid grid-1 gap-0 type-{{$row_main->type}}">
                            @foreach( cache()->remember('aria.menuAll', 518400, function () { return \App\Models\Menu::orderBy('sort', 'ASC')->get(); }) as $row_sub )
                                @if ( $row_sub->parent == $row_main->id )
                                    <div class="ul nav-content col-large {{--$row_sub->class_name--}} type-{{$row_sub->type}}">
                                        <a class="link-title-extra {{$row_sub->class_name ? $row_sub->class_name : ' '}} type-{{$row_sub->type}}" href="products/cat/{{$row_main->slug}}/{{$row_sub->slug}}" title="{{$row_sub->title}}" itemprop="url">{{$row_sub->title}}
                                            {{-- <i class="icn block submenu" style="background-image:url('/icons/chevron-left.svg');"></i> --}}
                                        </a>
                                        <div class="li">
                                            @php $parent_sub = $row_sub->id; @endphp
                                            @foreach( cache()->remember('aria.menuAll', 518400, function () { return \App\Models\Menu::orderBy('sort', 'ASC')->get(); }) as $row_child )
                                                @if ( $row_child->parent == $parent_sub )
                                                    <a class="link-title-ery {{$row_child->class_name}} type-{{$row_child->type}}" href="products/cat/{{$row_main->slug}}/{{$row_sub->slug}}/{{$row_child->slug}}" title="{{$row_child->title}}" itemprop="url">{{$row_child->title}}</a>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            @endforeach


                            </div>
                    </li>
                    @endforeach
                </ul>

            </div>

        </div>
    </div>
</div>
@endsection
