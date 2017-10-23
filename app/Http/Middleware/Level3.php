<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use DB;
class Level3
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;

    }

        /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            if ($this->auth->guest()){
                return redirect()->guest('index');
            }

            $acceso = DB::table('roles')
                        ->where('id_rol',  $this->auth->user()->rol_id)
                        ->pluck('nivel_acceso');
            if ($this->auth->check() && $acceso > 3) {
                return $next($request);
            } else {
                return abort(401);
            }
        } catch (Exception $ex) {
            //return response('Unauthorized.', 401);
            return abort(401);
        }

    }
}
