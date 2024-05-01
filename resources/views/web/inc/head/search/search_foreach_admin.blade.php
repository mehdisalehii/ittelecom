@foreach($keyword_invoices as $invoice)
    <li>
        <a class="block" href="/admin/invoice/{{$invoice->id}}/edit">
            <i class="icn block icon fill" style="background-image:url('/icons/clipboard-list.svg');"></i>
            <span><b>فاکتور:</b> {{ $invoice->customer_name }}</span>
            <span class="ipsi">شماره فاکتور: {{$invoice->order_no}}</span>
            <i class="icn block arrow fill" style="background-image:url('/icons/arrow-up-left.svg');"></i>
        </a>
    </li>
@endforeach