@foreach($products as $row)
<li class="product list">
    <aside class="card ds box">
        <a
            @if($row->publish == 'draft')
                href="javascript:void(0);"
            @else
                href="/shop/{{ $row->slug }}"
            @endif
            class="block" title="{{$row->title}}">
            @if($row->publish == 'draft')
                    <div class="draft"><div class="circ"></div><div class="txt">پیش‌نویس</div></div>
            @endif
            @if($row->thumb)
            @foreach( explode(',',$row->thumb) as $thumb => $val)
                @if($thumb == 0)
                <img class="thumb" src="/images/uploads/picture/product/{{$val}}.jpg" alt="{{$row->title}}" width=300 height=300>
                @endif
            @endforeach
            @else
                <img class="thumb not-img" src="/assets/lazy/load.jpg"  alt="{{$row->title}}" width=300 height=300>
            @endif
            <div class="txt">{{$row->title}}</div>
        </a>

        @include('admin.pages.product.partials.option_list')

    </aside>
</li>
@endforeach
