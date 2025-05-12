<?php

namespace App\Providers;

use Illuminate\Http\Response;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Response::macro('statusOk', function ($data = null, $messages = "") {
            if (empty($messages)) {
                if (is_null($data)) {
                    $data = 'done';
                }
                return response()->json([
                    'data' => $data,
                    'error' => false
                ], 200);
            } else {
                return response()->json([
                    'message' => $messages,
                    'data' => $data,
                    'error' => false
                ], 200);
            }
        });

        Response::macro('statusError', function ($message, $code = 200, $data = null) {
            if ($data) {
                return response()->json([
                    'message' => $message,
                    'data' => $data,
                    'error' => true
                ], $code);
            } else {
                return response()->json([
                    'message' => $message,
                    'error' => true
                ], $code);
            }
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
