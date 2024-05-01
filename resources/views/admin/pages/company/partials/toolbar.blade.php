<div class="toolbars hidden">
    <div class="toolbar">

        <div class="title">
            @if(isset($company))
                <i class="icn fill" style="background-image: url(/icons/pencil.svg);"></i>
                <h1>ویرایش شرکت "{{ $company->title }}"</h1>
            @else
{{--                @if( URL::current() == route('admin.company.index') )--}}
{{--                    <i class="icn fill" style="background-image: url(/icons/gem.svg);"></i>--}}
{{--                    <h1>لیست شرکت‌ها</h1>--}}
{{--                @else--}}
{{--                    <i class="icn fill" style="background-image: url(/icons/plus-circle.svg);"></i>--}}
{{--                    <h1>شرکت جدید</h1>--}}
{{--                @endif--}}
            @endif
        </div>

        <div class="buttons">

            @can('developer_view')
                <a class="btn btn-success bold" href="{{ route('admin.company.create') }}"><i class="icn white" style="background-image: url(/icons/plus-circle.svg);"></i>شرکت جدید</a>
            @endcan

            @can('sale_view')
                <a class="btn btn-update text-white bold" href="{{ route('admin.invoice.index') }}"><i class="icn white" style="background-image: url(/icons/clipboard-list.svg);"></i>فاکتورها</a>
            @endcan

{{--            @if( URL::current() != route('admin.company.index') )--}}
{{--                <a class="btn btn-update text-white bold" href="{{ route('admin.company.index') }}"><i class="icn white" style="background-image: url(/icons/gem.svg);"></i>لیست شرکت‌ها</a>--}}
{{--                <button class="btn btn-warning text-white send bold" type="submit" form="Form_Save"><i class="icn white" style="background-image: url(/icons/save.svg);"></i>ذخیره</button>--}}
{{--            @endif--}}

        </div>
    </div>
</div>
