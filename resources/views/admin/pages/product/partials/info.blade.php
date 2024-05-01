@if(isset($product))
    @if($product->publish == 'draft')
        <div class="panel draft">
            <div class="circ"></div>
            <div class="txt">پیش‌نویس</div>
        </div>
    @endif
@endif
<div class="thumb gallary">
    <div class="figure position-relative">
        <div class="images">
            @if(isset($product))
                @foreach( explode(',',$product->thumb) as $thumb )
                    @if ($loop->first)
                        @if($thumb)
                        <img class="thumb float-right sec-{{$loop->index}}" src="/generated/images/product/340x170/{{$thumb}}.webp" alt="{{$product->title}}" width="400">
                        @else
                        <img class="thumb" src="/assets/lazy/gallary.jpg" alt="lazy-gallay" width="400">
                        @endif
                    @endif
                @endforeach
            @else
                <img class="thumb" src="/assets/lazy/gallary.jpg" alt="lazy-gallay" width="400">
            @endif
        </div>
        <div class="btn-popup btn-photo" data-popup="gallary" title="انتخاب عکس">
            <i class="icn white" style="background-image: url(/icons/camera.svg);"></i>
        </div>
    </div>
    <ul class="sub-thumb sub-gallary list-txt" data-popup="gallary">
    @if(isset($product))
        @foreach( explode(',',$product->thumb) as $thumb )
            @if ($loop->index < 5)
            <li class="thumb-btn sec-{{$loop->index}}">
                @if($thumb)
                    <a onclick="choosePrimaryImageFunction('{{$thumb}}')" href="javascript:void(0)"><img class="thumb-s" src="/generated/images/product/80x80/{{$thumb}}.webp" alt="{{$product->title}}" width="80" height="80"></a>
{{--                <input type="checkbox" class="delete_item" title="حذف" name="delete_item_chkbox" data-popup="gallary" value="{{$thumb}}" checked="checked" data-type="product">--}}
                @else
                <img class="thumb-s" src="/assets/lazy/gallary.jpg" alt="lazy-gallay" width="80" height="80">
                @endif
            </li>
            @else
                @break
            @endif
        @endforeach
    @endif
    </ul>
    <input name="thumb" type="hidden" value="{{ old('thumb', isset($product) ? $product->thumb : '') }}" data-popup="gallary" autocomplete="off">
</div>
<div class="info">
    <div class="title-ht toolbar">
        {{-- <h1 class="title-s">@if(isset($product)) {{$product->title}} @else {{'...عنوان محصول...'}} @endif</h1> --}}
        <div class="form-group relative float-right w-full" data-txt="title-get">
            {{-- <label>عنوان</label> --}}
            <input class="title-get input" name="title" data-txt="title-get" placeholder=" عنوان محصول" title="عنوان محصول" value="{{ old('title', isset($product) ? $product->title : '') }}" data-id="{{ old('title', isset($product) ? $product->id : '') }}" autocomplete="off">
            <div class="address-get direction-ltr">
                <span class="link-input">{{route('home')}}/shop/</span>
                <span class="link-input-get btn-popup {{ URL::current() == route('admin.product.create') ? 'create' : '' }}" data-popup="title" title="ویرایش ادرس محصول">{{ old('slug', isset($product) ? urldecode($product->slug) : 'آدرس محصول') }}</span>
                <span class="result-txt-check"></span>
                <input class="link-slug-get hidden {{ URL::current() == route('admin.product.create') ? 'create' : '' }}" name="slug" data-txt="slug-get" value="{{ old('slug', isset($product) ? $product->slug : '') }}" autocomplete="off">
            </div>
        </div>
        {{-- <div class="btn-popup" data-popup="title" title="ویرایش ادرس محصول"><i style="background-image:url('/icons/settings.svg')"></i></div> --}}
    </div>
    <div class="info-right col-7 col-m-12" style="padding:0; width:100%;">
        <div class="box-pa float-right w-full">
            <div class="float-right">
                <div class="pa-ic">
                    <div class="cio txt"><div class="que">پارت‌نامبر:</div>
                    {{-- <div class="txt extra"> --}}
                    {{-- <h2 class="sku-number-txt">@if(isset($product)) {{$product->sku_n}} @else {{ $sku_first . $sku_n }} @endif</h2> --}}
                        <input class="input sku-number-get typer-get text-center w-full input-wie" name="sku_n" type="text" value="{{ old('sku_n', isset($product) ? $product->sku_n : $sku_first.$sku_n ) }}" autocomplete="off">
                    {{-- </div> --}}
                    </div>
                </div>
            </div>
                {{-- <div class="btn-popup float-right" data-popup="partno" title="ویرایش پارت نامبر"><i style="background-image:url('/icons/pencil.svg')"></i></div>       --}}
                {{-- <input class="sku_n option-input-jqu hidden" name="sku_n" type="text" value="{{ old('sku_n', isset($product) ? $product->sku_n : $sku_first.$sku_n ) }}" autocomplete="off"> --}}
                {{-- <input class="sku_id hidden" type="text" value="{{ old('sku', isset($product) ? $product->sku : $sku_first ) }}" name="sku" autocomplete="off">   --}}
        </div>
        <div class="box-pa category w-full">
            <div class="default float-right">
                <div class="pa-ic" >
                    <div class="cio txt">
                        <div class="que"><b>انتخاب دسته‌بندی:</b></div>
                        <ul class="extra txt catlist-txt">
                        @if(isset($product))
                            @foreach($categories as $cat)
                                @if ($cat->menu)
                                    <li>
                                        {{ $cat->menu->title }}
                                    </li>
                                @endif
                            @endforeach
                        @endif
                        <li>...</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="btn-popup float-right" data-popup="category" title="ویرایش دسته‌بندی"><i style="background-image:url('/icons/pencil.svg')"></i></div>
            {{-- <input name="cat" type="text" value="{{ old('cat', isset($product) ? $product->menu_ids : '') }}" class="hidden catlist-input" autocomplete="off"> --}}
        </div>
        <div class="aria-clearfix"></div>
        <b>برچسب:</b>
        <small>
            با
{{--            ویرگول فارسی--}}
{{--            <strong>(،)</strong>--}}
{{--            یا--}}
            کاما انگلیسی
            <strong>(,)</strong>
            جدا کنید
        </small>
        @php
            $old_tags_string = '';
            if(isset($product)){
                if(!empty($product->tagsTranslated)){
                    foreach($product->tagsTranslated as $tag){
                        $old_tags_string .= $tag->name_translated . ',';
                    }
                }
            }
            $all_tags = \Spatie\Tags\Tag::all();
        @endphp
        <input class="awesomplete" id="awesomplete-input" name="tags" style="" data-multiple value="{{ $old_tags_string }}"/>
        <script>
            var search_terms = [
                @foreach($all_tags as $tag)
                    "{{ $tag->name }}"@if(!$loop->last) , @endif

                @endforeach
            ];
            setTimeout(function () {
                new Awesomplete(document.getElementById('awesomplete-input'), {
                    list: search_terms,
                    filter: function(text, input) {
                        let output = Awesomplete.FILTER_CONTAINS(text, input.match(/[^,]*$/)[0]);
                        console.log('filter', text, input, output);
                        return output;
                    },

                    item: function(text, input) {
                        let output = Awesomplete.ITEM(text, input.match(/[^,]*$/)[0]);
                        console.log('item', text, input, output);
                        return output;
                    },
                    replace: function(text) {
                        var before = this.input.value.match(/^.+,\s*|/)[0];
                        let output = before + text + ", ";
                        this.input.value = output;
                        console.log('replace', text, output);
                    }
                });
            }, 200);
        </script>
        <div class="aria-clearfix"></div>
        <div class="box-pa no-select">
            <div class="box yellow">
                <div class="pa-ic">
                    <i class="icn block fill float-start" style="background-image:url('/icons/verified.svg');"></i>
                    <div class="txt">پشتیبانی ضمانت محصول</div>
                </div>
                <div class="pa-ic">
                    <i class="icn block fill" style="background-image:url('/icons/truck.svg');"></i>
                    <div class="txt">ارسال سریع به سراسر کشور</div>
                </div>
            </div>
        </div>
        <div class="box-pa no-select">
            <div class="box orange big-icn">
                <i class="icn fill" style="background-image: url(/icons/fcc.svg);"></i>
                <i class="icn fill" style="background-image: url(/icons/ce.svg);"></i>
                <i class="icn fill" style="background-image: url(/icons/rohs.svg);"></i>
            </div>
        </div>
        <div class="clear"></div>
        <div class="box-pa attach">
            <div class="float-right">
                فایل ضمیمه:
            </div>
            <div class="btn-popup float-right" data-popup="pdf" title="ویرایش فایل PDF"><i style="background-image:url('/icons/pencil.svg')"></i></div>
            <input name="pdf" type="hidden" value="{{ old('pdf', isset($product) ? $product->pdf : '') }}" data-popup="pdf" autocomplete="off">
            <div class="aria-clearfix"></div>
            @if(isset($product))
                @if($product->pdf)
                    <div class="bold list-txt" data-popup="pdf">
                    @foreach( explode(',', $product->pdf) as $item )
                        <div class="txt">
                            <span>{{$item}}.pdf</span>
{{--                            <input type="checkbox" class="delete_item" title="حذف" name="delete_item_chkbox" data-popup="pdf" value="{{$item}}" checked="checked">--}}
                        </div>
                    @endforeach
                    </div>
                @else
                    <div class="txt bold list-txt" data-popup="pdf">فایل ضمیمه PDF اضافه نشده.</div>
                @endif
            @else
                <div class="txt bold list-txt" data-popup="pdf">فایل ضمیمه PDF اضافه نشده.</div>
            @endif
            <div class="aria-clearfix"></div>
        </div>
{{--            <div class="box-pa attach">--}}
{{--                <i class="icn fill" style="background-image: url(/icons/paperclip.svg);"></i>--}}
{{--            @if(isset($product))--}}
{{--                @if($product->zip)--}}
{{--                    <div class="bold list-txt" data-popup="zip">--}}
{{--                    @foreach( explode(',',$product->zip) as $item )--}}
{{--                        <div class="txt">--}}
{{--                            <span>{{$item}}.zip</span>--}}
{{--                            <input type="checkbox" class="delete_item" title="حذف" name="delete_item_chkbox" data-popup="zip" value="{{$item}}" checked="checked">--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                    </div>--}}
{{--                @else--}}
{{--                    <div class="txt bold list-txt" data-popup="zip">فایل ضمیمه ZIP اضافه نشده.</div>--}}
{{--                @endif--}}
{{--            @else--}}
{{--                <div class="txt bold list-txt" data-popup="zip">فایل ضمیمه ZIP اضافه نشده.</div>--}}
{{--            @endif--}}
{{--                <div class="btn-popup" data-popup="zip" title="ویرایش فایل ZIP"><i style="background-image:url('/icons/pencil.svg')"></i></div>--}}
{{--                <input name="zip" type="hidden" value="{{ old('zip', isset($product) ? $product->zip : '') }}" data-popup="zip" autocomplete="off">--}}
{{--            </div>--}}
    </div>
    <div class="aria-clearfix"></div>
    <br/>
    <div class="form-db col-5 col-m-12">
        <div class="box-sdew">
            <div class="form-radio form-group-item box blue last">
                <div class="label-txt bold">
                    <div>وضعیت:</div>
                </div>
                <ul class="ul-lists w-dkr">
                    <li class="col-12">
                        <input type="radio" id="publish" name="publ" value="on" autocomplete="off" @if(isset($product)) {{ $product->publish == 'on' ? 'checked="checked"' : '' }} @endif>
                        <label title="انتشار" for="publish">انتشار</label>
                    </li>
                    <li class="col-12">
                        <input type="radio" id="draft" name="publ" value="draft" autocomplete="off" @if(isset($product)) {{ $product->publish == 'draft' ? 'checked="checked"' : '' }} @else {{'checked="checked"'}} @endif>
                        <label title="پیش‌نویس" for="draft">پیش‌نویس</label>
                    </li>
                </ul>
                <input class="type hidden" type="text" name="publish" autocomplete="off" value="{{ old('publish', isset($product) ? $product->publish : 'draft') }}">
            </div>
         </div>
    </div>
    <div class="aria-clearfix"></div>
    <br/>
</div>
