<div class="toolbars hidden">
    <div class="toolbar">

        <div class="title">
            @isset($invoice)
                <i class="icn fill" style="background-image: url(/icons/pencil.svg);"></i>
                <h1>ویرایش فاکتور "{{ $invoice->order_no }}"</h1>
            @else
                @if( URL::current() == route('admin.invoice.index').'/lists/commerical' )
                    <i class="icn fill" style="background-image: url(/icons/award.svg);"></i>
                    <h1>فاکتور رسمی</h1>
                @elseif( URL::current() == route('admin.invoice.index').'/lists/sale' )
                    <i class="icn fill" style="background-image: url(/icons/verified.svg);"></i>
                    <h1>فاکتور فروش</h1>
                @elseif( URL::current() == route('admin.invoice.index').'/lists/beforeinvoice' )
                    <i class="icn fill" style="background-image: url(/icons/check-circle-2.svg);"></i>
                    <h1>پیش‌فاکتور</h1>
                @elseif( URL::current() == route('admin.invoice.index').'/lists/beforecommerical' )
                    <i class="icn fill" style="background-image: url(/icons/check-circle-2.svg);"></i>
                    <h1>پیش‌فاکتور رسمی</h1>
                @elseif( URL::current() == route('admin.invoice.index') )
                    <i class="icn fill" style="background-image: url(/icons/copy.svg);"></i>
                    <h1>فاکتورها</h1>
                @else
                    <i class="icn fill" style="background-image: url(/icons/plus-circle.svg);"></i>
                    <h1>فاکتور جدید</h1>
                @endif
            @endisset
        </div>

        <div class="buttons">

            @can('sale_create')
                <a class="btn btn-success bold" href="{{ route('admin.invoice.create') }}"><i class="icn white" style="background-image: url(/icons/plus-circle.svg);"></i>فاکتور جدید</a>
            @endcan

{{--            @can('admin_view')--}}
{{--                <a class="btn btn-update text-white bold" href="{{ route('admin.company.index') }}"><i class="icn white" style="background-image: url(/icons/gem.svg);"></i>شرکت‌ها</a>--}}
{{--                <a class="btn btn-danger text-white bold" href="admin/pages/export"><i class="icn white" style="background-image: url(/icons/database.svg);"></i>خروجی داده‌ها</a>--}}
{{--            @endcan--}}

            @if( URL::current() != route('admin.invoice.index') )

            @isset($invoice)
                @can('sale_view')
                    @php
                        $orientation = '';
                        if($invoice->invoice_type == 'Commerical') {
                            $orientation = 'r';
                        }elseif($invoice->invoice_type == 'BeforeCommerical') {
                            $orientation = 'w';
                        }elseif($invoice->invoice_type == 'BeforeInvoice') {
                            $orientation = 'p';
                        }elseif($invoice->invoice_type == 'Sale') {
                            $orientation = 's';
                        }
                    @endphp
                    <a class="btn btn-update text-white bold" href="{{ '/invoice/' . $invoice->order_no .'/'. $orientation .'/'. $invoice->hash .'.pdf' }}" target="_blank"><i class="icn white" style="background-image: url(/icons/printer.svg);"></i>چاپ</a>
                @endcan
{{--                @can('sale_delete')--}}
{{--                    @if($invoice->invoice_type != 'Commerical')--}}
{{--                        <button class="btn btn-danger text-white delete-btn-sql" title="حذف" data-txt="شماره فاکتور {{ $invoice->order_no }}" data-id="{{ $invoice->id }}"><i class="icn white" style="background-image: url(/icons/trash-2.svg);"></i>حذف</button>--}}
{{--                        <div class="bt-fr otw hidden"><form class="delete-form-{{ $invoice->id }}" action="{{ route('admin.invoice.destroy', $invoice->id) }}" method="POST">  @csrf @method('DELETE') <input class="hidden" type="text" name="company_id" autocomplete="off" value="{{ $invoice->company_id }}"><input class="hidden" type="text" name="order_no" autocomplete="off" value="{{ $invoice->order_no }}"></form></div>--}}
{{--                    @endif--}}
{{--                @endcan--}}
            @endif
                <a class="btn btn-update text-white bold" href="{{ route('admin.invoice.index') }}"><i class="icn white" style="background-image: url(/icons/copy.svg);"></i>فاکتورها</a>
            @endisset


            {{-- @if( URL::current() == route('admin.invoice.index').'/lists/commerical' || URL::current() == route('admin.invoice.index').'/lists/sale' || URL::current() == route('admin.invoice.index').'/lists/beforeinvoice' )
                <a class="btn btn-danger text-white bold" href="{{ route('admin.invoice.index') }}/lists/beforeinvoice"><i class="icn white" style="background-image: url(/icons/check-circle-2.svg);"></i>پیش‌فاکتورها</a>
                <a class="btn btn-danger text-white bold" href="{{ route('admin.invoice.index') }}/lists/sale"><i class="icn white" style="background-image: url(/icons/verified.svg);"></i>فاکتورهای فروش</a>
                <a class="btn btn-danger text-white bold" href="{{ route('admin.invoice.index') }}/lists/commerical"><i class="icn white" style="background-image: url(/icons/award.svg);"></i>فاکتورهای رسمی</a>
            @endif --}}

            @if( URL::current() == route('admin.invoice.create') )
                <button class="btn btn-warning text-white send bold" type="submit" form="Form_Save"><i class="icn white" style="background-image: url(/icons/save.svg);"></i>ذخیره</button>
            @endif

            @if(isset($invoice))
                @if( URL::current() == route('admin.invoice.edit', $invoice->id))
                    <button class="btn btn-warning text-white send bold" type="submit" form="Form_Save"><i class="icn white" style="background-image: url(/icons/save.svg);"></i>ذخیره</button>
                @endif
            @endif

        </div>
        @isset($users)
            @if( URL::current() != route('admin.invoice.index') )
                @foreach($users as $row_user)
                    @isset($invoice)
                        @if($invoice->created_by == $row_user->id)
                        <div class="text-toolbar">
                            <div class="txt created_by">صدور توسط: <span class="bold">{{ $row_user->name ? $row_user->name : $row_user->username }}</span></div>
                        </div>
                        @endif
                    @endisset
                @endforeach
            @endif
        @else
            <div class="text-toolbar">
                <div class="txt created_by">صادرکننده: <span class="bold">{{ $name }}</span></div>
            </div>
        @endisset

    </div>
</div>
