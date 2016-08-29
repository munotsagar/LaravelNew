<?php

namespace App\Http\Middleware;

use Closure;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        header("Access-Control-Allow-Origin: *");

        //ALLOW OPTIONS METHOD
        $headers = [
            'Access-Control-Allow-Method' => 'POST,GET,OPTIONS,PUT,DELETE',
            'Access-Control-Allow-Headers' => 'origin, content-type, accept, authorization, x-experience-api-version',
            'Access-Control-Max-Age' => '151200'
        ];

        //if($request->getMethod() == 'OPTIONS')
        //{
        //   return Response::make('OK',200,$headers);
        //}

        $response = $next($request);

        foreach($headers as $key => $value)
        {
            $response->header($key,$value);
        }

        return $response;

    }
}
