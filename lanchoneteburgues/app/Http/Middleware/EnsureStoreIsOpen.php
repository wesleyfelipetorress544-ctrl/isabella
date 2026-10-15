<?php

namespace App\Http\Middleware;

use App\Models\StoreSetting;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureStoreIsOpen
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $storeSetting = StoreSetting::query()->find(1);

        if ($storeSetting !== null && ! $storeSetting->is_open) {
            $message = 'Estamos fechados no momento!';

            if ($request->expectsJson()) {
                return response()->json([
                    'message' => $message,
                ], Response::HTTP_SERVICE_UNAVAILABLE);
            }

            return response()->view('store-closed', [
                'message' => $message,
            ], Response::HTTP_SERVICE_UNAVAILABLE);
        }

        return $next($request);
    }
}
