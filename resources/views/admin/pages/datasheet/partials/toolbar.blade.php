<div class="toolbars hidden">
    <div class="toolbar">

        <div class="title">
            @isset($datasheet)
                <i class="icn fill" style="background-image: url(/icons/pencil.svg);"></i>
                <h1>ویرایش دیتاشیت "{{ $datasheet->id }}"</h1>
            @else
                @if( URL::current() == route('admin.datasheet.index') )
                    <i class="icn fill" style="background-image: url(/icons/copy.svg);"></i>
                    <h1>دیتاشیتها</h1>
                @else
                    <i class="icn fill" style="background-image: url(/icons/plus-circle.svg);"></i>
                    <h1>دیتاشیت جدید</h1>
                @endif
            @endisset
        </div>

        <div class="buttons">

            <a class="btn btn-success bold" href="{{ route('admin.datasheet.create') }}"><i class="icn white" style="background-image: url(/icons/plus-circle.svg);"></i>دیتاشیت جدید</a>

            @if( URL::current() != route('admin.datasheet.index') )

                @isset($datasheet)
                    <a class="btn btn-update text-white bold" href="{{ '/dl/catalog/' . $datasheet->slug .'.pdf' }}" target="_blank"><i class="icn white" style="background-image: url(/icons/printer.svg);"></i>چاپ</a>
                    @can('sale_delete')
                        @if($datasheet->invoice_type != 'Commerical')
                            <button class="btn btn-danger text-white delete-btn-sql" title="حذف" data-txt="شماره دیتاشیت {{ $datasheet->id }}" data-id="{{ $datasheet->id }}"><i class="icn white" style="background-image: url(/icons/trash-2.svg);"></i>حذف</button>
                            <div class="bt-fr otw hidden"><form class="delete-form-{{ $datasheet->id }}" action="{{ route('admin.datasheet.destroy', $datasheet->id) }}" method="POST">  @csrf @method('DELETE') <input class="hidden" type="text" name="company_id" autocomplete="off" value="{{ $datasheet->company_id }}"><input class="hidden" type="text" name="id" autocomplete="off" value="{{ $datasheet->id }}"></form></div>
                        @endif
                    @endcan
                @else
                    <a class="btn btn-update text-white bold" href="{{ route('admin.datasheet.index') }}"><i class="icn white" style="background-image: url(/icons/copy.svg);"></i>دیتاشیتها</a>
                @endisset

                @if( URL::current() == route('admin.datasheet.create') )
                    <button class="btn btn-warning text-white send bold" type="submit" form="Form_Save"><i class="icn white" style="background-image: url(/icons/save.svg);"></i>ذخیره</button>
                @endif

                @if(isset($datasheet))
                    @if( URL::current() == route('admin.datasheet.edit', $datasheet->id))
                        <button class="btn btn-update text-white bold btn-popup" data-popup="change"><i class="icn white" style="background-image: url(/icons/tornado.svg);"></i>تغییرات</button>
                        <button class="btn btn-warning text-white send bold" type="submit" form="Form_Save"><i class="icn white" style="background-image: url(/icons/save.svg);"></i>ذخیره</button>
                    @endif
                @endif

            @endif

        </div>

        @isset($datasheet)
            @if( URL::current() != route('admin.datasheet.index') )
                <div class="text-toolbar">
                    <div class="txt created_by">نوشته توسط: <span class="bold">{{ $datasheet->user->name }}</span></div>
                </div>
            @endif
        @else
            <div class="text-toolbar">
                <div class="txt created_by">نوشته توسط: <span class="bold">{{ $name }}</span></div>
            </div>
        @endisset

    </div>
</div>
