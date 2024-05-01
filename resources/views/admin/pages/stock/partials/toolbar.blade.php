<div class="toolbars hidden">
    <div class="toolbar">

        <div class="title">
            @if(isset($stock))
                <i class="icn fill" style="background-image: url(/icons/pencil.svg);"></i>
                <h1>ویرایش کالا "{{ $stock->title }}"</h1>
            @else
                @if( URL::current() == route('admin.stock.index') )
                    <i class="icn fill" style="background-image: url(/icons/database.svg);"></i>
                    <h1>موجودی کالا (انبار)</h1>
                @else
                    <i class="icn fill" style="background-image: url(/icons/plus-circle.svg);"></i>
                    <h1>کالای جدید</h1>
                @endif
            @endif
        </div>

        <div class="buttons">

            @can('sale_create')
                <a class="btn btn-success bold" href="{{ route('admin.stock.create') }}"><i class="icn white" style="background-image: url(/icons/plus-circle.svg);"></i>کالای جدید</a>
            @endcan

            @if( URL::current() != route('admin.stock.index') )
                <a class="btn btn-update text-white bold" href="{{ route('admin.stock.index') }}"><i class="icn white" style="background-image: url(/icons/list.svg);"></i>موجودی کالا (انبار)</a>
                <button class="btn btn-warning text-white send bold" type="submit" form="Form_Save"><i class="icn white" style="background-image: url(/icons/save.svg);"></i>ذخیره</button>
            @endif

        </div>         
    </div>         
</div>