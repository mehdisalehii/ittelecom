<div class="panel form-is">
    <div class="box white">
        <div class="form-input">
            <i class="icn fill" style="background-image: url(/icons/view.svg);"></i>
            <input class="type-text" placeholder="  نام نقش (فارسی)" title="نام نقش (فارسی)" type="text" name="title" value="{{ old('title', isset($role) ? $role->title : '') }}" {{ old('title', isset($role) ? 'disabled="disabled"' : '') }} autocomplete="off">
            <label class="txt @if(isset($role)) @if($role->title) active @endif @endif">نام نقش (فارسی)</label>
        </div>
        <div class="form-input">
            <i class="icn fill" style="background-image: url(/icons/life-buoy.svg);"></i>
            <input class="type-text" placeholder="  نام نقش (انگلیسی)" title="نام نقش (انگلیسی)" type="text" name="name" value="{{ old('name', isset($role) ? $role->name : '') }}" autocomplete="off">
            <label class="txt @if(isset($role)) @if($role->name) active @endif @endif">نام نقش (انگلیسی)</label>
        </div>
        <div class="form-input select-disable-theme trwe">
            <label>مجوز نقش</label>
            <select name="permission[]" id="permission" class="form-control select2" size="10" style="font-family:inherit;font-size:16px" multiple autocomplete="off">
                @foreach($permissions as $id => $permissions)
                    <option value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || isset($role) && $role->permissions()->pluck('name', 'id')->contains($id)) ? 'selected' : '' }}>{{ $permissions }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>