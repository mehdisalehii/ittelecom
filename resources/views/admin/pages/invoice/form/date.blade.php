<div class="box lastnumber">
    <div class="txt">
        <b>تاریخ صدور:</b>
        <span class="text-red-700 font-extrabold">
            @if(isset($invoice))
                {{ \Morilog\Jalali\CalendarUtils::convertNumbers( jdate($invoice->created_at)->format('%Y/%m/%d') ) }}
            @else
                {{ \Morilog\Jalali\CalendarUtils::convertNumbers( jdate( now() )->format('%Y/%m/%d') ) }}
            @endif
        </span>
    </div>
</div>


@if(isset($invoice))
    @if( URL::current() == route('admin.invoice.edit', $invoice->id))
    <div class="box">
        <div class="txt">
            <b>تاریخ نمایش:</b>
            @if ( $invoice->ordered_at == '0000-00-00 00:00:00' )
            <input type="text" class="date_picker_input w-[128px] text-center cursor-pointer" value="{{ \Morilog\Jalali\CalendarUtils::convertNumbers( jdate($invoice->created_at)->format('%Y/%m/%d') )  }}" autocomplete="off" name="ordered_at">
            @else
            <input type="text" class="date_picker_input w-[128px] text-center cursor-pointer" value="{{ $invoice->ordered_at }}" autocomplete="off" name="ordered_at">
            @endif
        </div>
    </div>
    @endif
@endif
