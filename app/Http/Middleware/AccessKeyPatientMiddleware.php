<?php

namespace App\Http\Middleware;

use App\Models\ApiClients;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Symfony\Component\HttpFoundation\Response;

class AccessKeyPatientMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $accessKey = $request->header('accessKey', null);
        if (empty($accessKey)) {
            return HttpResponse::statusError('Authorization information is not provided.', 406);
        }

        $apiClient = ApiClients::query()
            ->where('access_key', $accessKey)
            ->first();

        if (empty($apiClient)) {
            return HttpResponse::statusError('Invalid Access Key.', 406);
        }

        $request->merge([
            'application_name' => $apiClient->application_name,
            'apiClientId' => $apiClient->id
        ]);
        return $next($request);
    }
}
