<li class="section list">
    @can('sale_view')
    <label class="section-title" data-id="#3">مدیریت مالی</label>
    @endcan
    <ul id="3" class="section-content">
        @can('sale_view')
            <li class="list invoice">
                <a href="{{ route('admin.invoice.index') }}" class="extra {{ Route::is('admin.invoice.index')  || Route::is('admin.invoice.edit') ? 'active' : '' }} ">
                    <i class="icn block white" style="background-image:url('/icons/clipboard-list.svg');"></i>
                    فاکتورها
                </a>
            </li>
        @endcan
        @can('sale_view')
            <li class="list"><a class="extra" href="{{ route('admin.bill.index') }}"><i class="icn block white" style="background-image:url('/icons/refresh-ccw.svg');"></i>حواله خروج کالا</a></li>
        @endcan
{{--        @can('developer_view')--}}
{{--            <li class="list"><a class="extra" href="{{ route('admin.automation.index') }}"><i class="icn block white" style="background-image:url('/icons/file-text.svg');"></i>اتوماسیون فروش</a></li>--}}
{{--            --}}{{--<li class="list"><a class="extra" href="admin/pages/cart"><i class="icn block white" style="background-image:url('/icons/shopping-cart.svg');"></i>سبد خرید مشتریان</a>...</li>--}}
{{--        @endcan--}}
        @can('sale_view')
            <li class="list"><a class="extra" href="admin/stock"><i class="icn block white" style="background-image:url('/icons/database.svg');"></i>انبار - موجودی کالا</a></li>
        @endcan
    </ul>
</li>
