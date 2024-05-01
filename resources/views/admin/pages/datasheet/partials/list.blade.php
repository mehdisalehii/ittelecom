<li class="display-flex header">
    <div class="col-1">شماره</div>
    <div class="col-5">نام دیتاشیت</div>
    <div class="col-1">پارت نامبر</div>
    <div class="col-3">آدرس کوتاه</div>
    <div class="col-3">نویسنده</div>
    <div class="col-2">ابزار</div>
</li>


@foreach($datasheets as $row)
    <li class="content-ma display-flex lid">
        <div class="col-1 txt"><span>{{$row->id}}</span></div>
        <div class="col-5 txt"><span>{{$row->title}}</span></div>
        <div class="col-1 txt"><span>{{$row->sku_n}}</span></div>
        <div class="col-3 txt"><span>{{$row->slug}}</span></div>
        <div class="col-3 txt"><span>{{$row->user->name}}</span></div>
        <div class="col-2 tools">
            <button class="btn btn-danger text-white delete-btn-sql" title="حذف" data-txt="شماره دیتاشیت {{ $row->id }}" data-id="{{ $row->id }}"><i class="icn white" style="background-image: url(/icons/trash-2.svg);"></i></button>
            <div class="bt-fr otw"><form class="delete-form-{{ $row->id }} hidden" action="{{ route('admin.datasheet.destroy', $row->id) }}" method="POST">  @csrf @method('DELETE') <input class="hidden" type="text" name="id" autocomplete="off" value="{{ $row->id }}"></form></div>
            <a class="btn btn-update text-white" href="{{ config('path.download.pdf') .'/'. $row->slug .'.pdf' }}" target="_blank" title="پیش‌نمایش"><i class="icn white" style="background-image: url(/icons/eye.svg);"></i></a>
            <a class="btn btn-success" href="admin/datasheet/{{$row->id}}/edit" title="ویرایش"><i class="icn white" style="background-image: url(/icons/pencil.svg);"></i></a>
        </div>
    </li>
@endforeach
