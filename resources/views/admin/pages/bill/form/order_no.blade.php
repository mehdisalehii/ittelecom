<div class="box first lastnumber">
    <div class="txt">
        <b>شماره سریال حواله‌:</b>
        <span class="lastnum-txt text-red-700 font-extrabold">
            @if(isset($bill))
                {{ $bill->order_no }}
            @else
                {{ $last_number }}
            @endif
        </span>  
    </div>
</div>
<input value="{{isset($bill) ? $bill->order_no : $last_number }}" name="order_no" type="hidden" >