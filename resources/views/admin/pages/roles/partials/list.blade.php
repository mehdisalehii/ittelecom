<li class="display-flex header">
    <div class="col-1">ردیف</div>
    <div class="col-2">نام نقش</div>
    <div class="col-8">مجوز دسترسی‌ها</div>
    <div class="col-1">ابزار</div>
</li>

@foreach ($roles as $role)
<li class="content-ma display-flex lid">
    <div class="col-1">{{ $loop->index+1 }}</div>
    <div class="col-2">{{ $role->title }}</div>
    <div class="col-8">
        @foreach ($role->permissions as $perm)
            <span class="badge badge-info">
                {{ $perm->name }}
            </span>
        @endforeach
    </div>
    <div class="col-1 tools">
        @can('admin_delete')
            @if ( $role->status != 'lock' )
                <button class="btn btn-danger text-white delete-btn-sql" title="حذف" data-txt="( نقش {{ $role->title }} )" data-id="{{ $role->id }}"><i class="icn white" style="background-image: url(/icons/trash-2.svg);"></i></button>
                <div class="bt-fr otw"><form class="delete-form-{{ $role->id }} hidden" action="{{ route('admin.roles.destroy', $role->id) }}" method="POST">  @csrf @method('DELETE') </form></div>
            @else
                <button class="btn btn-perimary text-white disable"><i class="icn white" style="background-image: url(/icons/x.svg);"></i></button>
            @endif
        @endcan
        @can('admin_edit')
            @if ( $role->status != 'lock' )
                <a class="btn btn-success" href="{{ route('admin.roles.edit', $role->id) }}" title="ویرایش"><i class="icn white" style="background-image: url(/icons/pencil.svg);"></i></a>
            @else
                <button class="btn btn-perimary text-white disable"><i class="icn white" style="background-image: url(/icons/pencil.svg);"></i></button>
            @endif
        @endcan
    </div>
</li>
@endforeach
