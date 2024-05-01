<li class="display-flex header">
    <div class="col-1">تاریخ</div>
    <div class="col-1">آی پی</div>
    <div class="col-1">کشور</div>
</li>

@foreach ($stats as $row)
<li class="content-ma display-flex lid">
    <div class="col-1">{{ \Morilog\Jalali\CalendarUtils::convertNumbers(jdate($row->created_at)->format('%H:%S - %Y/%m/%d')) }}</div>
    <div class="col-1"><a href="admin/stat/ip/{{ $row->ip }}">{{ $row->ip }}</a></div>
    <div class="col-1">{!! $row->country ? $row->country : '<a href="admin/stat/ip/'. $row->ip .'">مشخص نشده</a>' !!}</div>
</li>
@endforeach