<?php

return [
    # Define your application mode here
    'mode' => 'sandbox',

    # Account credentials from developer portal
    'account' => [
        'client_id' => env('PAYPAL_CLIENT_ID', 'AUScFI58k8cNfEGe3cbyPpdtOvYlr3bw1ZZaBGtQaxkyxuOH_Qw5RgAvBKjUg93iLDewNuhcKC2k42Z1'),
        'client_secret' => env('PAYPAL_CLIENT_SECRET', 'ENyrNCwCVwvMpL8yJqBbW1SZuXXFdnz3dVQ3PAWmp1RdawC1lsblazbJMGfJM3jBSjo1xzlY_3h5-ue5'),
    ],

    # Connection Information
    'http' => [
        'connection_time_out' => 30,
        'retry' => 1,
    ],

    # Logging Information
    'log' => [
        'log_enabled' => true,

        # When using a relative path, the log file is created
        # relative to the .php file that is the entry point
        # for this request. You can also provide an absolute
        # path here
        'file_name' => '../PayPal.log',

        # Logging level can be one of FINE, INFO, WARN or ERROR
        # Logging is most verbose in the 'FINE' level and
        # decreases as you proceed towards ERROR
        'log_level' => 'FINE',
    ],
];
