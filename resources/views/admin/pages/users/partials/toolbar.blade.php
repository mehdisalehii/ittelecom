<div class="toolbars hidden">
    <div class="toolbar">

        <div class="title">
            @if(isset($user))
                @if( URL::current() == route('admin.users.edit', $user->id ) )
                    <i class="icn fill" style="background-image: url(/icons/pencil.svg);"></i>
                    <h1>ویرایش کاربر "{{ $user->username }}"</h1>
                @else
                    <i class="icn fill" style="background-image: url(/icons/pencil.svg);"></i>
                    <h1>تغییر رمز عبور کاربر "{{ $user->username }}"</h1>
                @endif
            @else
                @if( URL::current() == route('admin.users.index') )
                    <i class="icn fill" style="background-image: url(/icons/users.svg);"></i>
                    <h1>کاربران</h1>
                @else
                    <i class="icn fill" style="background-image: url(/icons/user-plus.svg);"></i>
                    <h1>کاربر جدید</h1>
                @endif
            @endif
        </div>

        <div class="buttons">

            @can('admin_create')
                <a class="btn btn-success bold" href="{{ route('admin.users.create') }}"><i class="icn white" style="background-image: url(/icons/plus-circle.svg);"></i>کاربر جدید</a>
            @endcan

            @can('admin_view')
                <a class="btn btn-danger text-white bold" href="{{ route('admin.permissions.index') }}"><i class="icn white" style="background-image: url(/icons/lock.svg);"></i>مجوز دسترسی‌ها</a>
            @endcan
            @can('admin_view')
                <a class="btn btn-update text-white bold" href="{{ route('admin.roles.index') }}"><i class="icn white" style="background-image: url(/icons/life-buoy.svg);"></i>نقش‌ها</a>
            @endcan

        @if(isset($user))
            @if( URL::current() != route('admin.users.edit', $user->id ) )
                <a class="btn btn-danger text-white bold" href="{{ route('admin.users.edit' , $user->id) }}"><i class="icn white" style="background-image: url(/icons/user.svg);"></i>ویرایش کاربر "{{$user->username}}"</a>
            @else
                <a class="btn btn-danger text-white bold" href="{{ route('admin.users.password' , $user->id) }}"><i class="icn white" style="background-image: url(/icons/lock.svg);"></i>تغییر رمز عبور</a>
            @endif
        @endif

        @if( URL::current() != route('admin.users.index') )
            <a class="btn btn-update text-white bold" href="{{ route('admin.users.index') }}"><i class="icn white" style="background-image: url(/icons/users.svg);"></i>لیست کاربران</a>
            <button class="btn btn-warning text-white send bold" type="submit" form="Form_Save"><i class="icn white" style="background-image: url(/icons/save.svg);"></i>ذخیره</button>
        @endif

        </div>         
    </div>         
</div>