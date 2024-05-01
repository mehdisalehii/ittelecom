<div class="profile">
    @php
        $user = Auth::user();
        $username = $user->username;
        $mobile = $user->mobile;
        $email = $user->email;
        $photo = $user->photo;
        $letter = strtoupper($username);
    @endphp
    @if (strpos($photo, '#') !== false) 
        <div class="thumb"><div class="string-back" style="background:{{$photo}}">{{mb_substr($letter, 0, 1)}}</div></div>
    @else
        <img src="{{ '/images/uploads/picture/profile' .'/'. Auth::guard('web')->user()->photo }}" width="100" height="100" >
    @endif

        <span class="bold block">{{ Auth::guard('web')->user()->name }}</span>
        <span class="normal block">نام کاربری: {{ Auth::guard('web')->user()->username }}</span>
        @if(Auth::guard('web')->user()->email)
                <span class="thin block">
                        ایمیل:
                        {{ Auth::guard('web')->user()->email }}
                </span>
        @elseif(Auth::guard('web')->user()->mobile)
                <span class="thin block">
                        شماره موبایل:
                        {{ Auth::guard('web')->user()->mobile  }}
                </span>
        @endif

    {{-- @foreach($user->roles()->pluck('name') as $role)
        @foreach($roles as $row)
            @if ($row->name == $role)
                <span class="badge badge-info">{{ $row->title }}</span> 
            @endif
        @endforeach
    @endforeach --}}

    {{-- <a href="/login" class="user-login-reg avatar active" title="ورود کاربری" itemprop="url">
        <div class="txt">ورود کاربری</div>
        <i class="icn fill" style="background-image: url(/icons/user.svg);"></i>
       </a> --}}

</div>