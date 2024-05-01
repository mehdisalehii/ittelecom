@if ($url_fetch == 'pdf' )
    @foreach ($downloads_pdf as $download)
    <li class="content-ma display-flex lid">
        <div class="col-4"><a href="{{  config('path.download.pdf'). $download->filename .'.'. $download->ext }}" target="_blank">{{ $download->filename .'.'. $download->ext }}</a></div>
        <div class="col-6">
            @foreach ( $products as $product )
                @foreach ( explode(',',$product->pdf) as $item )
                    @if( $item == $download->filename )
                        <span class="blue text-white link"><a href="{{ '/shop'  .'/'. $product->slug }}">{{ $product->title }}</a></span>
                    @endif
                @endforeach
            @endforeach
        </div>
        <div class="col-2">
            <a class="btn btn-update text-white" target="_blank" href="{{  config('path.download.pdf'). $download->filename .'.'. $download->ext }}" title="پیش نمایش"><i class="icn white" style="background-image: url(/icons/eye.svg);"></i></a>
        </div>
    </li>
    @endforeach
@endif
