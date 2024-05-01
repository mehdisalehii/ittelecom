<div class="panel form-is">
    <div class="box white right">
        <div class="form-input">
            <i class="icn fill" style="background-image: url(/icons/user.svg);"></i>
            <input class="type-text" placeholder="  اسم" title="اسم" type="text" name="username" value="{{ old('username', isset($user) ? $user->username : '') }}" disabled autocomplete="off">
            <label class="txt {{ $user->username ? 'active' : '' }}">نام کاربری</label>
        </div>
        <div class="form-input">
            <i class="icn fill" style="background-image: url(/icons/lock.svg);"></i>
            <div class="btn-side-input password-showhide orw" data-action="password" style="background-image: url(/icons/eye.svg);"></div>
            <input class="type-text" type="password" placeholder="  رمزعبور" title="رمزعبور" name="password" autocomplete="off">
            <label class="txt {{ $user->password ? 'active' : '' }}">رمزعبور</label>
        </div>
        <div class="form-input">
            <i class="icn fill" style="background-image: url(/icons/lock.svg);"></i>
            <div class="btn-side-input password-showhide orw" data-action="password" style="background-image: url(/icons/eye.svg);"></div>
            <input class="type-text" type="password" placeholder="  تاییدیه رمزعبور" title="تاییدیه رمزعبور" name="password_confirm" autocomplete="off">
            <label class="txt {{ $user->password ? 'active' : '' }}">تاییدیه رمزعبور</label>
        </div>
    </div>
</div>
<div class="panel form-is">
    <div class="box white">
        <div class="form-input select-disable-theme">
            <label style="margin-bottom:10px;">ابزار</label>
            <div class="btn btn-popup btn-popup-success text-black bold btn-w-full" data-popup="password">تولید رمز تصادفی</div>
        </div>
    </div>
</div>