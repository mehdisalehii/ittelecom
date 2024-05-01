@extends('layouts.app')

@section('title', 'خروجی فاکتور')
@section('titlePage',' | فاکتورها')
@section('titleAdmin',' | داشبورد')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@section('content')

<div class="lists index">
    <div class="box-pan">

        <div class="toolbars hidden">
            <div class="toolbar">
                <div class="title">
                    <i class="icn fill" style="background-image: url(/icons/clipboard-list.svg);"></i>
                    <h1>خروجی فاکتور</h1>
                </div>

                <a class="btn btn-update text-white bold" href="{{ route('admin.invoice.index') }}"><i class="icn white" style="background-image: url(clipboard-list.svg);"></i>فاکتورها</a>

                @can('invoice.create')
                    <a class="btn btn-success bold" href="{{ route('admin.invoice.create') }}"><i class="icn white" style="background-image: url(plus-circle.svg);"></i>فاکتور جدید</a>
                @endif

            </div>
        </div>

        <aside class="card form-db archive-back-box hidden">
            <form method="post" id="invoice_form" action="{{ route('admin.invoice.export.excel') }}">
                @csrf
                <div class="form-radio form-group-item position-relative box col-3" >
                    <label class=" ">نام شرکت:</label>
                    <div class="box selectionbox  ">
                        <span class="selectoption arrow"></span>
                        <div class="selectoption-warp content">
                            <div class="form-group select">
                                <span class="selectoption arrow block"></span>
                                <select class="selectoption p-com select-company-jqu select_company select_1" name="company_id">
                                    <option value="X" class="x_element hidden">..:: انتخاب کنید ::..</option>
                                    @foreach($companies as $row_com)
                                    <option value="{{$row_com->parentId}}">{{$row_com->name}} ({{$row_com->title}})</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-radio form-group-item position-relative box col-3" >
                    <label class=" ">نوع فیلتر:</label>
                    <div class="box selectionbox  ">
                        <span class="selectoption arrow"></span>
                        <div class="selectoption-warp content">
                            <div class="form-group select">
                                <span class="selectoption arrow block"></span>
                                <select class="selectoption p-com select-company-jqu select_company select_1" name="type">
                                    <option value="factor_order_no" selected>شماره فاکتور</option>
                                    <!-- <option value="factor_date" >تاریخ</option> -->
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box col-3">
                    <label class=" ">از فاکتور شماره:</label>
                    <input type="text" name="from_order_no" class="type-text input-from-int selectoption number_only" value="100200">
                </div>

                <div class="box col-3">
                    <label class=" ">تا فاکتور شماره:</label>
                    <input type="text" name="to_order_no"  class="type-text input-to-int selectoption number_only" value="100300">
                </div>

                <div class="box col-3">
                    <input type="submit" class="btn btn-update dowd-btn-file-out selectoption number_only" value="دانلود فایل EXCEL">
                </div>

            </form>

        </aside>

    </div>
</div>

@endsection
