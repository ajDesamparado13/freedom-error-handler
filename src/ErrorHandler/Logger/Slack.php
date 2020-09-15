<?php
namespace Freedom\ErrorHandler\Logger;

use Monolog\Handler\SlackWebhookHandler;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Request;


class Slack
{
    /**
     * Customize the given logger instance.
     *
     * @param  \Illuminate\Log\Logger  $logger
     * @return void
     */
    public function __invoke($logger)
    {
        $extras = array_filter([
            'personnel' => \Config::get('error-handler.logger.slack.mentions'),
            'env'      => Str::upper(\Config::get('app.env')),
            'site'      => \Config::get('app.url'),
            'url'        => Request::fullUrl(),
            'method'     => Request::method(),
            'parameters' => json_encode(Request::all())
        ]);

        foreach ($logger->getHandlers() as $handler) {
            if ($handler instanceof SlackWebhookHandler) {
                $handler->pushProcessor(function ($record) use ($extras){

                    foreach($extras as $key => $value){
                            $record['extra'][$key] = $value;
                    }

                    return $record;
                });
            }
        }
    }

}