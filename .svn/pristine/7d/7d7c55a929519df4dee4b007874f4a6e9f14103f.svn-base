<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Validation\UnauthorizedException;
use Log;
use Response;

use App\iLRS\BasicAuthentication;

class CustomAuthentication
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

        $headervalues[config('ilrs-constants.HEADERS.API_MODE')] = $request->header(config('ilrs-constants.HEADERS.API_MODE'));
        $headervalues[config('ilrs-constants.HEADERS.API_KEY')] = $request->header(config('ilrs-constants.HEADERS.API_KEY'));
        $headervalues[config('ilrs-constants.HEADERS.API_USERNAME')] = $request->header(config('ilrs-constants.HEADERS.API_USERNAME'));
        $headervalues[config('ilrs-constants.HEADERS.API_PASSWORD')] = $request->header(config('ilrs-constants.HEADERS.API_PASSWORD'));

        Log::info('Middleware: CustomAuthentication: handle');
        Log::info('Middleware: CustomAuthentication: handle: apimode: '.$headervalues[config('ilrs-constants.HEADERS.API_MODE')]);

        $basicAuth = new BasicAuthentication();
        $result = $basicAuth->IsAuthenticated($headervalues);
        Log::info('Middleware: CustomAuthentication: CustomAuthController: IsAuthenticated: result: '.$result);
        if($result != 0)
        {
            throw new \Exception(config('ilrs-errorcode.HTTP_ERROR_CODE.'.$result),$result);
        }
        else
        {
            return $next($request);
        }
        
        /*
        $username = $request->header('apiusername');
        $password = $request->header('apipassword');
        Log::info('Middleware: CustomAuthontication: handle: username: '.$username);
        Log::info('Middleware: CustomAuthontication: handle: password: '.$password);
        $customerMaster = new CustomerMasterController();
        if($username!="" && $password!="") {


            $validateResponse = $customerMaster->validateCustomer($username, $password);
            if ($validateResponse['success']) {
                return $next($request);
            } else {
                return response()->json($validateResponse)
                    ->header('Status Code', '404');
            }
        }else{
            $validateResponse = $customerMaster->credentialsNotFound();
            return Response::json($validateResponse, '404');
        }
        
        */
    }
}
