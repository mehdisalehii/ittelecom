@if ($message = Session::get('success'))
    <div class="result-upload">

        @if($type == 'post')
            <img src="{{ '/images/uploads/picture/post' }}/{{ Session::get('file') }}" width=800>
        @endif

        @if($type == 'product')
            <img src="{{ '/images/uploads/picture/product' }}/{{ Session::get('file') }}" width=800>
        @endif

        <div class="txt">
            <span class="bold">نام فایل اپلود شده:</span> 
            <span>{{ Session::get('file') }}</span>
        </div>
        <div class="txt">
            <span class="bold">اندازه فایل اپلود شده:</span> 
            @if( Session::get('size') >= 1048576 )
                <span>{{  number_format( Session::get('size') / 1048576,2)  }} مگابایت</span>
            @elseif( Session::get('size') >= 1024 )
                <span>{{  number_format( Session::get('size') / 1024,2)  }} کیلوبایت</span>
            @else
                <span>{{  Session::get('size') }} بایت</span>
            @endif
        </div>
        <div class="txt">
            <span class="bold">آدرس فایل:</span> 
            <span>

                @if($type == 'post')
                    <a target="_blank" href="{{ '/images/uploads/picture/post' }}/{{ Session::get('file') }}?w=orginal&h=orginal">{{ route('home') }}{{ '/images/uploads/picture/post' }}/{{ Session::get('file') }}</a>
                @endif

                @if($type == 'product')
                    <a target="_blank" href="{{ '/images/uploads/picture/product' }}/{{ Session::get('file') }}?w=orginal&h=orginal">{{ route('home') }}{{ '/images/uploads/picture/product' }}/{{ Session::get('file') }}</a>
                @endif

                @if($type == 'pdf')
                    <a target="_blank" href="{{ config('path.download.pdf') }}/{{ Session::get('file') }}">{{ route('home') }}{{ config('path.download.pdf') }}/{{ Session::get('file') }}</a>
                @endif

                @if($type == 'zip')
                    <a target="_blank" href="{{ config('path.download.zip') }}/{{ Session::get('file') }}">{{ route('home') }}{{ config('path.download.zip') }}/{{ Session::get('file') }}</a>
                @endif

            </span>
        </div>
    </div>
@endif