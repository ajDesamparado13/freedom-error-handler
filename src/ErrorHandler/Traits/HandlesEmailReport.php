<?php
namespace Freedom\ErrorHandler\Traits;

use Exception;
use Freedom\ErrorHandler\ExceptionReport\EmailExceptionReport;
use Freedom\ErrorHandler\Mail\EmailReport;

trait HandlesEmailReport {

    public function shouldReportEmail(Exception $exception) : bool {
        return \Config::get('error-handler.reports.email.enabled',false) === true &&
         !$this->isHttpException($exception) &&
         !$exception instanceof \Illuminate\Database\Eloquent\ModelNotFoundException;
    }


    public function reportEmail(EmailExceptionReport  $report) {
        Mail::send(new EmailReport ($report));
    }
}
