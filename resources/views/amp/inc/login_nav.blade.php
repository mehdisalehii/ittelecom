@auth('web')
   <div class="user ereew">
      <div class="user-pop">

         @php
            $checkThumb = Auth::guard('web')->user()->photo; 
            $strUSERName = Auth::guard('web')->user()->username;
            $strUSERName_up = strtoupper($strUSERName);
         @endphp

        
         <div class="box-pop">
            <a href="{{ route('admin.dashboard') }}">
            <div class="profile">
               @if (strpos($checkThumb, '#') !== false) 
                  <div class="thumb"><div class="string-back" style="background:{{$checkThumb}}">{{mb_substr($strUSERName_up, 0, 1)}}</div></div>
               @else
                  <img src="{{ '/images/uploads/picture/profile' .'/'. $checkThumb }}" width="50" height="50" >
               @endif
            </div>
            </a>

         </div>

      </div>
   </div>
@endauth
@guest('web')
    <a href="{{'/login'}}" class="btn-border user-login-reg avatar" title="ورود / ثبت‌نام">
      <i class="icn block black" style="background-image:url('/icons/user.svg');"></i>
      <div class="txt">ورود / ثبت‌نام</div>
    </a>
@endguest