<div class="toolbars hidden">
    <div class="toolbar">
        <div class="title">
            <i class="icn fill" style="background-image: url(/icons/lock.svg);"></i>
            <h1>مجوز دسترسی‌ها</h1>
        </div>  

        <div class="buttons">
            @can('admin_view')
                <a class="btn btn-update text-white bold" href="{{ route('admin.roles.index') }}"><i class="icn white" style="background-image: url(/icons/life-buoy.svg);"></i>نقش‌ها</a>
            @endcan

            @can('admin_view')
                <a class="btn btn-update text-white bold" href="{{ route('admin.users.index') }}"><i class="icn white" style="background-image: url(/icons/users.svg);"></i>کاربران</a>
            @endcan
        </div>

    </div>         
</div>