<?php

namespace App\Http\Middleware;

use App\Actions\IncomingRequestLogAction;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

final readonly class IncomingRequestLogMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        resolve(IncomingRequestLogAction::class);
        return $next($request);
    }
}
