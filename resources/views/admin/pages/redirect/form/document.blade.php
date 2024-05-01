<div class="panel form-is">
    <div class="box white">
        <div class="select-mid"> 
            <span class="text-left col-1" style="padding: 10px 5px;">آدرس قبلی:</span>
            <span class="text-left" style="padding: 10px 5px;">{{route('home')}}/</span>
            <div class="col-2">
            <select class="selectoption" name="type" autocomplete="off">
                {{-- <option value="/" @if(isset($redirect)){{ $redirect->type == '/' ? 'selected' : '' }}@endif>/</option> --}}
                <option value="/" @if(isset($redirect)){{ $redirect->type == '/' ? 'selected' : '' }}@endif>مقاله</option>
                <option value="/shop/" @if(isset($redirect)){{ $redirect->type == '/shop/' ? 'selected' : '' }}@endif>محصول</option>
                <option value="/category/article/" @if(isset($redirect)){{ $redirect->type == '/category/article/' ? 'selected' : '' }}@endif>دسته‌بندی مقاله</option>
                <option value="/products/cat/" @if(isset($redirect)){{ $redirect->type == '/products/cat/' ? 'selected' : '' }}@endif>دسته‌بندی محصول</option>
            </select>
            </div>
            <input class="input typer-get title-get col-7" placeholder=" اسلاگ" name="slug" title="اسلاگ" type="text" value="{{ old('slug', isset($redirect) ? $redirect->slug : '') }}" autocomplete="off">
        </div>

        <div class="col-12" style="margin-top: 15px;"><span class="out-box">{{route('home')}}<span class="bold"></span></span></div>

        <div class="col-12" style="margin-top: 15px;"> 
            <span class="text-left col-1" style="padding: 10px 5px;">آدرس جدید:</span>
            <input class="input col-11" placeholder=" ریردایرکت به" name="redirect_to" title="ریردایرکت به" type="text" value="{{ old('redirect_to', isset($redirect) ? $redirect->redirect_to : '') }}" autocomplete="off">
        </div>

    </div>
</div>