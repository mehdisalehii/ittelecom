<div class="toolbars hidden">
    <div class="toolbar">

        <div class="title">
            @if(isset($product))
                <i class="icn fill" style="background-image: url(/icons/pencil.svg);"></i>
                <h1>ویرایش محصول "{{ $product->id }}"</h1>
            @else
                @if( URL::current() == route('admin.product.index') )
                    <i class="icn fill" style="background-image: url(/icons/life-buoy.svg);"></i>
                    <h1>لیست محصول‌ها</h1>
                @else
                    <i class="icn fill" style="background-image: url(/icons/plus-circle.svg);"></i>
                    <h1>محصول جدید</h1>
                @endif
            @endif
        </div>

        <div class="buttons">

            @can('content_create')
                <a class="btn btn-success bold" href="{{ route('admin.product.create') }}"><i class="icn white" style="background-image: url(/icons/plus-circle.svg);"></i>محصول جدید</a>
            @endcan

            @if(isset($product))
{{--                @can('admin_view')--}}
{{--                    <button class="btn btn-danger text-white bold delete-btn-sql" title="حذف" data-txt="شماره محصول {{ $product->id }}" data-id="{{ $product->id }}"><i class="icn white" style="background-image: url(/icons/trash-2.svg);"></i>حذف</button>--}}
{{--                    <div class="bt-fr otw hidden"><form class="delete-form-{{ $product->id }}" action="{{ route('admin.product.destroy', $product->id) }}" method="POST">  @csrf @method('DELETE') <input class="hidden" type="text" name="id" autocomplete="off" value="{{ $product->id }}"></form></div>--}}
{{--                @endcan--}}
                <a class="btn btn-update text-white bold" href="{{  'shop' . '/' . $product->slug }}" target="_blank"><i class="icn white" style="background-image: url(/icons/eye.svg);"></i>پیش‌نمایش</a>
            @endif

            @if( URL::current() != route('admin.draft.product') )
                <a class="btn btn-danger text-white bold" href="{{ route('admin.draft.product') }}"><i class="icn white" style="background-image: url(/icons/clipboard-list.svg);"></i>پیشنویس محصولات</a>
            @endif

            @if( URL::current() != route('admin.product.index') )
                <a class="btn btn-update text-white bold" href="{{ route('admin.product.index') }}"><i class="icn white" style="background-image: url(/icons/life-buoy.svg);"></i>لیست محصول‌ها</a>
            @endif

            @if( URL::current() == route('admin.product.create') )
                <button class="btn btn-warning text-white send bold" type="submit" form="Form_Save"><i class="icn white" style="background-image: url(/icons/save.svg);"></i>ذخیره</button>
            @endif
        @if(isset($product))
            @if( URL::current() == route('admin.product.edit', $product->id))
                <button class="btn btn-warning text-white send bold" type="submit" form="Form_Save"><i class="icn white" style="background-image: url(/icons/save.svg);"></i>ذخیره</button>
            @endif
        @endif

        </div>
    </div>
</div>
