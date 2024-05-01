
<div class="panel form-is">
    <div class="box white right">
        <div class="form-input">
            {{-- <i class="icn fill" style="background-image: url(/icons/user.svg);"></i> --}}
            <input class="type-text" placeholder="  نام کاربری (حروف انگلیسی)" title="نام کاربری (حروف انگلیسی)" type="text" name="username" value="{{ old('username', isset($user) ? $user->username : '') }}" {{ old('username', isset($user) ? 'disabled="disabled"' : '') }} autocomplete="off">
            <label class="txt @if(isset($user)) @if($user->username) active @endif @endif">نام کاربری</label>
        </div>
        <div class="form-input">
            {{-- <i class="icn fill" style="background-image: url(/icons/view.svg);"></i> --}}
            <input class="type-text" placeholder="  نام و نام خانوادگی" title="نام و نام خانوادگی" type="text" name="name" value="{{ old('name', isset($user) ? $user->name : '') }}" autocomplete="off">
            <label class="txt @if(isset($user)) @if($user->name) active @endif @endif">نام و نام خانوادگی</label>
        </div>
        <div class="form-input">
            {{-- <i class="icn fill" style="background-image: url(/icons/phone.svg);"></i> --}}
            <input class="type-text" type="mobile" placeholder="  شماره موبایل" title="شماره موبایل" name="mobile" value="{{ old('mobile', isset($user) ? $user->mobile : '') }}" autocomplete="off">
            <label class="txt @if(isset($user)) @if($user->mobile) active @endif @endif">شماره موبایل</label>
        </div>
        <div class="form-input">
            {{-- <i class="icn fill" style="background-image: url(/icons/mail.svg);"></i> --}}
            <input class="type-text" type="email" placeholder="  ایمیل" title="ایمیل" name="email" value="{{ old('email', isset($user) ? $user->email : '') }}" autocomplete="off">
            <label class="txt @if(isset($user)) @if($user->email) active @endif @endif">ایمیل</label>
        </div>
        <div class="form-input {{ old('password', isset($user) ? 'hide' : '') }}">
            {{-- <i class="icn fill" style="background-image: url(/icons/lock.svg);"></i> --}}
            <div class="btn-side-input password-showhide orw" data-action="password" style="background-image: url(/icons/eye.svg);"></div>
            <input class="type-text" type="password" placeholder="  رمزعبور" title="رمزعبور" name="password" autocomplete="off">
        </div>
    </div>
</div>
<div class="panel form-is">
    <div class="box white">
        <div class="form-input select-disable-theme trwe">
            <label>مجوز نقش</label>
            <select name="roles[]" id="roles" class="form-control select2" size="3" style="font-family:inherit;font-size:16px" {{--multiple--}} required autocomplete="off">
                @foreach($roles as $id => $roles)
                    @foreach($roles_all as $role)
                        @if ($role->name == $id)
                            <option value="{{ $id }}" style="padding:10px 15px" {{ (in_array($id, old('roles', [])) || isset($user) && $user->roles()->pluck('name', 'id')->contains($id)) ? 'selected' : '' }}>{{ $role->title }}</option>
                        @endif
                    @endforeach
                @endforeach
            </select>
        </div>

        <div class="form-input select-disable-theme trwe">
            <label>وریفای ایمیل حساب کاربری</label>
            <select name="is_email_verified" autocomplete="off">
                <option value="1" {{ $user->is_email_verified == '1' ? 'selected' : '' }}>فعال</option>
                <option value="0" {{ $user->is_email_verified == '0' ? 'selected' : '' }}>غیرفعال</option>
            </select>
        </div>

        @if(! isset($user))
            <div class="form-input select-disable-theme">
                <label style="margin-bottom:10px;">ابزار</label>
                <div class="btn btn-popup btn-popup-success btn-w-full text-black bold" data-popup="password">تولید رمز تصادفی</div>
            </div>            
        @endisset

    </div>
</div>