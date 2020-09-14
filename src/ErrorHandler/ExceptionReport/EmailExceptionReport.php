<?php

namespace Freedom\ErrorHandler\ExceptionReport;

use Exception;
use Illuminate\Support\Facades\Request;

class EmailExceptionReport {

    protected $trace_id;
    protected $exception;
    protected $exceptionHtml;
    protected $url;
    protected $parameters;
    protected $method;

    public function __construct(Exception $exception,$exceptionHtml) {
        $this->trace_id = \Hash::make($exception->getCode());
        $this->exception = $exception;
        $this->exceptionHtml = $exceptionHtml;
        $this->url        = Request::fullUrl();
        $this->method     = Request::method();
        $this->parameters = json_encode(Request::all());
        $this->exceptionHtml = $exceptionHtml;
    }

    public function getTraceId() {
        return $this->trace_id;
    }

    public function getException() {
        return $this->exception;
    }

    public function getUrl(){
        return $this->url;
    }

    public function getHTML() {
        return $this->exceptionHtml;
    }

    public function getMethod(){
        return $this->method;
    }
    public function getParameters(){
        return $this->parameters;

    }
    public function getReport(){
        $exception = $this->exception;
        return [
            'url'      => $this->getUrl(),
            'method'    => $this->getMethod(),
            'parameters' => $this->getParameters(),
            'message'  => $exception->getMessage(),
            'code'      => $exception->getCode(),
            'file'      => $exception->getFile(),
            'line'      => $exception->getLine(),
            'trace_id' => $this->trace_id,
        ];
    }
}