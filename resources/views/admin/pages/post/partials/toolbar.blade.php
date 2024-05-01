<div class="toolbars hidden">
    <div class="toolbar">

        <div class="title">
            @if(isset($post))
                <i class="icn fill" style="background-image: url(/icons/pencil.svg);"></i>
                <h1>ویرایش مقاله "{{ $post->id }}"</h1>
            @else
                @if( URL::current() == route('admin.post.index') )
                    <i class="icn fill" style="background-image: url(/icons/life-buoy.svg);"></i>
                    <h1>لیست مقاله‌ها</h1>
                @else
                    <i class="icn fill" style="background-image: url(/icons/plus-circle.svg);"></i>
                    <h1>مقاله جدید</h1>
                @endif
            @endif
        </div>

        <div class="buttons">

            @can('content_create')
                <a class="btn btn-success bold" href="{{ route('admin.post.create') }}"><i class="icn white" style="background-image: url(/icons/plus-circle.svg);"></i>مقاله جدید</a>
            @endcan

            @if(isset($post))
{{--                @can('admin_view')--}}
{{--                    <button class="btn btn-danger text-white bold delete-btn-sql" title="حذف" data-txt="شماره مقاله {{ $post->id }}" data-id="{{ $post->id }}"><i class="icn white" style="background-image: url(/icons/trash-2.svg);"></i>حذف</button>--}}
{{--                    <div class="bt-fr otw hidden"><form class="delete-form-{{ $post->id }}" action="{{ route('admin.post.destroy', $post->id) }}" method="POST">  @csrf <input class="hidden" type="text" name="id" autocomplete="off" value="{{ $post->id }}"></form></div>--}}
{{--                @endcan--}}
                <a class="btn btn-update text-white bold" target="_blank" href="{{ '/blog/preview/' . $post->slug }}" target="_blank"><i class="icn white" style="background-image: url(/icons/eye.svg);"></i>پیش‌نمایش</a>
            @endif

            @if( URL::current() != route('admin.draft.post') )
                <a class="btn btn-danger text-white bold" href="{{ route('admin.draft.post') }}"><i class="icn white" style="background-image: url(/icons/clipboard-list.svg);"></i>پیشنویس مقالات</a>
            @endif

            @if( URL::current() != route('admin.post.index') )
                <a class="btn btn-update text-white bold" href="{{ route('admin.post.index') }}"><i class="icn white" style="background-image: url(/icons/life-buoy.svg);"></i>لیست مقاله‌ها</a>
            @endif

            @if( URL::current() == route('admin.post.create') )
                <button class="btn btn-warning text-white send bold" type="submit" form="Form_Save"><i class="icn white" style="background-image: url(/icons/save.svg);"></i>ذخیره</button>
            @endif
        @if(isset($post))
            @if( URL::current() == route('admin.post.edit', $post->id))
                <button class="btn btn-warning text-white send bold" type="submit" form="Form_Save"><i class="icn white" style="background-image: url(/icons/save.svg);"></i>ذخیره</button>
            @endif

        @endif

        </div>
    </div>
</div>
