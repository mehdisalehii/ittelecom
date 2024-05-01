<div class="toolbars hidden">
    <div class="toolbar">
        <div class="hi-notifaction">
            <div class="txt">سلام <span class="bold">{{Auth::guard('web')->user()->name}}</span>، خوش آمدید!</div>
        </div>
        <div class="buttons">
            <a class="btn btn-danger text-white bold" href="admin/change_password"><i class="icn white" style="background-image: url(/icons/lock.svg);"></i>تغییر رمز عبور کاربری</a>

            @can('content_view')
            <a class="btn btn-update text-white bold" href="admin/settings"><i class="icn white" style="background-image: url(/icons/settings.svg);"></i>تنظیمات وبسایت</a>
            @endcan
        </div>         
    </div>         
</div>