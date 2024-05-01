@can('content_view')
    <li class="section list">
        <label class="section-title" data-id="#2">مدیریت فایل</label>
        <ul id="2" class="section-content">
            <li class="list media">
                <a href="{{route('admin.upload.post')}}" class="extra">
                    <i class="icn block white" style="background-image:url('/icons/upload.svg');"></i>
                    آپلود
                </a>
            </li>
        </ul>
    </li>
@endcan