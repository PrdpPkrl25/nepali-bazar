<?php

namespace App\Http\Middleware;

use App\Cakeapp\Location\Model\Province;
use App\Cakeapp\User\Model\User;
use Closure;

class CheckAddress
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

            if($request->user()&&!($request->user()->province_id||$request->user()->district_id||$request->user()->municipal_id||$request->user()->ward_id||$request->user()->locality||$request->user()->phone_number)){
                return redirect()->route('information.select');
            }

        return $next($request);
    }
}
