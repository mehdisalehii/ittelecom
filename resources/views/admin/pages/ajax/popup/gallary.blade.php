@if ( $data_popup == 'gallary' )

    @if ( $data_type == 'product'  )
        @foreach( \App\Models\Download::where('type','=','product')->where(function($query) { $query->where('ext','=','jpg')->orWhere('ext', '=', 'jpeg'); })->orderBy('id', 'DESC')->skip( $data_start )->take( $limit )->get(); as $row )
            <li class="col-3">
                <input id="idThumb{{$row->id}}" type="checkbox" class="chkbx-list thumbnail-selector-input-class" data-ext="{{$row->ext}}" data-popup="gallary" name="thumbl[]" data-txt="{{$row->filename}}" @if(isset($product)) @foreach(explode(",", $product->thumb) as $split_thumb) @if( $row->filename == $split_thumb ) {{' checked '}} @endif @endforeach @endif value="{{$row->filename}}" autocomplete="off">
                <label title="{{$row->filename . '.' . $row->ext}}" for="idThumb{{$row->id}}" class="thumbnail-selector-label-class">
                <img class="thumb" src="{{ '/images/uploads/picture/product' .'/'. $row->filename . '.' . $row->ext }}" alt="{{$row->filename . '.' . $row->ext}}" width="100" height="100">
                </label>
            </li>
        @endforeach
    @endif

    @if ( $data_type == 'post'  )
        @foreach( \App\Models\Download::where('type','=','post')->where(function($query) { $query->where('ext','=','jpg')->orWhere('ext', '=', 'jpeg'); })->orderBy('id', 'DESC')->skip( $data_start )->take( $limit )->get(); as $row )
            <li class="col-3">
                <input id="idThumb{{$row->id}}" type="checkbox" class="chkbx-list thumbnail-selector-input-class" data-ext="{{$row->ext}}" data-popup="gallary" name="thumbl[]" data-txt="{{$row->filename}}" @if(isset($post)) @foreach(explode(",", $post->thumb) as $split_thumb) @if( $row->filename == $split_thumb ) {{' checked '}} @endif @endforeach @endif value="{{$row->filename}}" autocomplete="off">
                <label title="{{$row->filename . '.' . $row->ext}}" for="idThumb{{$row->id}}" class="thumbnail-selector-label-class">
                <img class="thumb" src="{{ '/images/uploads/picture/post' .'/'. $row->filename . '.' . $row->ext }}" alt="{{$row->filename . '.' . $row->ext}}" width="100" height="100">
                </label>
            </li>
        @endforeach
    @endif

@endif
