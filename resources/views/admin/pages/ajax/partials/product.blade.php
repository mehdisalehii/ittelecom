@if ($url_fetch == 'product' )
    @foreach($products as $row)
        <li class="product list">
            <aside class="card er box">
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
                        @if($row->thumb && is_array(explode(',',$row->thumb)))
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

                @can('content_view')
                    <div class="option">
                    @can('content_edit')
                        <a href="/admin/product/{{$row->id}}/edit" title="ویرایش" class="green block col-6">
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
    @endforeach
@endif

@if ($url_fetch == 'product/draft' )
    @foreach($products as $row)
        <li class="product list">
            <aside class="card box">
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
                    @if($row->thumb && is_array(explode(',',$row->thumb)))
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
    @endforeach
@endif
