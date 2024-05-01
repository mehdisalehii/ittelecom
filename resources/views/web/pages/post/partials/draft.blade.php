@if(isset($post))
    @if($post->publish == 'draft')
        <div class="panel draft">
            <div class="circ"></div>
            <div class="txt">پیش‌نویس</div>
        </div>
    @endif
@endif
