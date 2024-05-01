<div class="uls items">
@php $i_count = 0; @endphp
@isset($datasheet_items)
    @foreach ( $datasheet_items as $row_item ) 
    <section class="card lis item head form-editor hidden direction" data-id="{{$loop->index+2}}" data-dir="ltr" style="margin: 0 0 20px 0;">
        <div class="panel">
            <div class="tab-content">
                <div class="pan-tabs">
                    <ul class="tabs-list">
                        <li class="tab descr first active">
                            <i class="icn fill" style="background-image: url(/icons/glasses.svg);"></i>
                            توضیحات دیتاشیت (صفحه <span class="no-page">{{$loop->index+2}}</span>)
                        </li>

                        <li class="tab" style="float:left">
                            <button class="btn btn-danger delete-page" data-id="{{$loop->index+2}}">
                                <i class="icn block white" style="background-image:url('/icons/x.svg');"></i>حذف صفحه (صفحه <span class="no-page">{{$loop->index+2}}</span>)
                            </button>
                        </li>



                    </ul>
                </div>
                <div class="data tab-content description">
                    <div class="content-i data-1 show">
                        <div class="form-textarea">
                            <textarea name="item[{{$i_count}}][description]" class="textarea editor-content type-text tetwe" autocomplete="off" placeholder="  توضیحات دیتاشیت را تایپ کنید ..." title="توضیحات">
                                {!! $row_item->description !!} 
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        @php 
            $i_count++;
        @endphp
    @endforeach
@endisset
</div>

<input class="total_number_item hidden" name="total_number_item" value="{{$i_count}}" autocomplete="off">

<section class="card form-editor hidden" style="margin: 0 0 20px 0;">
    <div class="btn btn-success panel add-page">
    <i class="icn block white" style="background-image:url('/icons/plus-circle.svg');"></i>
    اضافه کردن صفحه</div>
</section>