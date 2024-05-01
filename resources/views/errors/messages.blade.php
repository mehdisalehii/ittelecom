@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
         <p><i class="icn white" style="background-image: url(/icons/alert-octagon.svg);"></i>{{ $error }}</p>
         @endforeach
    </div>
@endif

@if (Session::has('success'))
    <div class="alert page-black hide"></div>
    <div class="alert alert-success fixed-pos hide">

        <div class="sw-icon sw-success sw-icon-show">
            <div class="sw-success-circular-line-left"></div>
            <span class="sw-success-line-tip"></span> <span class="sw-success-line-long"></span>
            <div class="sw-success-ring"></div>
            <div class="sw-success-fix"></div>
            <div class="sw-success-circular-line-right"></div>
        </div>

        <p><i class="icn white" style="background-image: url(/icons/check.svg);"></i>{{ Session::get('success') }}</p>
        <div class="progress-bar" id="progress-bar"></div>
    </div>
@endif

@if (Session::has('delete'))
    <div class="alert page-black hide"></div>
    <div class="alert alert-success fixed-pos hide">

        <div class="sw-icon sw-warning sw-icon-show">
            <div class="sw-icon-content">!</div>
        </div>

        <p><i class="icn white" style="background-image: url(/icons/check.svg);"></i>{{ Session::get('delete') }}</p>
        <div class="progress-bar" id="progress-bar"></div>
    </div>
@endif

@if (Session::has('error'))
    <div class="alert page-black hide"></div>
    <div class="alert alert-danger fixed-pos hide">
        <p><i class="icn white" style="background-image: url(/icons/alert-octagon.svg);"></i>{{ Session::get('error') }}</p>
        <div class="progress-bar" id="progress-bar"></div>
    </div>
@endif

@if (Session::has('logined'))
    <div class="alert page-black hide"></div>
    <div class="alert alert-check fixed-pos login hide">
        <p><i class="icn" style="background-image: url(/icons/shield-check.svg);"></i>{{ Session::get('logined') }}</p>
        <div class="progress-bar" id="progress-bar"></div>
    </div>
@endif

@if (Session::has('wrong'))
    <div class="alert alert-error">
        <p><i class="icn white" style="background-image: url(/icons/shield-close.svg);"></i>{{ Session::get('wrong') }}</p>
        <div class="progress-bar" id="progress-bar"></div>
    </div>
@endif

{{-- <div class="sw-icon sw-error sw-icon-show">
    <span class="sw-x-mark">
        <span class="sw-x-mark-line-left"></span>
        <span class="sw-x-mark-line-right"></span>
    </span>
</div> --}}

{{-- <div class="sw-icon sw-warning sw-icon-show">
    <div class="sw-icon-content">!</div>
</div>

<div class="sw-icon sw-question sw-icon-show">
    <div class="sw-icon-content">?</div>
</div> --}}