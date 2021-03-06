<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\FlareClient\View;
use Illuminate\Support\Facades\Session;
class Identify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->name != "Besicon") {
            switch (Auth::user()->name) {
                case 'fab':
                    return redirect('fabrication_readonly');
                case 'worker':
                    return redirect('manpower_readonly');
                case 'fac':
                    return redirect('facworker_readonly/home');
                case 'mat':
                    return redirect("material/addmaterial");
                
            }
        }
        return $next($request);
    }
}
