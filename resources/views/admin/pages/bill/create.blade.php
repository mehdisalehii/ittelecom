@extends('layouts.app')

@section('title','حواله‌ جدید')
@section('titlePage',' | حواله‌ها')
@section('titleAdmin',' | داشبورد')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@section('content')
<div class="lists index">
    <div class="box-pan">
        @include('admin.pages.bill.partials.toolbar')
        <section class="card form-db form-editor create hidden form-invo">
        @include('errors.messages')
        <form action="{{ route('admin.bill.store') }}" method="POST" id="Form_Save">
            @csrf

            <div class="panel header hidden">
                <span>حواله‌</span>
            </div>

            <div class="panel number-date">
                @include('admin.pages.bill.form.order_no')
                @include('admin.pages.bill.form.date')
            </div>

            <div class="panel tan form-word customer">
                @include('admin.pages.bill.form.customer')
            </div>

            <div class="panel tan item-cal">
                @include('admin.pages.bill.form.item')
            </div>

            <div class="panel tan descr-sign">
                @include('admin.pages.bill.form.description')
                @include('admin.pages.bill.form.calculator')
                @include('admin.pages.bill.form.signature')
            </div>

        </form>
        </section>
    </div>
</div>
@endsection
