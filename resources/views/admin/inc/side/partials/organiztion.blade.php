<li class="section list">
    <label class="section-title" data-id="#4">مدیریت اداری</label>
    <ul id="4" class="section-content">
        @can('sale_view')
            {{-- <li class="list invoice"><a class="extra" href="{{route('admin.letter.index')}}"><i class="icn block white" style="background-image:url('/icons/file.svg');"></i>نامه اداری</a></li> --}}
        @endcan
        @can('developer_view')
            {{-- <li class="list invoice"><a class="extra" href="admin/pages/fish-post"><i class="icn block white" style="background-image:url('/icons/plane.svg');"></i>رسید پستی</a>...</li> --}}
            {{-- <li class="list invoice"><a class="extra" href="admin/pages/ticket"><i class="icn block white" style="background-image:url('/icons/file-search.svg');"></i>صندوق پیام مشتریان</a>...</li> --}}
        @endcan
        @can('admin_view')
            <li class="list admin">
                <a href="{{ route('admin.users.index') }}" class="extra {{ Route::is('admin.users.index')  || Route::is('admin.users.edit') ? 'active' : '' }} ">
                    <i class="icn block white" style="background-image:url('/icons/users.svg');"></i>
                    کاربران
                </a>
            </li>
            <li class="list admin">
                <a href="{{ route('admin.roles.index') }}" class="extra {{ Route::is('admin.roles.index')  || Route::is('admin.roles.edit') ? 'active' : '' }} ">
                    <i class="icn block white" style="background-image:url('/icons/life-buoy.svg');"></i>
                    نقش‌
                </a>
            </li>
{{--            <li class="list admin">--}}
{{--                <a href="{{ route('admin.company.index') }}" class="extra {{ Route::is('admin.company.index')  || Route::is('admin.company.edit') ? 'active' : '' }} ">--}}
{{--                    <i class="icn block white" style="background-image:url('/icons/gem.svg');"></i>--}}
{{--                    شرکت‌--}}
{{--                </a>--}}
{{--            </li>--}}
        @endcan
        @can('admin_view')
            <li class="list admin">
                <a href="{{ route('admin.permissions.index') }}" class="extra {{ Route::is('admin.permissions.index')  || Route::is('admin.permissions.edit') ? 'active' : '' }} ">
                    <i class="icn block white" style="background-image:url('/icons/lock.svg');"></i>
                    دسترسی‌
                </a>
            </li>
        @endcan

{{--        <li class="list admin last">--}}
{{--            <a href="{{ route('admin.stat.index') }}" class="extra {{ Route::is('admin.stat.index')  || Route::is('admin.stat.edit') ? 'active' : '' }} ">--}}
{{--                <i class="icn block white" style="background-image:url('/icons/trending-up.svg');"></i>--}}
{{--                آمار--}}
{{--            </a>--}}
{{--        </li>--}}
    </ul>
</li>
