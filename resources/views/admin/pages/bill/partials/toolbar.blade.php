<div class="toolbars hidden">
    <div class="toolbar">

        <div class="title">
            @isset($bill)
                <i class="icn fill" style="background-image: url(/icons/pencil.svg);"></i>
                <h1>ویرایش حواله‌ "{{ $bill->order_no }}"</h1>
            @else
                @if( URL::current() == route('admin.bill.index').'/lists/commerical' )
                    <i class="icn fill" style="background-image: url(/icons/award.svg);"></i>
                    <h1>حواله‌ رسمی</h1>
                @elseif( URL::current() == route('admin.bill.index').'/lists/sale' )
                    <i class="icn fill" style="background-image: url(/icons/verified.svg);"></i>
                    <h1>حواله‌ فروش</h1>
                @elseif( URL::current() == route('admin.bill.index').'/lists/beforebill' )
                    <i class="icn fill" style="background-image: url(/icons/check-circle-2.svg);"></i>
                    <h1>پیش حواله‌</h1>
                @elseif( URL::current() == route('admin.bill.index').'/lists/beforecommerical' )
                    <i class="icn fill" style="background-image: url(/icons/check-circle-2.svg);"></i>
                    <h1>پیش حواله‌ رسمی</h1>
                @elseif( URL::current() == route('admin.bill.index') )
                    <i class="icn fill" style="background-image: url(/icons/copy.svg);"></i>
                    <h1>حواله‌ها</h1>
                @else
                    <i class="icn fill" style="background-image: url(/icons/plus-circle.svg);"></i>
                    <h1>حواله‌ جدید</h1>
                @endif
            @endisset
        </div>

        <div class="buttons">

            @can('sale_create')
                <a class="btn btn-success bold" href="{{ route('admin.bill.create') }}"><i class="icn white" style="background-image: url(/icons/plus-circle.svg);"></i>حواله‌ جدید</a>
            @endcan

            @if( URL::current() != route('admin.bill.index') )

            @isset($bill)
                @can('sale_view')
                    <a class="btn btn-update text-white bold" href="{{ '/bill/' . $bill->order_no .'-'. $bill->hash .'.pdf' }}" target="_blank"><i class="icn white" style="background-image: url(/icons/printer.svg);"></i>چاپ</a>
                @endcan
                @can('sale_delete')
                    @if($bill->bill_type != 'Commerical')
                        <button class="btn btn-danger text-white delete-btn-sql" title="حذف" data-txt="شماره حواله‌ {{ $bill->order_no }}" data-id="{{ $bill->id }}"><i class="icn white" style="background-image: url(/icons/trash-2.svg);"></i>حذف</button>
                        <div class="bt-fr otw hidden"><form class="delete-form-{{ $bill->id }}" action="{{ route('admin.bill.destroy', $bill->id) }}" method="POST">  @csrf @method('DELETE') <input class="hidden" type="text" name="company_id" autocomplete="off" value="{{ $bill->company_id }}"><input class="hidden" type="text" name="order_no" autocomplete="off" value="{{ $bill->order_no }}"></form></div>
                    @endif
                @endcan
            @endif
                <a class="btn btn-update text-white bold" href="{{ route('admin.bill.index') }}"><i class="icn white" style="background-image: url(/icons/copy.svg);"></i>حواله‌ها</a>
            @endisset


            {{-- @if( URL::current() == route('admin.bill.index').'/lists/commerical' || URL::current() == route('admin.bill.index').'/lists/sale' || URL::current() == route('admin.bill.index').'/lists/beforebill' )
                <a class="btn btn-danger text-white bold" href="{{ route('admin.bill.index') }}/lists/beforebill"><i class="icn white" style="background-image: url(/icons/check-circle-2.svg);"></i>پیش حواله‌ها</a>
                <a class="btn btn-danger text-white bold" href="{{ route('admin.bill.index') }}/lists/sale"><i class="icn white" style="background-image: url(/icons/verified.svg);"></i>حواله‌های فروش</a>
                <a class="btn btn-danger text-white bold" href="{{ route('admin.bill.index') }}/lists/commerical"><i class="icn white" style="background-image: url(/icons/award.svg);"></i>حواله‌های رسمی</a>
            @endif --}}

            @if( URL::current() == route('admin.bill.create') )
                <button class="btn btn-warning text-white send bold" type="submit" form="Form_Save"><i class="icn white" style="background-image: url(/icons/save.svg);"></i>ذخیره</button>
            @endif

            @if(isset($bill))
                @if( URL::current() == route('admin.bill.edit', $bill->id))
                    <button class="btn btn-warning text-white send bold" type="submit" form="Form_Save"><i class="icn white" style="background-image: url(/icons/save.svg);"></i>ذخیره</button>
                @endif
            @endif

        </div>

        {{-- @isset($users)
            @if( URL::current() != route('admin.bill.index') )
                <div class="text-toolbar">
                    <div class="txt created_by">صادرکننده: <span class="bold">{{ $bill->user->name }}</span></div>
                </div>
            @endif
        @else
            <div class="text-toolbar">
                <div class="txt created_by">صادرکننده: <span class="bold">{{ $name }}</span></div>
            </div>
        @endisset --}}

        @isset($users)
            @if( URL::current() != route('admin.bill.index') )
                @foreach($users as $row_user)
                    @isset($bill)
                        @if($bill->user_id == $row_user->id)
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
