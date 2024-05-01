<div class="form-word panel-btn-side right box form-type-wetr form-no-enter0">
    <div class="form-textarea">
        <label class="txt @if(isset($bill)) @if($bill->description) active @endif @endif">توضیحات</label>
        <textarea name="description" class="textarea editor type-text hidden" rows="5" cols="1" autocomplete="off">{{$bill->description ?? ''}}</textarea>
    </div>
</div>