<?php

namespace App\Http\Middleware;

use App\Repositories\Repository;
use Closure;
use Illuminate\Http\Request;

class AdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()){
            $role = Repository::getInstance()->userRole->findByNameAndUserId('admin', $request->user()->id);

            if ($role){
                return $next($request);
            }
        }

        return response()->json([], 403);
    }
}
