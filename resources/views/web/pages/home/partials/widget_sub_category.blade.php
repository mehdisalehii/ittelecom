<div class="widget card icon-text links bac-fe-links">

    <div class="header">
        <span class="txt icn" style="background-image: url(/icons/layout-dashboard.svg);">دسته‌بندی‌های محصولات</span>
    </div>

    <div class="box-display grid grid-1 gap-0">
        @php $i_numb_y=1; @endphp
        @foreach($widget_sub_category as $category)
            @foreach($menus as $menu)
                @if ( $category->id_category == $menu->id )
                    <a href="{{$category->slug}}" title="{{$menu->title}}">
                        <div class="thumbnail">
                            @if ( file_exists(storage_path( 'uploads/picture/product' .'/'. $category->thumb )) )
                                <img class="thumb" src="/images/uploads/picture/product/{{$category->thumb}}" alt="{{$menu->title}}" width=100 height=100>
                            @else
                                <img class="thumb not-img" src="/assets/lazy/load.jpg" alt="{{$menu->title}}" width=100 height=100>
                            @endif
                        </div>
                        <div class="txt extra bold">{{$menu->title}}</div>
                    </a>
                @endif
            @endforeach
            @php $i_numb_y++; @endphp
        @endforeach
    </div>

</div>