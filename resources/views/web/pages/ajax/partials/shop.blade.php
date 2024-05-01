@if (Request()->url_fetch == 'shop' )
    @foreach($products as $row)
        <li class="product list">
            <aside class="card ds box">
                <a  href="/shop/{{$row->slug}}" title="{{$row->title}}">
                    @if($row->publish == 'draft')
                        <div class="draft"><div class="circ"></div><div class="txt">پیش‌نویس</div></div>
                    @endif

                    @if($row->thumb)
                    @foreach( explode(',',$row->thumb) as $thumb => $val)
                        @if($thumb == 0)
                            @if ( file_exists(storage_path( 'uploads/picture/product' .'/'. $val .'.jpg' )) )
                                <img class="thumb" src="/images/uploads/picture/product/{{$val}}.jpg" alt="{{$row->title}}" width=300 height=300>
                            @else
                                <img class="thumb not-img" src="/assets/lazy/load.jpg" alt="{{$row->title}}" width=300 height=300>
                            @endif
                        @endif
                    @endforeach
                    @else
                        <img class="thumb not-img" src="/assets/lazy/load.jpg" alt="{{$row->title}}" width=300 height=300>
                    @endif
                    <div class="txt">{{ \Illuminate\Support\Str::limit( strip_tags( str_replace('   ','',$row->title)) ,50) }}</div>
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
