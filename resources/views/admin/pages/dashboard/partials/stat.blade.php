@can('widget_view')
{{--<div class="panel-mid stat @can('content_view'){{'show'}}@endcan">--}}
{{--    <aside class="card bold etra">--}}
{{--        <canvas id="chart_content" class="chartbrjs"></canvas>--}}
{{--    </aside>--}}
{{--</div>--}}
{{--<div class="panel-mid stat @can('widget_view'){{'show'}}@endcan">--}}
{{--    <aside class="card bold etra">--}}
{{--        <canvas id="chart_visitor" class="chartbrjs"></canvas>--}}
{{--    </aside>--}}
{{--</div>--}}
{{--<div class="panel-mid stat @can('sale_view'){{'show'}}@endcan">--}}
{{--    <aside class="card bold etra">--}}
{{--        <canvas id="chart_stock" class="chartbrjs"></canvas>--}}
{{--    </aside>--}}
{{--</div>--}}
{{--<div class="panel-mid stat @can('widget_view'){{'show'}}@endcan">--}}
{{--    <aside class="card bold etra">--}}
{{--        <canvas id="chart_user" class="chartbrjs"></canvas>--}}
{{--    </aside>--}}
{{--</div>--}}
{{--<div class="panel-mid stat @can('sale_view'){{'show'}}@endcan">--}}
{{--    <aside class="card bold etra">--}}
{{--        <canvas id="chart_invoice" class="chartbrjs"></canvas>--}}
{{--    </aside>--}}
{{--</div>--}}
{{--<div class="panel-mid stat @can('content_view'){{'show'}}@endcan">--}}
{{--    <aside class="card bold etra">--}}
{{--        <canvas id="chart_topic" class="chartbrjs"></canvas>--}}
{{--    </aside>--}}
{{--</div>--}}
<script>
var
    Data_Invoice = ["{{$stat_invoice_beforeInvoice}}", "{{$stat_invoice_commerical}}", "{{$stat_invoice_sale}}"],

    Data_Publish = [ "{{$stat_publish_product}}", "{{$stat_publish_post}}" ],
    Data_Draft = [ "{{$stat_draft_product}}", "{{$stat_draft_post}}" ],

    Data_Topic = ["{{$stat_topic_question}}", "{{$stat_topic_product}}"];
</script>
@endcan
