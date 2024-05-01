<div class="ind-lef rrtr">
    <div class="box-pa">
            {{-- <i class="icn fill" style="background-image: url(/icons/locate-fixed.svg);"></i> --}}
            پارت نامبر:
            <h2 class="sku-number-txt">@if(isset($datasheet)) {{$datasheet->sku}} @else {{ $sku_n }} @endif</h2>
            <div class="btn-popup" data-popup="partno" title="ویرایش پارت نامبر"><i style="background-image:url('/icons/pencil.svg')"></i></div>
    </div>
</div>