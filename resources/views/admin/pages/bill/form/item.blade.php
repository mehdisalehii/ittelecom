<div class="title">مشخصات کالاها</div>
<div class="box table-w form-type-wetr form-no-enter0">

    <div class="table-o">
        <table>
            <thead>
                <tr>
                    <td style="width:2%">ر</td>
                    <td style="width:30%">شرح کالا</td>
                    <td>پارتنامبر</td>
                    <td>تعداد</td>
                    <td>ابزار</td>
                </tr>
            </thead>
            <tbody class=" @if(isset($bill)) @if($bill->bill_type == 'Commerical') hide-form @endif @endif">

                @php 
                    $i_count = 0;
                    $sum_qty = 0;
                @endphp

                @php if(!isset($BillItem)) { $BillItem = []; } @endphp

                @foreach ( $BillItem as $row_item ) 
                <tr class="li item txtMult li-item{{$i_count}}">

                    <td>{{$i_count+1}}</td>

                    <td class="form-textarea">
                        <textarea name="item[{{$i_count}}][product_name]" class="textarea editor type-text hidden" {{ $row_item->product_name ? 'rows=2' : 'rows=1' }} cols="1" aria-hidden="true" autocomplete="off">{{ old('product_name', isset($row_item) ? $row_item->product_name : '') }}</textarea>
                    </td>

                    <td class="form-input sample">
                        <input name="item[{{$i_count}}][part_no]" class="type-text val2 text-center" autocomplete="off" value="{{ old('part_no', isset($row_item) ? $row_item->part_no : '') }}">
                    </td>

                    <td class="form-input">
                        <input name="item[{{$i_count}}][unit]" class="unit quantity val1 number-comma0 type-text text-center" autocomplete="off" value="{{ old('unit', isset($row_item) ?  $row_item->unit  : '') }}">
                    </td>

                    <td class="tools">
                        @if($i_count > 0)
                            <div class="btn btn-danger btn-delete-row ortr" data-id="{{$i_count}}" data-txt="شماره آیتم {{$i_count+1}}"><i class="icn white" style="background-image: url(/icons/package-x.svg);"></i>حذف آیتم {{$i_count+1}}</div>
                        @endif
                    </td>
                    
                </tr>

                @php 
                    $i_count++;
                    $sum_qty += $row_item->quantity;
                @endphp

                @endforeach

            </tbody>
        
        </table>        
    </div>



    <div class="more-list-btn" data-type="bill">
        @if($i_count < 1)
            {{-- <div class="box-more">مشخصات کالاها</div> --}}
        @endif
        <div class="btn btn-more" title="افزودن کالا"><i class="icn fill" style="background-image: url(/icons/plus-circle.svg);"></i></div>
        <input class="total_number_item hidden" name="total_number_item" value="{{$i_count}}" autocomplete="off">
    </div>


</div>