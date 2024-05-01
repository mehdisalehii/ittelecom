<div class="toolbars hidden">
    <div class="toolbar">

        <div class="title">
            @if(isset($redirect))
                <i class="icn fill" style="background-image: url(/icons/pencil.svg);"></i>
                <h1>ویرایش لینک "{{ $redirect->slug }}"</h1>
            @else
                @if( URL::current() == route('admin.redirect.index') )
                    <i class="icn fill" style="background-image: url(/icons/arrow-left-right.svg);"></i>
                    <h1>لیست ریردایرکت‌ها</h1>
                @else
                    <i class="icn fill" style="background-image: url(/icons/plus-circle.svg);"></i>
                    <h1>لینک جدید</h1>
                @endif
            @endif
        </div>

        <div class="buttons">

            @can('content_create')
                <a class="btn btn-success bold" href="{{ route('admin.redirect.create') }}"><i class="icn white" style="background-image: url(/icons/plus-circle.svg);"></i>لینک جدید</a>
            @endcan



            @if(isset($redirect))
                @if( URL::current() == route('admin.redirect.edit',[$redirect->id]) )
                    <a class="btn btn-update text-white bold" href="{{ route('home') . $redirect->type . $redirect->slug }}"><i class="icn white" style="background-image: url(/icons/eye.svg);"></i>پیش نمایش</a>
                @endif
                @can('content_delete')
                    <button class="btn btn-danger text-white delete-btn-sql" title="حذف" data-txt="( لینک {{ $redirect->slug }} )" data-id="{{ $redirect->id }}"><i class="icn white" style="background-image: url(/icons/trash-2.svg);"></i>حذف</button>
                    <div class="bt-fr otw hidden"><form class="delete-form-{{ $redirect->id }}" action="{{ route('admin.redirect.destroy', $redirect->id) }}" method="POST">  @csrf @method('DELETE') </form></div>
                @endcan
            @endif

            @if( URL::current() != route('admin.redirect.index') )
                <a class="btn btn-update text-white bold" href="{{ route('admin.redirect.index') }}"><i class="icn white" style="background-image: url(/icons/arrow-left-right.svg);"></i>لیست ریردایرکت‌ها</a>
                <button class="btn btn-warning text-white send bold" type="submit" form="Form_Save"><i class="icn white" style="background-image: url(/icons/save.svg);"></i>ذخیره</button>
            @endif

        </div>
    </div>
</div>
