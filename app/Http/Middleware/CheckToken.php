<?php

namespace App\Http\Middleware;

use Closure;

class CheckToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        //Check if we have the AUTH in the request
        if(!isset($_SERVER['HTTP_AUTHORIZATION']))
            abort(403, 'Auth failed');

        //if we have the Bearer {token}, strip it and use the token to authenticate
        $token = str_replace('Bearer ','', $_SERVER['HTTP_AUTHORIZATION']);

        //Throw error if we don't have a token
        if(empty($token))
            abort(403, 'Auth failed');

        //Check if the Token supplied is the same as the secret Token ( usually this comes from the User's token logged in )
        if($token === 'mBu7IB6nuxh8RVzJ61f4') {
            //Return the response
            $response = $next($request);
            $response->headers->set('Content-Type', 'application/json');
            return $response;
        }

        //Default return an error
        abort(403, 'Auth failed');
    }
}
