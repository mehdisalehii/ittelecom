@extends('layouts.app')

@section('title','ویرایش فاکتور '. $invoice->order_no )
@section('titlePage',' | فاکتورها')
@section('titleAdmin',' | داشبورد')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@section('content')
<div class="lists index">
    <div class="box-pan hcccy @if(isset($invoice)){{ URL::current() == route('admin.invoice.edit', $invoice->id) ? 'form-edit' : '' }}@endif">
        @include('admin.pages.invoice.partials.toolbar')
        <section class="card form-db form-editor form-invo hidden  @if($invoice->invoice_type == 'Commerical') input-rasmi @endif">
            @include('errors.messages')
            <form action="{{ route('admin.invoice.update', $invoice->id) }}" method="POST" id="Form_Save">
            @method('PUT')
            @csrf

                <div class="panel header hidden">
                    <span>فاکتور</span>
                </div>

                <div class="panel number-date">
                    @include('admin.pages.invoice.form.order_no')
                    @include('admin.pages.invoice.form.date')
                </div>

                <div class="panel tan buyer-setting">
                    <div class="title">مشخصات فروشنده</div>
                    <div class="box">
                        @include('admin.pages.invoice.form.buyer')
                        @include('admin.pages.invoice.form.display_setting')
                    </div>
                </div>

                <div class="panel tan form-word customer">
                    @include('admin.pages.invoice.form.customer')
                </div>

                <div class="panel tan item-cal">
                    @include('admin.pages.invoice.form.item')
                </div>

                <div class="panel tan descr-sign">
                    @include('admin.pages.invoice.form.description')
                    @include('admin.pages.invoice.form.calculator',['tax_percent'=>$invoice->tax_percent])
                    @include('admin.pages.invoice.form.signature')
                </div>

            </form>
        </section>
    </div>
</div>
@endsection
