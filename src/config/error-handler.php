<?php

return [
    'reports' => [
        'email' => [
            'enabled' => env('EMAIL_REPORT_ENABLED',false),
            'recipients' => env('EMAIL_REPORT_RECIPIENTS',false),
            'cc'         => env('EMAIL_REPORT_CC',false),
            'bcc'         => env('EMAIL_REPORT_BCC',false),
            'view'       => env('EMAIL_REPORT_VIEW','error-handler::email-report'),
            'subject'    => env('EMAIL_REPORT_SUBJECT','Exception Occured'),
        ],
    ],
    'logger' => [
        'slack' => [
            'mentions' => env('LOG_SLACK_MENTIONS'),
        ]
    ]
];
