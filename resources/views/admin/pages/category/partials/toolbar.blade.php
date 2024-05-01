<div class="toolbars hidden">
    <div class="toolbar">
        <div class="title">
            <i class="icn fill" style="background-image: url(/icons/clipboard.svg);"></i>
            @if( URL::current() == route('admin.category.index') )
                <h1>دسته‌بندی‌ها</h1>
            @endif            
            @if( URL::current() == route('admin.category.post') )
                <h1>دسته‌بندی مقالات</h1>
            @endif
            @if( URL::current() == route('admin.category.product') )
                <h1>دسته‌بندی محصولات</h1>
            @endif
            @if( URL::current() == route('admin.category.forum') )
                <h1>دسته‌بندی انجمن</h1>
            @endif
        </div>
        <div class="buttons">


            @if( URL::current() == route('admin.category.product') || URL::current() == route('admin.category.post') ||URL::current() == route('admin.category.forum')  )

            <button id="reset" class="btn btn-success auto reset-form bold"><i class="icn white" style="background-image: url('/icons/plus-circle.svg');"></i>لیست جدید</button>

            <menu id="menuable-menu">
                <button type="button" data-action="expand-all" class="btn btn-success auto expand-all bold"><i class="icn white" style="background-image: url('/icons/folder-open.svg');"></i>بازکردن همه لیست‌ها</button>
                <button type="button" data-action="collapse-all" class="btn btn-danger auto collapse-all bold" style="display: none;"><i class="icn white" style="background-image: url('/icons/folder.svg');"></i>بستن همه لیست‌ها</button>
            </menu>

            <button id="submit" class="btn btn-warning auto save-form bold hide"><i class="icn white" style="background-image: url('/icons/save.svg');"></i>ذخیره</button>
            
            @endif

            {{-- @if( URL::current() != route('admin.category.index') )
                <a class="btn btn-success bold" href="{{ route('admin.category.post') }}"><i class="icn white" style="background-image: url(/icons/book-open.svg);"></i>دسته‌بندی مقاله</a>
                <a class="btn btn-success bold" href="{{ route('admin.category.product') }}"><i class="icn white" style="background-image: url(/icons/box.svg);"></i>دسته‌بندی محصول</a>
                <a class="btn btn-success bold" href="{{ route('admin.category.forum') }}"><i class="icn white" style="background-image: url(/icons/twitch.svg);"></i>دسته‌بندی انجمن</a>
            @endif --}}

        </div>
    </div>         
</div>