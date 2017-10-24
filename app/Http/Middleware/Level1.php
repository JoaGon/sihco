<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Middleware;

/**
 * Description of Level0
 *
 * @author tecnobit
 */
use Closure;

use Illuminate\Contracts\Auth\Guard;
use DB;
class Level1 {

    /**
	 * The Guard implementation.
	 *
	 * @var Guard
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
            if ($this->auth->check() && $acceso > 0) {
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
