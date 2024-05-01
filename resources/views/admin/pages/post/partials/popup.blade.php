<div class="popup-form">

@component('components.popup')
    @slot('data','gallary')
    @slot('style','width:550px;height:480px')
    @slot('option')
        <input class="chkbx-selected-list hidden" value="{{ old('thumb', isset($post) ? $post->thumb : '') }}" data-popup="gallary" autocomplete="off">
        <a href="{{route('admin.upload.post')}}" target="_blank" class="btn btn-update btn-close-popup btn-ok">آپلود تصویر</a>
        {{-- <div class="searcWh-filter"><input type="text" class="input-filter" placeholder="جستجو..." autocomplete="off"></div> --}}
    @endslot
    @slot('title','گالری : انتخاب عکس')
    @slot('fetch','scroll')
    @slot('type','post')
    @slot('btn','btn-ok')

        <ul class="treeview list select-checkbox cat grid grid-1 gap-3">
        <li class="hidden checked"></li>
        @foreach( $gallary as $row )
            @if(isset($post))
                @foreach(explode(",", $post->thumb) as $split_thumb)
                    @if( $row->filename == $split_thumb )
                        <li class="col-3">
                            <input
                                id="idThumb{{$row->id}}"
                                type="checkbox"
                                class="chkbx-list thumbnail-selector-input-class"
                                data-ext="{{$row->ext}}"
                                data-popup="gallary"
                                name="thumbl[]"
                                data-txt="{{$row->filename}}"
                                checked
                                value="{{$row->filename}}"
                                autocomplete="off">
                            <label title="{{$row->filename . '.' . $row->ext}}" for="idThumb{{$row->id}}" class="thumbnail-selector-label-class">
                                <img class="thumb" src="/generated/images/post/300x300/{{ $row->filename }}.webp" alt="{{$row->filename}}" width="100" height="100">
                            </label>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach
        @foreach( $gallary as $row )
            @if(!isset($post) || !\Illuminate\Support\Str::contains($post->thumb, $row->filename))
                <li class="col-3">
                    <input
                        id="idThumb{{$row->id}}"
                        type="checkbox"
                        class="chkbx-list thumbnail-selector-input-class"
                        data-ext="{{$row->ext}}"
                        data-popup="gallary"
                        name="thumbl[]"
                        data-txt="{{$row->filename}}"
                        value="{{$row->filename}}"
                        autocomplete="off">
                    <label title="{{$row->filename . '.' . $row->ext}}" for="idThumb{{$row->id}}" class="thumbnail-selector-label-class">
                        <img class="thumb" src="/generated/images/post/300x300/{{ $row->filename }}.webp" alt="{{$row->filename}}" width="100" height="100">
                    </label>
                </li>
            @endif
        @endforeach
        </ul>

@endcomponent

@component('components.popup')
    @slot('data','title')
    @slot('style','width:550px;height:250px')
    @slot('option','')
    @slot('title','ادرس مقاله')
    @slot('fetch','')
    @slot('type','post')
    @slot('btn','btn-ok-title')

        {{-- <div class="form-group relative float-right w-full" data-txt="title-get"> --}}
            {{-- <label>عنوان</label> --}}
            {{-- <input class="title-get input" name="title" data-txt="title-get" placeholder=" عنوان مقاله" title="عنوان مقاله" value="{{ old('title', isset($post) ? $post->title : '') }}" data-id="{{ old('title', isset($post) ? $post->id : '') }}" autocomplete="off"> --}}
        {{-- </div> --}}

        <div class="form-group relative float-right w-full" data-txt="slug-get">
            <span class="col-5 bold direction-ltr float-left">{{route('home')}}//blog/</span>
            <div class="slug-par relative float-left w-full">
                <input class="slug-get input w-full direction-ltr {{ URL::current() == route('admin.post.create') ? 'create' : '' }}" data-txt="slug-get" placeholder=" ادرس مقاله" title="ادرس مقاله" value="{{ old('slug', isset($post) ? urldecode($post->slug) : '') }}" data-id="{{ old('title', isset($post) ? $post->id : '') }}" autocomplete="off">

                {{-- <input class="slug-s hidden" name="slug" value="{{ old('slug', isset($post) ? $post->slug : '') }}" autocomplete="off"> --}}

                {{-- <div class="check-url-result">
                    <i class="icn fill ico-ok {{ old('slug', isset($post) ? 'show' : '') }}" style="background-image: url(/icons/check-circle-2.svg);" title="عالی"></i>
                    <i class="icn fill ico-x" style="background-image: url(/icons/x-circle.svg);"  title="مشکل دارد"></i>
                </div>             --}}
            </div>

        </div>

@endcomponent

@component('components.popup')
    @slot('data','category')
    @slot('style','width:350px;height:480px')
    @slot('option')
        <a href="{{route('admin.category.post')}}" target="_blank" class="btn btn-update btn-close-popup btn-ok">ویرایش</a>
{{--        <div class="search-filter"><input type="text" class="input-filter" placeholder="جستجو..." autocomplete="off"></div>--}}
    @endslot
    @slot('title','دسته‌بندی‌')
    @slot('fetch','')
    @slot('type','post')
    @slot('btn','btn-ok-category')
        <ul class="treeview cat_list select-checkbox cat no-ca" style="list-style-type: none;">
        @foreach( $category_blog as $row_main )
            <li>
                <input id="idCat{{$row_main->id}}" type="checkbox" class="chkbx-catlist" name="catl[]" @if(isset($post)) @foreach( $categories as $cat) @if ( $cat->menu ) @if ( $cat->menu->parent == '0' && $row_main->id == $cat->menu->id ) {{' checked '}} @endif @endif @endforeach @endif data-txt="{{$row_main->title}}" value="{{$row_main->id}}" autocomplete="off">
                <label title="{{$row_main->title}}" for="idCat{{$row_main->id}}">{{$row_main->title}}</label>
            </li>
        @endforeach
        </ul>

@endcomponent

</div>
