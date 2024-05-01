<div class="popup-form">

@component('components.popup')
    @slot('data','gallary')
    @slot('style','width:550px;height:480px')
    @slot('option')
        <input class="chkbx-selected-list hidden" value="{{ old('thumb', isset($product) ? $product->thumb : '') }}" data-popup="gallary" autocomplete="off">
        <a href="{{route('admin.upload.product')}}" target="_blank" class="btn btn-update btn-close-popup btn-ok">آپلود تصویر</a>
        {{-- <div class="searcWh-filter"><input type="text" class="input-filter" placeholder="جستجو..." autocomplete="off"></div> --}}
    @endslot
    @slot('title','گالری : انتخاب عکس ')
    @slot('fetch','scroll')
    @slot('type','product')
    @slot('btn','btn-ok')

        <ul class="treeview list select-checkbox ca grid grid-1 gap-3">
        <li class="hidden checked"></li>
        @foreach( $gallary as $row )
            @if(isset($product))
                @foreach(explode(",", $product->thumb) as $split_thumb)
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
                                autocomplete="off"
                            >
                            <label title="{{$row->filename . '.' . $row->ext}}" for="idThumb{{$row->id}}" class="thumbnail-selector-label-class">
                            <img class="thumb" src="/generated/images/product/300x300/{{ $row->filename }}.webp" alt="{{$row->filename}}" width="100" height="100">
                            </label>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach
        @foreach( $gallary as $row )
            @if(!isset($product) || !\Illuminate\Support\Str::contains($product->thumb, $row->filename))
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
                    <img class="thumb" src="/generated/images/product/300x300/{{ $row->filename }}.webp" alt="{{$row->filename}}" width="100" height="100">
                    </label>
                </li>
            @endif
        @endforeach
        </ul>
        <script>
            const previousThumbValue = document.querySelector('input[name="thumb"]').value;
            function updateThumbInput() {
                document.querySelectorAll('.thumbnail-selector-input-class').forEach(checkbox => {
                    checkbox.addEventListener('change', () => {
                        let selectedTexts = previousThumbValue + ',';
                        selectedTexts = Array.from(document.querySelectorAll('.thumbnail-selector-input-class'))
                            .filter(checkbox => checkbox.checked)
                            .map(checkbox => checkbox.dataset.txt)
                            .join(',');

                        // Update the value of the pdf input element
                        if (document.querySelector('input[name="thumb"]')) {
                            document.querySelector('input[name="thumb"]').value = selectedTexts;
                        }

                        // Output the concatenated text
                        console.info(selectedTexts);
                    });
                });
            }
            // Get all labels with class "thumbnail-selector-input-class"
            // const labels = document.querySelectorAll('label.thumbnail-selector-label-class');
            //
            // // Function to trigger two clicks on the label
            // function triggerClicks() {
            //     this.click(); // First click
            //     this.click(); // First click
            //     this.click(); // First click
            // }
            //
            // // Attach the triggerClicks function to the click event of each label
            // labels.forEach(label => {
            //     label.addEventListener('click', triggerClicks);
            // });

            setTimeout(function(){
                // Attach the updateThumbInput function to the change event of all input elements
                document.querySelectorAll('input.thumbnail-selector-input-class').forEach(input => {
                    input.addEventListener('change', updateThumbInput);
                });
            }, 300);
        </script>

@endcomponent

@component('components.popup')
    @slot('data','slideshow')
    @slot('style','width:700px;height:480px')
    @slot('option','')
    @slot('title') گالری : {{ isset($product) ? $product->title : 'محصول ذخیره نشده است.' }} @endslot
    @slot('fetch','')
    @slot('type','product')
    @slot('btn','')

        <div class="form-checkbox gallary">
            @if(isset($product))
            @foreach( explode(',',$product->thumb) as $thumb )
                <img class="thumb" src="/images/uploads/picture/product/{{$thumb}}.jpg" alt="{{$product->title}}">
            @endforeach
            @else
                <img class="thumb" src="/assets/lazy/gallary.jpg" alt="lazy-gallay" width="400">
            @endif
        </div>

@endcomponent

@component('components.popup')
    @slot('data','title')
    @slot('style','width:550px;height:250px')
    @slot('option','')
    @slot('title','ادرس محصول')
    @slot('fetch','')
    @slot('type','product')
    @slot('btn','btn-ok-title')

        <div class="form-group relative float-right w-full" data-txt="slug-get">
            <span class="col-5 bold direction-ltr float-left">{{route('home')}}/shop/</span>
            <div class="slug-par relative float-left w-full">
                <input class="slug-get input w-full direction-ltr {{ URL::current() == route('admin.product.create') ? 'create' : '' }}" data-txt="slug-get" placeholder=" ادرس محصول" title="ادرس محصول" value="{{ old('slug', isset($product) ? urldecode($product->slug) : '') }}" data-id="{{ old('title', isset($product) ? $product->id : '') }}" autocomplete="off">

                {{-- <div class="check-url-result">
                    <i class="icn fill ico-ok {{ old('slug', isset($product) ? 'show' : '') }}" style="background-image: url(/icons/check-circle-2.svg);" title="عالی"></i>
                    <i class="icn fill ico-x" style="background-image: url(/icons/x-circle.svg);"  title="مشکل دارد"></i>
                </div> --}}

            </div>
        </div>

@endcomponent

@component('components.popup')
    @slot('data','category')
    @slot('style','width:350px;height:480px')
    @slot('option')
        <a href="{{route('admin.category.product')}}" target="_blank" class="btn btn-update btn-close-popup btn-ok">ویرایش</a>
{{--        <div class="search-filter"><input type="text" class="input-filter" placeholder="جستجو..." autocomplete="off"></div>--}}
    @endslot
    @slot('title','دسته‌بندی‌')
    @slot('fetch','')
    @slot('type','product')
    @slot('btn','btn-ok-category')

    <ul class="treeview cat_list select-checkbox no-ca" style="list-style-type: none;">
    @foreach( cache()->remember('aria.menuWhereTypeIsProductAndParentIsZero', 518400, function () { return \App\Models\Menu::orderBy('sort', 'ASC')->where('type','=','product')->where('parent','=','0')->get(); }) as $row_main )
        <li class="@if( $row_main->class_name == 'hide' ) hidden @endif">
            <input id="idCat{{$row_main->id}}" type="checkbox" class="chkbx-catlist" name="catl[]" @if(isset($product)) @foreach( $categories as $cat) @if ( $cat->menu ) @if ( $cat->menu->parent == '0' && $row_main->id == $cat->menu->id ) {{' checked '}} @endif @endif @endforeach @endif data-txt="{{$row_main->title}}" value="{{$row_main->id}}" autocomplete="off">
            <label title="{{$row_main->title}}" for="idCat{{$row_main->id}}">{{$row_main->title}}</label>
            <ul class="treeview cat_list select-checkbox cat_child children" style="list-style-type: none;">
                @foreach( cache()->remember('aria.menuAll', 518400, function () { return \App\Models\Menu::orderBy('sort', 'ASC')->get(); }) as $row_sub )
                    @if ( $row_sub->parent == $row_main->id )
                        <li class="@if( $row_sub->class_name == 'hide' ) hidden @endif">
                            <input id="idCat{{$row_sub->id}}" type="checkbox" class="chkbx-catlist" name="catl[]" @if(isset($product)) @foreach( $categories as $cat) @if ( $cat->menu ) @if ( $row_sub->id == $cat->menu->id ) {{' checked '}} @endif @endif @endforeach @endif data-txt="{{$row_sub->title}}" value="{{$row_sub->id}}" autocomplete="off">
                            <label title="{{$row_sub->title}}" for="idCat{{$row_sub->id}}">{{$row_sub->title}}</label>
                        </li>
                        <ul class="treeview cat_list select-checkbox cat_child children" style="list-style-type: none;">
                        @foreach( cache()->remember('aria.menuAll', 518400, function () { return \App\Models\Menu::orderBy('sort', 'ASC')->get(); }) as $row_second_sub )
                            @if ( $row_second_sub->parent == $row_sub->id )
                                <li class="@if( $row_second_sub->class_name == 'hide' ) hidden @endif">
                                    <input id="idCat{{$row_second_sub->id}}" type="checkbox" class="chkbx-catlist" name="catl[]" @if(isset($product)) @foreach( $categories as $cat) @if ( $cat->menu ) @if ( $row_second_sub->id == $cat->menu->id ) {{' checked '}} @endif @endif @endforeach @endif data-txt="{{$row_second_sub->title}}" value="{{$row_second_sub->id}}" autocomplete="off">
                                    <label title="{{$row_second_sub->title}}" for="idCat{{$row_second_sub->id}}">{{$row_second_sub->title}}</label>
                                </li>
                                <ul class="treeview cat_list select-checkbox cat_child children" style="list-style-type: none;">
                                    @foreach( cache()->remember('aria.menuAll', 518400, function () { return \App\Models\Menu::orderBy('sort', 'ASC')->get(); }) as $row_third_sub )
                                        @if ( $row_third_sub->parent == $row_second_sub->id )
                                            <li class="@if( $row_third_sub->class_name == 'hide' ) hidden @endif">
                                                <input id="idCat{{$row_third_sub->id}}" type="checkbox" class="chkbx-catlist" name="catl[]" @if(isset($product)) @foreach( $categories as $cat) @if ( $cat->menu ) @if ( $row_third_sub->id == $cat->menu->id ) {{' checked '}} @endif @endif @endforeach @endif data-txt="{{$row_third_sub->title}}" value="{{$row_third_sub->id}}" autocomplete="off">
                                                <label title="{{$row_third_sub->title}}" for="idCat{{$row_third_sub->id}}">{{$row_third_sub->title}}</label>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            @endif
                        @endforeach
                        </ul>
                    @endif
                @endforeach
            </ul>
        </li>
    @endforeach
    </ul>

@endcomponent

@component('components.popup')
    @slot('data','pdf')
    @slot('style','width:350px;height:480px')
    @slot('option')
        <input class="chkbx-selected-list hidden" value="{{ old('pdf', isset($product) ? $product->pdf : '') }}" data-popup="pdf" autocomplete="off">
        <a href="{{route('admin.upload.pdf')}}" target="_blank" class="btn btn-update btn-close-popup btn-ok">آپلود PDF</a>
{{--        <div class="search-filter"><input type="text" class="input-filter" placeholder="جستجو..." autocomplete="off"></div>--}}
    @endslot
    @slot('title','فایل ضمیمه PDF')
    @slot('fetch','scroll')
    @slot('type','product')
    @slot('btn','btn-ok')

    <ul class="treeview list select-checkbox no-ca">
    <li class="hidden checked"></li>
    @foreach( $download_pdf as $row )
        {{-- for new product, $product is empty --}}
        @if(!empty($product) && str_contains($product->pdf, $row->filename))
        <li>
            <input
                id="idPDF{{$row->id}}"
                type="checkbox"
                class="chkbx-list pdf-input-list"
                data-ext="{{$row->ext}}"
                data-popup="pdf"
                name="pdfl[]"
                checked
                data-txt="{{$row->filename}}"
                value="{{$row->id}}"
                autocomplete="off"
            >
            <label title="{{$row->filename . '.' . $row->ext}}" for="idPDF{{$row->id}}">{{ $row->filename . '.' . $row->ext }}</label>
        </li>
        @endif
    @endforeach
    @foreach( $download_pdf as $row )
        {{-- for new product, $product is empty --}}
        @if(empty($product) || !str_contains($product->pdf, $row->filename))
            <li>
                <input
                        id="idPDF{{$row->id}}"
                        type="checkbox"
                        class="chkbx-list pdf-input-list"
                        data-ext="{{$row->ext}}"
                        data-popup="pdf"
                        name="pdfl[]"
                        data-txt="{{$row->filename}}"
                        value="{{$row->id}}"
                        autocomplete="off"
                >
                <label title="{{$row->filename . '.' . $row->ext}}" for="idPDF{{$row->id}}">{{ $row->filename . '.' . $row->ext }}</label>
            </li>
        @endif
    @endforeach
    </ul>
        <script>
            // Add an event listener to each checkbox
            document.querySelectorAll('input.pdf-input-list').forEach(checkbox => {
                checkbox.addEventListener('change', () => {
                    // Filter selected checkboxes and concatenate the data-txt property with a comma
                    const selectedTexts = Array.from(document.querySelectorAll('input.pdf-input-list'))
                        .filter(checkbox => checkbox.checked)
                        .map(checkbox => checkbox.dataset.txt)
                        .join(',');

                    // Update the value of the pdf input element
                    if (document.querySelector('input[name="pdf"]')) {
                        document.querySelector('input[name="pdf"]').value = selectedTexts;
                    }

                    // Output the concatenated text
                    console.log(selectedTexts);
                });
            });
        </script>
@endcomponent

@component('components.popup')
    @slot('data','zip')
    @slot('style','width:350px;height:480px')
    @slot('option')
        <input class="chkbx-selected-list hidden" value="{{ old('zip', isset($product) ? $product->zip : '') }}" data-popup="zip" autocomplete="off">
        <a href="{{route('admin.upload.zip')}}" target="_blank" class="btn btn-update btn-close-popup btn-ok">آپلود ZIP</a>
{{--        <div class="search-filter"><input type="text" class="input-filter" placeholder="جستجو..." autocomplete="off"></div>--}}
    @endslot
    @slot('title','فایل ضمیمه ZIP')
    @slot('fetch','scroll')
    @slot('type','product')
    @slot('btn','btn-ok')
            <ul class="treeview list select-checkbox no-ca">
            <li class="hidden checked"></li>
            @foreach( $download_zip as $row )
                {{-- for new product, $product is empty --}}
                @if(!empty($product) && str_contains($product->zip, $row->filename))
                <li>
                    <input id="idZIP{{$row->id}}" type="checkbox" class="chkbx-list" data-ext="{{$row->ext}}" data-popup="zip" name="zipl[]" checked data-txt="{{$row->filename}}" autocomplete="off">
                    <label title="{{$row->filename . '.' . $row->ext}}" for="idZIP{{$row->id}}">{{ $row->filename . '.' . $row->ext }}</label>
                </li>
                @endif
            @endforeach
            @foreach( $download_zip as $row )
                {{-- for new product, $product is empty --}}
                @if(empty($product) || !str_contains($product->zip, $row->filename))
                <li>
                    <input id="idZIP{{$row->id}}" type="checkbox" class="chkbx-list" data-ext="{{$row->ext}}" data-popup="zip" name="zipl[]" data-txt="{{$row->filename}}" autocomplete="off">
                    <label title="{{$row->filename . '.' . $row->ext}}" for="idZIP{{$row->id}}">{{ $row->filename . '.' . $row->ext }}</label>
                </li>
                @endif
            @endforeach
            </ul>

@endcomponent

{{-- @can('admin_view') --}}
{{-- @component('components.popup') --}}
    {{-- @slot('data','partno') --}}
    {{-- @slot('style','width:550px;height:200px') --}}
    {{-- @slot('option','') --}}
    {{-- @slot('title','پارت نامبر') --}}
    {{-- @slot('btn','btn-ok-part-no') --}}

        {{-- <div class="form-radio form-group-item float-left last w-full select-mid"> --}}
            {{-- <div class="box-wie @isset($product) @if($product->sku == '-') display-none @endif @endisset"> --}}
                {{-- <input class="input sku-number-get typer-get text-center w-full input-wie" name="sku_n" type="text" value="{{ old('sku_n', isset($product) ? $product->sku_n : $sku_first.$sku_n ) }}" autocomplete="off"> --}}
                {{-- <span class="out-box skunumber text-center direction-ltr">P/N: <span class="bold upper span-wie">@if(isset($product)) {{$product->sku_n}} @else - @endif</span></span> --}}
            {{-- </div> --}}
            {{-- <div class="form-checkbox float-right col-12"> --}}
                {{-- <input id="wie" type="checkbox" class="wie" autocomplete="off" @isset($product) @if($product->sku == '-') checked @endif @endisset> --}}
                {{-- <label for="wie" title="بدون پارت نامبر" class="direction-rtl" >بدون پارت نامبر</label> --}}
            {{-- </div> --}}
        {{-- </div> --}}

{{-- @endcomponent --}}
{{-- @endcan  --}}

</div>
