@can('content_view')
<ul class="summery grid grid-1 gap-3">

    <li class="aside-box no-hover col-3 col-d-6">
        <aside class="card box">
            <div class="ico">
                <i class="icn fill" style="background-image: url(/icons/file-check.svg);"></i>
            </div>
            <div class="total">{{ \Morilog\Jalali\CalendarUtils::convertNumbers( number_format (  $stat_publish_post ,0,'',',') ) }}</div>
            <div class="text">تعداد انتشار</div>
        </aside>
    </li>

    <li class="aside-box no-hover col-3 col-d-6">
        <aside class="card box">
            <div class="ico">
                <i class="icn fill" style="background-image: url(/icons/file-x.svg);"></i>
            </div>
            <div class="total">{{ \Morilog\Jalali\CalendarUtils::convertNumbers( number_format ( $stat_draft_post ,0,'',',') ) }}</div>
            <div class="text">تعداد پیش‌نویس</div>
        </aside>
    </li>

    <li class="aside-box no-hover col-3 col-d-6">
        <aside class="card box">
            <div class="ico">
                <i class="icn fill" style="background-image: url(/icons/files.svg);"></i>
            </div>
            <div class="total">{{ \Morilog\Jalali\CalendarUtils::convertNumbers( number_format ( $total_posts ,0,'',',') ) }}</div>
            <div class="text">تعداد مقالات</div>
        </aside>
    </li>

</ul>
@endcan
