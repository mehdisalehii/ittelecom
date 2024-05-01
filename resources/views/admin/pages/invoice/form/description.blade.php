<div class="form-word panel-btn-side right box form-type-wetr form-no-enter">
    <div class="form-textarea">
        <label class="txt @if(isset($invoice)) @if($invoice->description) active @endif @endif">توضیحات</label>
        <div class="textarea-form">
            <textarea name="description" class="textarea editor type-text hidden" rows="5" cols="1" autocomplete="off">{{$invoice->description ?? ''}}</textarea>
        </div>
    </div>
</div>