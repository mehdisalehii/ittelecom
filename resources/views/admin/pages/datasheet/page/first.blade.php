<section class="card form-editor hidden">
    @include('errors.messages')
    <div class="panel">

        <div class="info-h">
            @include('admin.pages.datasheet.partials.title')
            @include('admin.pages.datasheet.partials.sku')
        </div>

        <div class="tab-content">
            <div class="pan-tabs">
                <ul class="tabs-list">
                    <li class="tab btn-t-0 description bold first active">
                        <i class="icn fill" style="background-image: url(/icons/glasses.svg);"></i>
                        توضیحات دیتاشیت (صفحه <span class="no-page">1</span>)
                    </li>
                </ul>
            </div>

            <div class="flex float-right">

                <div class="features w-1/2 p-2">
                    <div class="box blue desc border border-slate-300">
                        <span class="tile bold" style="color:rgb(51, 102, 205);margin-bottom: 10px;">ویژگی‌ها</span>
                        <div class="form-textarea0 direction" data-dir="ltr">
                            <textarea name="features" class="tegxtarea editor-content type-text hidden" autocomplete="off" placeholder="  ویژگی‌های دیتاشیت را تایپ کنید ..." title="ویژگی‌ها">@if(isset($datasheet)) {!! $datasheet->features !!} @endif</textarea>
                        </div>
                    </div>
                </div>

                <div class="gallary-vb w-1/2 p-2">
                    @include('admin.pages.datasheet.partials.gallary')
                </div>

            </div>

            <div class="data tab-content description ">
                <div class="content-i data-1 show">
                    <div class="form-textarea">
                        <textarea name="content" class="texftarea editor-content type-text hidden" autocomplete="off" placeholder="  توضیحات دیتاشیت را تایپ کنید ..." title="توضیحات">@if(isset($datasheet)) {!! $datasheet->content !!} @endif</textarea>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>
