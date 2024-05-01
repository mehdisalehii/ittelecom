<div class="popup hide" data-popup="{{ $data }}" style="{{ $style }}">

    <div class="header bold">
        {{ $title }} 
        <div class="btn btn-danger btn-close-popup btn-close-abs">بستن</div>
    </div>

    <div class="body" data-popup="{{ $data }}" data-type="{{ $type }}" data-fetch="{{ $fetch }}" data-str="0" data-limit="20">
        {{ $slot }}
    </div>

    <div class="footer">
        @if ($btn)
        <div class="btn btn-success btn-close-popup {{ $btn }}" data-popup="{{ $data }}">قبول</div>
        @endif
        {{ $option }}
    </div>
    
</div>

{{-- @component('components.popup')
    @slot('data') title @endslot
    @slot('style') width:550px;height:480px @endslot
    @slot('option') @endslot
    @slot('title') Success Message @endslot

    This is a success message, just for testing purpose.

@endcomponent --}}