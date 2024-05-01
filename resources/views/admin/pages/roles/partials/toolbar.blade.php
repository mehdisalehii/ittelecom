<div class="toolbars hidden">
    <div class="toolbar">

        <div class="title">
            @if(isset($role))
                <i class="icn fill" style="background-image: url(/icons/pencil.svg);"></i>
                <h1>ویرایش نقش "{{ $role->title }}"</h1>
            @else
                @if( URL::current() == route('admin.roles.index') )
                    <i class="icn fill" style="background-image: url(/icons/life-buoy.svg);"></i>
                    <h1>لیست نقش‌ها</h1>
                @else
                    <i class="icn fill" style="background-image: url(/icons/plus-circle.svg);"></i>
                    <h1>نقش جدید</h1>
                @endif
            @endif
        </div>

        <div class="buttons">

            @can('sale_create')
                <a class="btn btn-success bold" href="{{ route('admin.roles.create') }}"><i class="icn white" style="background-image: url(/icons/plus-circle.svg);"></i>نقش جدید</a>
            @endcan

            @can('admin_view')
                <a class="btn btn-danger text-white bold" href="{{ route('admin.permissions.index') }}"><i class="icn white" style="background-image: url(/icons/lock.svg);"></i>مجوز دسترسی‌ها</a>
            @endcan

            @can('admin_view')
                <a class="btn btn-update text-white bold" href="{{ route('admin.users.index') }}"><i class="icn white" style="background-image: url(/icons/users.svg);"></i>کاربران</a>
            @endcan

            @if( URL::current() != route('admin.roles.index') )
                <a class="btn btn-update text-white bold" href="{{ route('admin.roles.index') }}"><i class="icn white" style="background-image: url(/icons/life-buoy.svg);"></i>لیست نقش‌ها</a>
                <button class="btn btn-warning text-white send bold" type="submit" form="Form_Save"><i class="icn white" style="background-image: url(/icons/save.svg);"></i>ذخیره</button>
            @endif

        </div>         
    </div>         
</div>