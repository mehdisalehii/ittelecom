<div class="box first lastnumber">
    <div class="txt">
        <b>شماره سریال فاکتور:</b>
        <span class="lastnum-txt text-red-700 font-extrabold">
            @if(isset($invoice))
                {{ $invoice->order_no }}
            @else
                ٪
            @endif
        </span>  
    </div>
</div>