<?php

//file : config/ilrs-errorcode.php

/**
 * Note: Specify Constants Name in Upper Case
 * Here is how these can be used in code -
 *      Config::get('constants.ADMIN_NAME');
 */

return [

    'HTTP_ERROR_CODE' => [
        '401' => 'Unauthorized Access',
        '403' => 'Unauthroized Action',
        '404' => 'End Point Not Found',
        '500' => 'Internal Server Error'
    ],

    'HTTP_SUCCESS_CODE' => [
        '200' => 'Ok',
        '204' => 'No Content'
    ],

    'APP_ERROR_CODE' => [
    ],

    'APP_SUCCESS_CODE' => [
    ]

];