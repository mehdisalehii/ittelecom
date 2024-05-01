<ul class="col-12">
    <li class="list">
        <label>تنظیمات اصلی</label>
        <ul>
            <li class="list blog">
                <a href="{{route('admin.settings.index')}}" class="extra  @if(URL::current()==route('admin.settings.index')) active @endif">
                    <i class="icn white" style="background-image: url(/icons/settings-2.svg);"></i>
                    عنوان
                </a>
            </li>
            @can('admin_view')
            <li class="list blog">
                <a href="{{route('admin.settings.motto')}}" class="extra  @if(URL::current()==route('admin.settings.motto')) active @endif">
                    <i class="icn white" style="background-image: url(/icons/settings-2.svg);"></i>
                    شعار سایت
                </a>
            </li>
            @endcan
            <li class="list blog">
                <a href="{{route('admin.settings.about')}}" class="extra  @if(URL::current()==route('admin.settings.about')) active @endif">
                    <i class="icn white" style="background-image: url(/icons/settings-2.svg);"></i>
                    درباره سایت
                </a>
            </li>
        </ul>
    </li>
    <li class="list">
        <label>تنظیمات سئو</label>
        <ul>
            <li class="list blog">
                <a href="{{route('admin.settings.meta')}}" class="extra  @if(URL::current()==route('admin.settings.meta')) active @endif">
                    <i class="icn white" style="background-image: url(/icons/settings-2.svg);"></i>
                    متاها
                </a>
            </li>
            <li class="list blog">
                <a href="{{route('admin.settings.token')}}" class="extra  @if(URL::current()==route('admin.settings.token')) active @endif">
                    <i class="icn white" style="background-image: url(/icons/settings-2.svg);"></i>
                    توکن‌ها
                </a>
            </li>
        </ul>
    </li>
    <li class="list">
        <label>تنظیمات گوگل</label>
        <ul>
            <li class="list blog">
                <a href="{{route('admin.settings.map')}}" class="extra  @if(URL::current()==route('admin.settings.map')) active @endif">
                    <i class="icn white" style="background-image: url(/icons/settings-2.svg);"></i>
                    مپ گوگل
                </a>
            </li>
        </ul>
    </li>
    <li class="list">
        <label>تنظیمات راه ارتباطی</label>
        <ul>
            @can('admin_view')
            <li class="list blog">
                <a href="{{route('admin.settings.contact')}}" class="extra  @if(URL::current()==route('admin.settings.contact')) active @endif">
                    <i class="icn white" style="background-image: url(/icons/settings-2.svg);"></i>
                    تماس سایت
                </a>
            </li>
            @endcan
            <li class="list blog">
                <a href="{{route('admin.settings.social')}}" class="extra  @if(URL::current()==route('admin.settings.social')) active @endif">
                    <i class="icn white" style="background-image: url(/icons/settings-2.svg);"></i>
                    شبکه‌های اجتماعی
                </a>
            </li>
        </ul>
    </li>
     @can('admin_view')
    <li class="list">
        <label>تنظیمات نماد</label>
        <ul>
            <li class="list blog">
                <a href="{{route('admin.settings.namad')}}" class="extra  @if(URL::current()==route('admin.settings.namad')) active @endif">
                    <i class="icn white" style="background-image: url(/icons/settings-2.svg);"></i>
                    نماد الکترونیک و رسانه
                </a>
            </li>
        </ul>
    </li>
    @endcan
</ul>