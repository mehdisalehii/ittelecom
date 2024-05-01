<div class="option col-6 form-word hide">
  <div class="panel form-iso">
    <div class="form-input">
      {{-- <i class="icn fill" style="background-image: url(/icons/tag.svg);"></i> --}}
      <label class="txt">عنوان</label>
      <input id="label" class="type-text" placeholder=" عنوان" title="عنوان" type="text" autocomplete="off">
    </div>
    @can('admin_view')
    <div class="form-input">
      {{-- <i class="icn fill" style="background-image: url(/icons/link.svg);"></i> --}}
      <label class="txt">آدرس</label>
      <input id="slug" class="type-text" placeholder=" آدرس" title="آدرس" type="text" autocomplete="off">
    </div>
    @else
      <input id="slug" type="hidden" autocomplete="off">
    @endcan
    @can('admin_view')
      <div class="form-input">
        {{-- <i class="icn fill" style="background-image: url(/icons/qr-code.svg);"></i> --}}
        <label class="txt">پارت نامبر</label>
        <input id="sku" class="type-text" placeholder=" پارت نامبر" title="پارت نامبر" type="text" autocomplete="off">
      </div>
    @else
      <input id="sku" type="hidden" autocomplete="off">
    @endcan
    @can('admin_view')
    <div class="form-input">
      {{-- <i class="icn fill" style="background-image: url(/icons/file.svg);"></i> --}}
      <label class="txt">نام فایل تصویر</label>
      <input id="thumb" class="type-text" placeholder=" نام فایل تصویر" title="نام فایل تصویر" type="text" autocomplete="off">
    </div>
    @else
      <input id="thumb" type="hidden" autocomplete="off">
    @endcan
    <div class="form-textarea">
      {{-- <i class="icn fill" style="background-image: url(/icons/edit.svg);"></i> --}}
      <label class="txt">Meta Description</label>
      <textarea id="short-description" name="short-description" maxlength=156 placeholder="توضیح مختصری برای موتورهای جستجو در ۱۵۶ کاراکتر"></textarea>
    </div>
    <div class="form-textarea">
      {{-- <i class="icn fill" style="background-image: url(/icons/edit.svg);"></i> --}}
      <label class="txt">توضیحات بالا صفحه</label>
      <textarea id="content" class="textarea editor-content type-text tetwe" placeholder=" توضیحات بالا صفحه" title="توضیحات بالا صفحه" type="text" autocomplete="off"></textarea>
    </div>
    <div class="form-textarea"><br/>
      {{-- <i class="icn fill" style="background-image: url(/icons/edit.svg);"></i> --}}
      <label class="txt">توضیحات پایین صفحه</label>
      <textarea id="content_bottom" class="textarea editor-content type-text tetwe" placeholder=" توضیحات پایین صفحه" title="توضیحات پایین صفحه" type="text" autocomplete="off"></textarea>
    </div>

    <div class="form-group teouew"><br/>
      <label for="class_name" class="control-label">نام کلاس</label>
      <span class="selectoption arrow top-boto"></span>
      <select id="class_name" class="selectoption">
        <option value="default">پیشفرض</option>
        <option value="col-large">بزرگ</option>
        <option value="col-middle">دو ستون</option>
        <option value="col-triple">سه ستون</option>
        <option value="col-four">چهارستون</option>
        <option value="hide">مخفی</option>
      </select>
      <div>
        <br/>
        برای ویرایش سؤالات متداول هر دسته‌بندی از منوی
        <a href="/admin">
        داشبورد
        </a>
        ->
        مدیریت محتوا
        ->
        <a href="/admin/faq">
          سؤالات متداول
        </a>
        استفاده نمایید
      </div>
    </div>
  </div>

  <div class="form-group hidden">
    <input type="hidden" id="menuable-output">
    <input type="hidden" id="id">
    <input type="hidden" id="type" value="product">
  </div>

</div>
