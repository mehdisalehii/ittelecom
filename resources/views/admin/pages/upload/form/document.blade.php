<div class="holder gray">
    <label for="upload" class="upload-btn filename_button">آپلود فایل</label>
    <input type="file" class=" hidden form-control-file custom_file upload-select" id="upload" name="file">
    <label for="file_default">
    @switch($type)
        @case('post') فایل عکس (انداره عکس : 400*800) انتخاب نشده است. (jpg , jpeg , png , gif) @break
        @case('product') فایل عکس محصول (انداره عکس : 1080*1080) انتخاب نشده است. (jpg , jpeg) @break
        @case('pdf') فایل PDF انتخاب نشده است.  @break
        @case('zip') فایل ZIP انتخاب نشده است. @break
        @default -
    @endswitch
    حداکثر حجم فایل: {{ $limit }}
    </label>
    <label for="file_name"><b></b></label>
    <label for="file_size"><b></b></label>
    <button type="submit" class="btn btn-success upload-start hidden">شروع آپلود</button>
</div>