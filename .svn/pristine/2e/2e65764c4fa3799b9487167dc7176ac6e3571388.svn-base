<?php

namespace App\IlrsCore;

//use Illuminate\Http\Request;

use App\Http\Requests;

use Request;

use App\Statement;

class IlrsCoreStatement
{
    public function getStatementInputs(Request $request)
    {
        $data = $request::all();
        $json = file_get_contents('php://input');
        $obj = json_decode($json);
        if(isset($obj))
        {
            $objData =  json_decode(json_encode($obj), true);
            if(isset($objData[0]))
            {
                $data = ($objData[0])?$objData[0]:$objData;
            }else
            {
                $data = $objData;
            }
        }

        return $data;
    }
}