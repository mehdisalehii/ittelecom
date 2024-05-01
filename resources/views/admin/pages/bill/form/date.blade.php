<div class="box lastnumber">
    <div class="txt">
        <b>تاریخ صدور:</b>
        <span class="text-red-700 font-extrabold">
            @if(isset($bill))
                {{ \Morilog\Jalali\CalendarUtils::convertNumbers( jdate($bill->created_at)->format('%Y/%m/%d') ) }}
            @else
                {{ \Morilog\Jalali\CalendarUtils::convertNumbers( jdate( now() )->format('%Y/%m/%d') ) }}
            @endif
        </span>
    </div>
</div>


@if(isset($bill))
    @if( URL::current() == route('admin.bill.edit', $bill->id))
    <div class="box">
        <div class="txt">
            <b>تاریخ نمایش:</b>
            @if ( $bill->ordered_at == '0000-00-00 00:00:00' )
            <input type="text" class="date_picker_input w-[128px] text-center cursor-pointer" value="{{ \Morilog\Jalali\CalendarUtils::convertNumbers( jdate($bill->created_at)->format('%Y/%m/%d') )  }}" autocomplete="off" name="ordered_at">
            @else
            <input type="text" class="date_picker_input w-[128px] text-center cursor-pointer" value="{{ $bill->ordered_at }}" autocomplete="off" name="ordered_at">
            @endif
        </div>
    </div>
    @endif
@endif
