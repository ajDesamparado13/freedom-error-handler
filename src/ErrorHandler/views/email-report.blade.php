REPORT TRACE ID {{ $report->getTraceId() }} <br>
REQUEST URL: {{ $report->getUrl() }} <br>
REQUEST METHOD: {{ $report->getMethod() }} <br>
REQUEST PARAMETERS: {{ $report->getParameters() }} <br>
{!! $report->getHTML() !!}
