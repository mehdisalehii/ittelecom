<li class="display-flex header">
    <div class="col-5">ریردایرکت به</div>
    <div class="col-5">لینک</div>
    <div class="col-2">ابزار</div>
</li>

@foreach ($redirects as $row)
<li class="content-ma display-flex lid">
    <div class="col-5">{{ $row->redirect_to }}</div>
    <div class="col-5">{{ $row->type . $row->slug }}</div>
    <div class="col-2 tools">
        @can('content_delete')
            <button class="btn btn-danger text-white delete-btn-sql" title="حذف" data-txt="( لینک {{ $row->slug }} )" data-id="{{ $row->id }}"><i class="icn white" style="background-image: url(/icons/trash-2.svg);"></i></button>
            <div class="bt-fr otw"><form class="delete-form-{{ $row->id }} hidden" action="{{ route('admin.redirect.destroy', $row->id) }}" method="POST">  @csrf @method('DELETE') </form></div>
        @endcan
            <a class="btn btn-update text-white" href="{{ route('home') . $row->type . $row->slug }}" title="پیش‌نمایش" target="_blank"><i class="icn white" style="background-image: url(/icons/eye.svg);"></i></a>
        @can('content_edit')
            <a class="btn btn-success" href="{{ route('admin.redirect.edit', $row->id) }}" title="ویرایش"><i class="icn white" style="background-image: url(/icons/pencil.svg);"></i></a>
        @endcan
    </div>
</li>
@endforeach
