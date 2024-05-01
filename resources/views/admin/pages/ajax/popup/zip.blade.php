@if ( $data_popup == 'zip' )
    @if ( $data_type = 'product'  )
    @foreach( \App\Models\Download::where('type','=','zip')->orderBy('id', 'DESC')->skip( $data_start )->take( $limit )->get(); as $row )
        <li>
            <input id="idZIP{{$row->id}}" type="checkbox" class="chkbx-list" data-ext="{{$row->ext}}" data-popup="zip" name="zipl[]" @if(isset($product)) @foreach(explode(",", $product->zip) as $split_zip) @if( $row->filename == $split_zip ) {{' checked '}} @endif @endforeach @endif data-txt="{{$row->filename}}" autocomplete="off">
            <label title="{{$row->filename . '.' . $row->ext}}" for="idZIP{{$row->id}}">{{  \Illuminate\Support\Str::limit( $row->filename ,30). '.' . $row->ext}}</label>
        </li>
    @endforeach 
    @endif
@endif