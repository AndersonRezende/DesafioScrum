<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAccessLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  $requiredlevel informa o nível de acesso da página
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $requiredlevel)
    {
        if($request->user()->level_id > $requiredlevel)
            return redirect()->route('home')->withErrors('Usuário não autorizado!');;
        
        return $next($request);
    }
}
