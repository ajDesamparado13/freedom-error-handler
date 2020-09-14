<?php

namespace Freedom\ErrorHandler\Contracts;

use Exception;
use Freedom\ErrorHandler\ExceptionReport\EmailExceptionReport;

interface WithEmailReport{

    public function shouldReportEmail(Exception $exception) : bool;
    public function reportEmail(EmailExceptionReport $report);

}
