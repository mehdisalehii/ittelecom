@if ( $data_popup == 'pdf' )
    @if ( $data_type = 'product'  )

        @foreach( \App\Models\Download::where('type','=','pdf')->orderBy('id', 'DESC')->skip( $data_start )->take( $limit )->get(); as $row )
            <li>
                <input id="idPDF{{$row->id}}" type="checkbox" class="chkbx-list pdf-input-list" data-ext="{{$row->ext}}" data-popup="pdf" name="pdfl[]" @if(isset($product)) @foreach(explode(",", $product->pdf) as $split_pdf) @if( $row->filename == $split_pdf ) {{' checked '}} @endif @endforeach @endif data-txt="{{$row->filename}}" value="{{$row->id}}" autocomplete="off">
                <label title="{{$row->filename . '.' . $row->ext}}" for="idPDF{{$row->id}}">{{  \Illuminate\Support\Str::limit( $row->filename ,30). '.' . $row->ext}}</label>
            </li>
        @endforeach

    @endif
@endif


{{-- data_{{$data}} -
type_{{$data_type}} -
start:{{$data_start}} -
limit:{{$data_limit}} -
popup_{{$data_popup}}
<br> --}}

