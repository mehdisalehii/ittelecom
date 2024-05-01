<div class="aria-clearfix"></div>
<div class="tab-content">
    <div class="pan-tabs">
        <ul class="tabs-list">
            <li class="tab btn-t description bold first active" data-id="1">
                <img style="vertical-align:middle" src='/icons/glasses.svg' />
                توضیحات محصول
            </li>
            <li class="tab btn-t detials bold" data-id="2">
                <img style="vertical-align:middle" src='/icons/clipboard-list.svg' />
                مشخصات فنی و تخصصی
            </li>
            <li class="tab btn-t detials bold" data-id="3" style="float:left">
                <img style="vertical-align:middle" src='/icons/rocking-chair.svg' />
                تنظیمات سئو
            </li>
            {{-- <li class="tab btn-t comments bold last" data-id="3" data-id-pro="427" data-x-pro="0">نظرات کاربران</li> --}}
        </ul>
    </div>
    <div class="data tab-content description">
        <div class="content-i data-1 show">
            @if(isset($product)) <h3 class="hidden">{{$product->title}}</h3> @endif
            <div class="form-textarea">
                <textarea name="content" class="textarea editor-content type-text tetwe" autocomplete="off" placeholder="  توضیحات محصول را تایپ کنید ..." title="توضیحات">@if(isset($product)) {!! $product->content !!} @endif</textarea>
            </div>
        </div>
        <div class="content-i data-2">
            @if(isset($product)) <h3 class="hidden">مشخصات فنی {{$product->title}} @endif</h3>
            <div class="form-textarea">
                <textarea name="detials" class="textarea editor-content type-text tetwe" autocomplete="off" placeholder="  مشخصات فنی محصول را تایپ کنید ..." title="مشخصات فنی">@if(isset($product)) {!! $product->detials !!} @endif</textarea>
            </div>
        </div>
        <div class="content-i data-3 option">

            <div class="form-radio form-group-item box gray last">
                <div class="label-txt bold">
                    <div>متا Robots:</div>
                </div>
                <ul class="ul-lists w-dkr">
                    <li class="col-12">
                        <input type="radio" id="index" name="robo" value="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" autocomplete="off" @if(isset($product)) {{ $product->robots != 'noindex,nofollow' ? 'checked="checked"' : '' }} @else {{'checked="checked"'}} @endif>
                        <label title="index , follow" for="index">index , follow</label>
                    </li>
                    <li class="col-12">
                        <input type="radio" id="noindex" name="robo" value="noindex,nofollow" autocomplete="off" @if(isset($product)) {{ $product->robots == 'noindex,nofollow' ? 'checked="checked"' : '' }} @endif>
                        <label title="noindex , nofollow" for="noindex">noindex , nofollow</label>
                    </li>
                </ul>
                <input class="type hidden" type="text" name="robots" autocomplete="off" value="{{ old('robots', isset($product) ? $product->robots : 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1') }}">
            </div>

            <hr>

            <label>متا Description: </label>
            <textarea name="description" class="textarea editor-content type-text tetwe" autocomplete="off"  placeholder="متا توضیحات" title="متا توضیحات">@if(isset($seo_product)) {!! $seo_product->description !!} @endif</textarea>

        </div>
    </div>
</div>
