<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        setlocale(LC_TIME, 'IND');

        View::composer(['exports.pdf.daily', 'exports.pdf.journal', 'exports.pdf.ledger', 'exports.pdf.revenue', 'exports.pdf.neraca', 'report.pdf.finance'], 'App\Http\View\SignatureComposer');

    }
}
