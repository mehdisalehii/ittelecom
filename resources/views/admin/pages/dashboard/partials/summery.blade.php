<ul class="summery grid grid-1 gap-3">

@can('content_view')
    <li class="aside-box col-3 col-d-6">
        <aside class="card box">
            <div class="ico">
                <i class="icn fill" style="background-image: url(/icons/book-open.svg);"></i>
            </div>
            <div class="total">{{ \Morilog\Jalali\CalendarUtils::convertNumbers( number_format ( $total_posts ,0,'',',') ) }}</div>
            <div class="text">
                <a href="admin/post">مقالات</a>
            </div>
            @can('content_create')
            <div class="plus add">
                <a href="admin/post/create" title="افزودن مقاله"><i class="icn"></i></a>
            </div>
            @endcan
        </aside>
    </li>
@endcan
@can('widget_view')
    <li class="aside-box col-3 col-d-6">
        <aside class="card box">
            <div class="ico">
                <i class="icn fill" style="background-image: url(/icons/package-check.svg);"></i>
            </div>
            <div class="total">{{ \Morilog\Jalali\CalendarUtils::convertNumbers( number_format ( $total_products ,0,'',',') ) }}</div>
            <div class="text">
                <a href="admin/product">محصولات</a>
            </div>
            @can('content_create')
            <div class="plus add">
                <a href="admin/product/create" title="افزودن محصول"><i class="icn"></i></a>
            </div>
            @endcan
        </aside>
    </li>
@endcan

@can('sale_view')
    <li class="aside-box col-3 col-d-6">
        <aside class="card box">
            <div class="ico">
                <i class="icn fill" style="background-image: url(/icons/clipboard-list.svg);"></i>
            </div>
            <div class="total">{{ \Morilog\Jalali\CalendarUtils::convertNumbers( number_format ( $total_invoices ,0,'',',') ) }}</div>
            <div class="text">
                <a href="admin/invoice">فاکتورها</a>
            </div>
            @can('sale_create')
            <div class="plus add">
                <a href="admin/invoice/create" title="افزودن فاکتور"><i class="icn"></i></a>
            </div>
            @endcan
        </aside>
    </li>
@endcan

@can('admin_view')
    <li class="aside-box col-3 col-d-6">
        <aside class="card box">
            <div class="ico">
                <i class="icn fill" style="background-image: url(/icons/users.svg);"></i>
            </div>
            <div class="total">{{ \Morilog\Jalali\CalendarUtils::convertNumbers( number_format ( $total_users ,0,'',',') ) }}</div>
            <div class="text">
                <a href="{{ route('admin.users.index') }}">کاربران</a>
            </div>
            @can('admin_panel')
            <div class="plus add">
                <a href="admin/users/create" title="افزودن کاربر"><i class="icn"></i></a>
            </div>
            @endcan
        </aside>
    </li>
@endcan

@can('sale_view')
    <li class="aside-box col-3 col-d-6">
        <aside class="card box">
            <div class="ico">
                <i class="icn fill" style="background-image: url(/icons/database.svg);"></i>
            </div>
            <div class="total">{{ \Morilog\Jalali\CalendarUtils::convertNumbers( number_format ( $sum_stock ,0,'',',') ) }}</div>
            <div class="text">
                <a href="admin/stock">موجودی کالا (انبار)</a>
            </div>
            @can('sale_create')
            <div class="plus add">
                <a href="admin/stock/create" title="افزودن کالا"><i class="icn"></i></a>
            </div>
            @endcan
        </aside>
    </li>
@endcan

@can('admin_view')
    <li class="aside-box col-3 col-d-6">
        <aside class="card box">
            <div class="ico">
                <i class="icn fill" style="background-image: url(/icons/refresh-ccw.svg);"></i>
            </div>
            <div class="total">{{ \Morilog\Jalali\CalendarUtils::convertNumbers( number_format ( $total_bills ,0,'',',') ) }}</div>
            <div class="text">
                <a href="admin/bill">حواله خروج کالا</a>
            </div>
            @can('sale_create')
            <div class="plus add">
                <a href="admin/bill/create" title="افزودن حواله"><i class="icn"></i></a>
            </div>
            @endcan
        </aside>
    </li>
@endcan

</ul>
