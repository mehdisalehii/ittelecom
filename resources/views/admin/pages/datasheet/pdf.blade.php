<!DOCTYPE html>
<html>
<head>
<title>Datasheet | {{ $datasheets->sku ? strtoupper( $datasheets->sku_n ) . ' |'  : '' }} {{$datasheets->title ? ucwords($datasheets->title) : 'Untitled'}} | {{ 'ittelecom' }}</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>
    @page{
        /* size: 8.5in 11in;  <length>{1,2} | auto | portrait | landscape */
	    /* 'em' 'ex' and % are not allowed; length values are width height */
        header: page-header;
        footer: page-footer;
        margin-header: 0mm; /* <any of the usual CSS values for margins> */
	    margin-footer: 0mm; /* <any of the usual CSS values for margins> */
        margin-top: 2.1cm;
        margin-bottom: 1.5cm;
        margin-left: 0cm;
        margin-right: 0cm;
    }
    @page landscape {
        size: landscape;
    }
    body{direction:ltr}
    .text-right{text-align:right}
    .text-center{text-align:center}
    .text-justify{text-align:justify}
    .text-left{text-align:left}
    .float-right{float:right}
    .float-left{float:left}
    .col-1{width:100%}
    .col-1-1{width:75%}
    .col-1-2{width:66.66%}
    .col-1-3{width:60%}
    .col-1-4{width:55%}
    .col-1-5{width:51.99%}
    .col-2{width:50%}
    .col-2-1{width:45%}
    .col-3{width:33.33%}
    .col-4{width:25%}
    .col-4-1{width:23%}
    .col-5{width:20%}
    .col-6{width:16.66%}
    .col-7{width:14.28%}
    .col-8{width:12.5%}
    .col-9{width:11.11%}
    .col-10{width:10%}
    .col-11{width:9.09%}
    .h1{font-size:1.27rem;font-weight: bold;}
    .border{border:1px solid #000}
    .border-blue{border:1px solid #7fb392;border-radius:7px;}
    .red{color:red}
    .padd-15{padding:0 5px}
    .width-auto{width:auto}
    .bold{font-weight:bold;}
    .border-content{background:#fff;border:2px solid #7fb392;border-radius:7px;margin-bottom:3px}
    .border-left{border-left:2px solid #7fb392;}
    .border-top{border-top:2px solid #7fb392;}
    .border-bottom{border-bottom:2px solid #7fb392;}
    ol,ul,li{margin:0;padding:0;list-style-type:U+02022rgb(255,0,0);} 
    /* Unicode HEX value of the character : list-style-type:U+263Argb(255,0,0); */
    ul li{padding:0 10px}
    header{padding:0}
    main{padding:0 20px}
    table{border-collapse: collapse;}
    table,th,td{border:1px solid #eee;background: #fff}
    td{padding:0}
</style>
</head>
<body>
<htmlpageheader name="page-header">
    <div class="col-12" style="margin:0;padding-top:20px;padding-left:240px;position:relative;z-index:1;">
        <div class="col-1 h1 bold" style="line-height:20px">
            <span>{{ $datasheets->title ? ucwords($datasheets->title) : 'Untitled' }}</span>
        </div>
        <div class="col-3 bold" style="padding-right:20px;text-transform:uppercase;">
            <span>{{ $datasheets->sku ? 'P/N: ' . $datasheets->sku_n : '' }}</span>
        </div>
    </div>
</htmlpageheader>
<htmlpagefooter name="page-footer">
    <div class="text-right col-1" style="padding:0px;margin-top:-35px;padding-right:20px;color:#3c444d;font-size:12px;position: relative;z-index: 2;font-family:sans-serif;">
        <span><b>Web: </b>{{ route('home') }}</span>
        <span> | <b>Email: </b>sale@ittelecom.ir</span>
        <span style="margin-right:1500px;"> | <b>Skype: </b>ittelecomco</span>
        <span class="bold"> | {PAGENO}/{nbpg}</span>
    </div>
    <img src="{{ resource_path('/datasheet/watermark'.'/0.svg') }}" width="1000%" style="margin:-10px -20px 0px 0px;position: relative;z-index: 0">
</htmlpagefooter>
<pagebreak page-selector="portrait">
    <header style="margin-left:60px;margin-top:10px;">
        <div class="col-1" style="padding:0">
            <div class="col-2" style="padding:0px">
                @php 
                    $gallary = $datasheets->thumb;
                    $gallary = str_replace('src="'. route('home') .'/images/uploads/picture/', 'src="'. storage_path() . '/uploads/picture/' , $gallary);
                    $gallary = str_replace('src="/images/uploads/picture/', 'src="'. storage_path() . '/uploads/picture/' , $gallary);
                    $gallary = str_replace('src="'. route('home') .'/files/uploads/picture/', 'src="'. storage_path() . '/uploads/picture/' , $gallary);
                    $gallary = str_replace('src="/files/uploads/picture/', 'src="'. storage_path() . '/uploads/picture/' , $gallary);
                @endphp
                {!! $gallary !!}

            </div> 
            @if ($datasheets->features)
            <div class="col-2-1 float-right" style="background:#deebf7;padding:15px;border-radius:10px 0 0 10px;margin-top:0px;">
                <div class="bold" style="color:rgb(51, 102, 205);position:relative;z-index:1000;">Features:</div>

                @php 
                    $feature = $datasheets->features;
                    $feature = str_replace('src="'. route('home') .'/images/uploads/picture/', 'src="'. storage_path() . '/uploads/picture/' , $feature);
                    $feature = str_replace('src="/images/uploads/picture/', 'src="'. storage_path() . '/uploads/picture/' , $feature);
                    $feature = str_replace('src="'. route('home') .'/files/uploads/picture/', 'src="'. storage_path() . '/uploads/picture/' , $feature);
                    $feature = str_replace('src="/files/uploads/picture/', 'src="'. storage_path() . '/uploads/picture/' , $feature);
                @endphp

                <div style="padding:0 1px 0 10px;">{!! $feature !!}</div>
            </div>
            @endif
        </div>
    </header>
    <main style="margin-left:20px;">
        <div class="col-1" style="padding:5px 15px;line-height:25px;">
            <div>
            @php 
                $content = $datasheets->content;
                $content = str_replace( '：', ':' , $content);
                $content = str_replace( '（', '(' , $content);
                $content = str_replace( '）', ')' , $content);
                $content = str_replace( array('，','、'), ',' , $content);
                $content = str_replace( '；', ';' , $content);
                $content = str_replace( '～', '~' , $content);
                $content = str_replace( 'border="0"', 'border="1"' , $content);
                $content = str_replace('src="'. route('home') .'/images/uploads/picture/', 'src="'. storage_path() . '/uploads/picture/' , $content);
                $content = str_replace('src="/images/uploads/picture/', 'src="'. storage_path() . '/uploads/picture/' , $content);
                $content = str_replace('src="'. route('home') .'/files/uploads/picture/', 'src="'. storage_path() . '/uploads/picture/' , $content);
                $content = str_replace('src="/files/uploads/picture/', 'src="'. storage_path() . '/uploads/picture/' , $content);
            @endphp
                {!! $content !!}
            </div>
        </div>
    </main>
</pagebreak>

@foreach ( $datasheet_items as $row_item ) 
<pagebreak>
<main style="margin-left:20px;">
    <div class="col-1" style="padding:5px 15px;line-height:25px;">
        <div>
        @php 
            $content = $row_item->description;
            $content = str_replace( '：', ':' , $content);
            $content = str_replace( '（', '(' , $content);
            $content = str_replace( '）', ')' , $content);
            $content = str_replace( array('，','、'), ',' , $content);
            $content = str_replace( '；', ';' , $content);
            $content = str_replace( '～', '~' , $content);
            $content = str_replace( 'border="0"', 'border="1"' , $content);
            $content = str_replace('src="'. route('home') .'/images/uploads/picture/', 'src="'. storage_path() . '/uploads/picture/' , $content);
            $content = str_replace('src="/images/uploads/picture/', 'src="'. storage_path() . '/uploads/picture/' , $content);
            $content = str_replace('src="'. route('home') .'/files/uploads/picture/', 'src="'. storage_path() . '/uploads/picture/' , $content);
            $content = str_replace('src="/files/uploads/picture/', 'src="'. storage_path() . '/uploads/picture/' , $content);
        @endphp
            {!! $content !!}
        </div>
    </div>
</main>
</pagebreak>
@endforeach

</body>
</html>