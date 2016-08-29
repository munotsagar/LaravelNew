<?php
namespace App\iLRS;

use App\Http\Requests;

use Request;

use Response;

use App\Http\Controllers\BaseController;

class ReturnResponse extends BaseController
{
    public function __call($method_name,$parameters)
    {
        if($method_name == "jsonResponse")
        {
            $count = count($parameters);
            switch ($count)
            {
                case "3":
                    $header['']='';
                    return $this->CreateJsonResponse($parameters[0],$parameters[1],$parameters[2],$header);
                    break;
                case "4":
                    return $this->CreateJsonResponse($parameters[0],$parameters[1],$parameters[2],$parameters[3]);
                    break;
                default:
                    throw new exception("Bad Arguments");
            }
        }
    }


    private function CreateJsonResponse($responseData,$statusCode,$errorMessage,$headers)
    {
        //Actual Logic
        if($errorMessage)
        {
            $responseData['Status Code'] = $statusCode;
            $responseData['Error Message'] = $errorMessage;
        }

        switch ($statusCode) {
            case 200:
                $response = Response::json($responseData, $statusCode, [], config('ilrs-constants.JSON_FORMAT.'.config('ilrs-config.READABLE_OUTPUT_JSONFORMAT')));
                break;
            case 201:
                $response = Response::json($responseData, $statusCode, [], config('ilrs-constants.JSON_FORMAT.'.config('ilrs-config.READABLE_OUTPUT_JSONFORMAT')));
                break;
            case 400:
                $response = Response::json($responseData, $statusCode, [], config('ilrs-constants.JSON_FORMAT.'.config('ilrs-config.READABLE_OUTPUT_JSONFORMAT')));
                break;
            case 404:
                $response = Response::json($responseData,$statusCode,[],config('ilrs-constants.JSON_FORMAT.'.config('ilrs-config.READABLE_OUTPUT_JSONFORMAT')));
                break;
            default:
                throw new exception("");
                break;

        }

        if(count($headers) > 0)
        {
            $response->withHeaders($headers);
        }
        return $response;
    }
}