<?php

namespace Freedom\ErrorHandler\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Freedom\ErrorHandler\ExceptionReport\EmailExceptionReport;

class EmailReport extends Mailable
{
    use Queueable, SerializesModels;

    protected $report;

    /**
     * Create a new message instance.
     *
     * @param $exceptionHtml
     * @internal param Exception $e
     */
    public function __construct(EmailExceptionReport $report)
    {
        $this->report = $report;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $mail = $this->view(\Config::get('error-handler.reports.email.view')) 
        ->subject(\Config::get('error-handler.reports.email.subject'))
        ->to(\Config::get('error-handler.reports.email.recipients'));

        $cc = array_filter(explode(',',\Config::get('error-handler.reports.email.cc')));
        if(count($cc) > 0){
            $mail->cc($cc);
        }

        $bcc = array_filter(explode(',',\Config::get('error-handler.reports.email.bcc')));
        if(count($bcc) > 0){
            $mail->bcc($bcc);
        }

        return $mail;
    }

}
