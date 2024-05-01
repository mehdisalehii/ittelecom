<div class="title">مشخصات کالاها</div>
<div class="box table-w form-type-wetr form-no-enter">

    <div class="table-o">
        <table>
            <thead>
                <tr>
                    <td style="width:2%">ر</td>
                    <td style="width:30%">کالا</td>
                    <td>پارتنامبر</td>
                    <td>تعداد</td>
                    <td>مبلغ</td>
                    <td>واحد</td>
                    <td>مبلغ واحد</td>
                    <td>ابزار</td>
                </tr>
            </thead>
            <tbody class=" @if(isset($invoice)) @if($invoice->invoice_type == 'Commerical') hide-form @endif @endif">

                @php 
                    $i_count = 0;
                    $sum_qty = 0;
                @endphp

                @php if(!isset($InvoiceItem)) { $InvoiceItem = []; } @endphp

                @foreach ( $InvoiceItem as $row_item ) 
                <tr class="li item txtMult li-item{{$i_count}}">

                    <td>{{$i_count+1}}</td>

                    <td class="form-textarea">
                        <textarea name="item[{{$i_count}}][product_name]" class="textarea editor type-text hidden" {{ $row_item->product_name ? 'rows=2' : 'rows=1' }} cols="1" aria-hidden="true" autocomplete="off">{{ old('product_name', isset($row_item) ? $row_item->product_name : '') }}</textarea>
                    </td>

                    <td class="form-input sample">
                        <input name="item[{{$i_count}}][part_no]" class="type-text text-center" autocomplete="off" value="{{ old('part_no', isset($row_item) ? $row_item->part_no : '') }}">
                    </td>

                    <td class="form-input">
                        <input name="item[{{$i_count}}][quantity]" class="quantity val1 number-comma type-text text-center" autocomplete="off" value="{{ old('quantity', isset($row_item) ? number_format ( $row_item->quantity ,0,'', ',') : '') }}">
                    </td>

                    <td class="form-input">
                        <input name="item[{{$i_count}}][price]" class="price val2 number-comma type-text text-center" autocomplete="off" value="{{ old('price', isset($row_item) ? number_format ( $row_item->price ,0,'', ',') : '') }}">
                    </td>

                    <td class="select-option">
                        <select name="unit{{$i_count}}" autocomplete="off" class="change_select">
                            <option id="unit{{$i_count}}_2" {{ $row_item->unit == 'لینک' ? 'selected' : '' }}>لینک</option>
                            <option id="unit{{$i_count}}_1" {{ $row_item->unit == 'دستگاه' ? 'selected' : '' }}>دستگاه</option>
                            <option id="unit{{$i_count}}_3" {{ $row_item->unit == 'بسته' ? 'selected' : '' }}>بسته</option>
                            <option id="unit{{$i_count}}_4" {{ $row_item->unit == 'عدد' ? 'selected' : '' }}>عدد</option>
                            <option id="unit{{$i_count}}_5" {{ $row_item->unit == 'قطعه' ? 'selected' : '' }}>قطعه</option>
                            <option id="unit{{$i_count}}_6" {{ $row_item->unit == 'متر' ? 'selected' : '' }}>متر</option>
                        </select>
                        <input name="item[{{$i_count}}][unit]" class="type hidden" type="text" value="{{$row_item->unit}}" autocomplete="off">
                    </td>

                    <td class="multTotal">
                        {{ number_format ( $row_item->quantity * $row_item->price ,0,'',',') }}
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



    <div class="more-list-btn" data-type="invoice">
        @if($i_count < 1)
            {{-- <div class="box-more">مشخصات کالاها</div> --}}
        @endif
        <div class="btn btn-more" title="افزودن کالا"><i class="icn fill" style="background-image: url(/icons/plus-circle.svg);"></i></div>
        <input class="total_number_item hidden" name="total_number_item" value="{{$i_count}}" autocomplete="off">
    </div>


</div>