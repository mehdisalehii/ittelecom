@can('sale_view')
<ul class="summery grid grid-1 gap-3">
    <li>
        <aside class="card box">
            <div class="ico">
                <i class="icn block fill" style="background-image:url('/icons/file-output.svg');"></i>
            </div>
            <div class="total">{{count(\App\Models\Bill::select('id')->get())}}</div>
            <div class="text">تعداد حواله خروج از انبار</div>
        </aside>
    </li>
</ul>
@endcan