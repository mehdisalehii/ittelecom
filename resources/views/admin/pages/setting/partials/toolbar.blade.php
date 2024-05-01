<div class="toolbars hidden">
    <div class="toolbar">

        <div class="title">
            <i class="icn fill" style="background-image: url(/icons/settings.svg);"></i>
            <h1>تنظیمات وبسایت</h1>
        </div>

        <div class="buttons">
            @can('admin_view')
                <button class="btn btn-warning text-white send bold" type="submit" form="Form_Save"><i class="icn white" style="background-image: url(/icons/save.svg);"></i>ذخیره</button>
            @endcan

            @can('seo_view')

                @if(    URL::current()==route('admin.settings.about') ||  
                        URL::current()==route('admin.settings.meta') || 
                        URL::current()==route('admin.settings.map') || 
                        URL::current()==route('admin.settings.social') || 
                        URL::current()==route('admin.settings.token')  )
                <button class="btn btn-warning text-white send bold" type="submit" form="Form_Save"><i class="icn white" style="background-image: url(/icons/save.svg);"></i>ذخیره</button>
                @endif
            @endcan

        </div>         

    </div>         
</div>