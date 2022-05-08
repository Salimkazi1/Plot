<?php
namespace App\Http\Middleware;
use Session;
use Closure;

class Authentification
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
        
        if(!Session::has('SuserID')){
            return redirect()->action('AuthentificationController@index');
        }

        return $next($request);

    }

}