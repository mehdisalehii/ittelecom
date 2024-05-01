<li class="section list">
    @can('widget_view','sale_view')
    <label class="section-title" data-id="#1">مدیریت محتوا</label>
    @endcan
    <ul id="1" class="section-content">

        @can('content_view')
            <li class="list blog">
                <a href="{{ route('admin.post.index') }}" class="extra">
                    <i class="icn block white" style="background-image:url('/icons/book-open.svg');"></i>
                    مقالات
                </a>
            </li>
        @endcan
        @can('content_view')
            <li class="list blog">
                <a href="{{ route('admin.faq.index') }}" class="extra">
                    <i class="icn block white" style="background-image:url('/icons/book-open.svg');"></i>
                    سؤالات متداول
                </a>
            </li>
        @endcan
        @can('widget_view')
            <li class="list shop">
                <a href="{{ route('admin.product.index') }}" class="extra">
                    <i class="icn block white" style="background-image:url('/icons/package-check.svg');"></i>
                    محصولات
                </a>
            </li>
        @endcan

        @can('content_view')
            <li class="list category">
                <a href="{{route('admin.category.index')}}" class="extra">
                    <i class="icn block white" style="background-image:url('/icons/clipboard.svg');"></i>
                    دسته‌بندی‌
                </a>
            </li>
        @endcan
{{--        @can('developer_view')--}}
{{--            <li class="list category">--}}
{{--                <a href="admin/pages/tag" class="extra">--}}
{{--                    <i class="icn block white" style="background-image:url('/icons/tag.svg');"></i>--}}
{{--                    تگ‌ ...--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="list category">--}}
{{--                <a href="admin/pages/comment" class="extra">--}}
{{--                    <i class="icn block white" style="background-image:url('/icons/quote.svg');"></i>--}}
{{--                    نظرات ...--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        @endcan--}}
        @can('content_view')
            <li class="list category">
                <a href="admin/redirect" class="extra">
                    <i class="icn block white" style="background-image:url('/icons/arrow-left-right.svg');"></i>
                    ریردایرکت‌
                </a>
            </li>
        @endcan
        @can('widget_view')
            <li class="list category">
                <a href="{{route('admin.pdf.index')}}" class="extra">
                    <i class="icn block white" style="background-image:url('/icons/bookmark-plus.svg');"></i>
                    فایل‌های PDF
                </a>
            </li>
        @endcan
        @can('widget_view')
            <li class="list category">
                <a href="{{route('admin.datasheet.index')}}" class="extra">
                    <i class="icn block white" style="background-image:url('/icons/bookmark-plus.svg');"></i>
                    دیتاشیت‌
                </a>
            </li>
            {{-- <li class="list media">
                <a href="admin/files/newsletter" class="extra">
                    <i class="icn block white" style="background-image:url('/icons/file.svg');"></i>
                    خبرنامه‌ ...
                </a>
            </li> --}}
        @endcan
    </ul>
</li>
