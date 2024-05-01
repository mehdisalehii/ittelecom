<ul class="summery grid grid-1 gap-3">

    <li class="aside-box no-hover col-3 col-d-6">
        <aside class="card box">
            <div class="ico">
                <i class="icn fill" style="background-image: url(/icons/file-plus-2.svg);"></i>
            </div>
            <div class="total">{{ \Morilog\Jalali\CalendarUtils::convertNumbers( number_format ( $sum_stock ,0,'',',') ) }}</div>
            <div class="text">جمع موجودی کالاها</div>
        </aside>
    </li>
    
    <li class="aside-box no-hover col-3 col-d-6">
        <aside class="card box">
            <div class="ico">
                <i class="icn fill" style="background-image: url(/icons/file-input.svg);"></i>
            </div>
            <div class="total">{{ \Morilog\Jalali\CalendarUtils::convertNumbers( number_format ( $total_stock ,0,'',',') ) }}</div>
            <div class="text">تعداد کالاها</div>
        </aside>
    </li>

</ul>