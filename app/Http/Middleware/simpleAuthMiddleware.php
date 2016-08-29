<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;



use Illuminate\Http\Response;


class simpleAuthMiddleware
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
        //return $next($request); // Defeult Single line

        
        //return Auth::onceBasic('username') ?: $next($request);
        //dd($request);
        echo $request->username;

        //exit;
        $credentials = ['username' => $request->username, 'password' => $request->password];
        //$request->username = "sagarmunot";
        //$request->password = "password";
        //return Auth::validate($credentials) ?: $next($request);
        //
        //$id = Auth::user()->id;
        $kk = new Auth();
        $kk::attempt($credentials);
        //dd($kk::user()->id);
        //dd(Auth::user()->id);


        if($kk::attempt($credentials) == true) {
            return $next($request);
        }else{
           // dd("Sagar here");
            /*return $response = array(
                "error"=> false,
                "message" => "Invalid credentials!!!"
            );*/
            return response()->json(array(
                "error"=> true,
                "message" => "Invalid credentials!!!"
            ));
        }
    }
}
