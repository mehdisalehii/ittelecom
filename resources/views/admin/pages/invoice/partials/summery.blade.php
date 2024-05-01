@can('sale_view')
<ul class="summery grid grid-1 gap-3">
@foreach (\App\Models\Company::groupBy(['type'])->where( 'title' , '!=' , 'رسمی' )->get() as $company)
    <li>
        <aside class="card box">
            <div class="ico">
                <i class="icn block fill float-start" style="background-image:url('/icons/verified.svg');"></i>
            </div>
            <div class="total">{{ \Morilog\Jalali\CalendarUtils::convertNumbers( number_format ( count(\App\Models\Invoice::select('id')->where('invoice_type', $company->type )->get()) ,0,'',',') ) }}</div>
            <div class="text">
                <a href="{{route('admin.invoice.index')}}/types/{{ $company->type }}">
                    {{ $company->title .' '. $company->name }}
                </a>
            </div>
        </aside>
    </li>
@endforeach
</ul>
@endcan
