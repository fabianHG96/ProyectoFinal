<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class DatabaseQueryLoggerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        if (config('app.debug')) {
            DB::listen(function ($query) {
                Log::info("Consulta SQL: " . $query->sql);
                Log::info("Valores: " . json_encode($query->bindings));
                Log::info("Tiempo: " . $query->time);
            });
        }
    }
}
