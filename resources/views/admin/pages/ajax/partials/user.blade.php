@if ($url_fetch == 'users' )
@foreach($users as $key => $user)
    <li class="content-ma display-flex lid">
        <div class="col-1 txt {{ $loop->index+1 }}"><span>{{  $user->id ?? '' }}</span></div>
        <div class="col-2 txt"><span>{{ $user->name ? $user->name : '-' }}</span></div>
        <div class="col-2 txt"><span>{{ $user->username ?? '' }}</span></div>
        <div class="col-1 txt"><span>{{ \Morilog\Jalali\CalendarUtils::convertNumbers(jdate($user->created_at)->format('%Y/%m/%d')) }}</span></div>
        <div class="col-2 txt"><span>{{ $user->email ?  \Illuminate\Support\Str::limit( strip_tags( str_replace('   ','',$user->email)) ,20) : $user->mobile }}</span></div>
        <div class="col-2">
        @foreach($user->roles()->pluck('name') as $role)
            @foreach($roles as $row)
                @if ($row->name == $role)
                    <span class="badge badge-info">{{ $row->title }}</span>
                @endif
            @endforeach
        @endforeach
        </div>
        <div class="col-2 tools">
            @can('admin_edit')
                <button class="btn btn-danger text-white delete-btn-sql" title="حذف" data-txt="کاربر {{ $user->name }}" data-id="{{ $user->id }}"><i class="icn white" style="background-image: url(/icons/trash-2.svg);"></i></button>
                <div class="bt-fr otw">
                    <form class="delete-form-{{ $user->id }} hidden" action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                     @csrf
                        @method('DELETE')
                    </form>
                </div>
            @endcan
            <a class="btn btn-update text-white" href="author/{{$user->username}}" target="_blank" title="پروفایل"><i class="icn white" style="background-image: url(/icons/contact.svg);"></i></a>
            @can('admin_edit')
                <a class="btn btn-success" href="{{ route('admin.users.edit', $user->id) }}" title="ویرایش">
                    <i class="icn white" style="background-image: url(/icons/pencil.svg);"></i>
                </a>
            @endcan
        </div>
    </li>
    @endforeach
@endif
