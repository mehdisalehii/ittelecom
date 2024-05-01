@extends('layouts.app')

@section('title','فاکتورها')
@section('titleAdmin',' | داشبورد')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@section('content')
<div class="lists index" data-fetch="scroll">
    <div class="box-pan">
        @include('admin.pages.invoice.partials.toolbar')
        @include('admin.pages.invoice.partials.summery')
        @include('errors.messages')
        <section class="card panel form-db archive-back-box hidden">
            <ul class="archive-back lists" data-str="0" data-limit="20">
                @include('admin.pages.invoice.partials.list')
            </ul>
        </section>
    </div>
    <div class='aria-clearfix'></div>

    <!-- BEGIN PAGINATION -->
    <nav class="pagination text-center" aria-label="Page navigation example">
        <ul class="inline-flex -space-x-px text-base h-10">
            @if($invoices->currentPage() == 1)
                <li>
                    <a
                        href="/admin/invoice/?page={{ 1 }}"
                        aria-current="page"
                        class="flex items-center justify-center px-2 h-10 text-blue-600 border border-gray-300 rounded-r-lg bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white"
                    >
                        1
                    </a>
                </li>
            @else
                <li>
                    <a
                        rel="prev"
                        href="/admin/invoice/?page={{ $invoices->currentPage() - 1 }}"
                        class="flex items-center justify-center px-2 h-10 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                    >
                        قبل
                    </a>
                </li>
                <li>
                    <a
                        rel="prev"
                        href="/admin/invoice/?page={{ 1 }}"
                        class="flex items-center justify-center px-2 h-10 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                    >
                        1
                    </a>
                </li>
            @endif
            @if($invoices->currentPage() > $mobile_pagination_margin)
                <li>
                    <span class="flex items-center justify-center px-2 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">...</span>
                </li>
            @endif
            @for($pageCounter=2;$pageCounter<$invoices->lastPage();$pageCounter++)
                @continue($pageCounter <= ($invoices->currentPage() - $mobile_pagination_margin) || $pageCounter >= ($invoices->currentPage() + $mobile_pagination_margin))
                <li>
                    <a href="/admin/invoice/?page={{ $pageCounter }}"
                       @if($pageCounter < $invoices->currentPage())
                           rel="prev"
                       class="flex items-center justify-center px-2 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                       @elseif($pageCounter > $invoices->currentPage())
                           rel="next"
                       class="flex items-center justify-center px-2 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                       @elseif($pageCounter == $invoices->currentPage())
                           aria-current="page"
                       class="flex items-center justify-center px-2 h-10 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white"
                        @endif
                    >
                        {{ $pageCounter }}
                    </a>
                </li>
            @endfor
            @if($invoices->currentPage() < ($invoices->lastPage() - $mobile_pagination_margin))
                <li>
                    <span class="flex items-center justify-center px-2 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">...</span>
                </li>
            @endif
            @if($invoices->currentPage() == $invoices->lastPage())
                <li>
                    <a
                        href="/blog?page={{ $invoices->lastPage() }}"
                        aria-current="page"
                        class="flex items-center justify-center px-2 h-10 text-blue-600 border border-gray-300 rounded-l-lg bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white"
                    >
                        {{ $invoices->lastPage() }}
                    </a>
                </li>
            @else
                <li>
                    <a
                        rel="next"
                        href="/blog?page={{ $invoices->lastPage() }}"
                        class="flex items-center justify-center px-2 h-10 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                    >
                        {{ $invoices->lastPage() }}
                    </a>
                </li>
                <li>
                    <a
                        rel="next"
                        href="/blog?page={{ $invoices->currentPage() + 1 }}"
                        class="flex items-center justify-center px-2 h-10 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                    >
                        بعد
                    </a>
                </li>
            @endif
        </ul>
    </nav>
    <!-- END PAGINATION -->
    <div class='aria-clearfix'></div>
</div>
@endsection
