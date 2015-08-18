<?php namespace App\Http\Middleware;

use Closure;
use Auth;

class Permission {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$user = Auth::user();
		if ($user['role'] != 1)
		{
				return redirect()->guest('/dashboard');
		}
		return $next($request);
	}

}
