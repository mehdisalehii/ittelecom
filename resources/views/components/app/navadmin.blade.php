@can('admin_panel')
     
<nav class ="nav-admin">
   <div class="menu-admin">
      <div class="wrapped head-navbar notifaction toolbar-head">
         
         <div class="list dashboard">
            <a href="{{ route('admin.dashboard') }}"
                class="extra {{ Route::is('admin.dashboard') ? 'active' : '' }}"><img src="/icons/dashboard.svg" style="filter: brightness(0) invert(1);margin: 2px 0px -5px;" width="110px" height="36px"></a>
        </div>

        <div class="tool-btn"></div>

         <div class="bell-btn">
            <i class="icn fill"
                style="background-image: url(/icons/bell.svg);"></i>
                {{-- @if($new_topics->count() > 0) 
                <div class="new"></div>
            @endif --}}
         </div>
         <div class="bell-pop">
               <ul class="teddr">
               {{-- 
                  @if($new_topics->count() > 0)
                     @foreach($new_topics as $new_topic)
                           <li><a
                                 href="/admin/forum/edit/{{ $new_topic->id }}">{{ $new_topic->title }}</a></li>
                     @endforeach
                  @else  --}}
                     <li><span href="#">اعلان جدیدی وجود ندارد.</span></li>
               {{-- @endif  --}}
               </ul>
         </div>

      </div>
   </div>
</nav>

@endcan