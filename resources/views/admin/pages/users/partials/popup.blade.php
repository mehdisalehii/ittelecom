@component('components.popup')
    @slot('data','password')
    @slot('style','width:350px;height:180px')
    @slot('option')
        <div class="btn btn-update btn-password-generate">تولید</div>
        <div class="btn btn-success btn-close-popup btn-copy-generate hidden" data-type="product" data-popup="gallary">کپی</div>
    @endslot
    @slot('title','تولید رمز تصادفی')
    @slot('fetch','')
    @slot('type','password')
    @slot('btn','')

    <input type="text" name="" class="input input-password-generate" readonly autocomplete="off">

@endcomponent