<?php

namespace App\Providers;

use App\Models\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        //
            view()->composer('*', function($view) {
                if(Auth::check()) {
                    if(auth()->user()->role != 'Kepala') {
                        $view->with('logs', Log::with('pengguna')->where('type', 'log')->where('user_id', auth()->id())->latest()->limit(8)->get());
                        $view->with('events', Log::with('pengguna')->where('type', 'event')->where('user_id', auth()->id())->latest()->limit(8)->get());
                        $view->with('latestLogs', Log::with('pengguna')->where('user_id', auth()->id())->latest()->limit(4)->get());
                    } else {
                        $view->with('logs', Log::with('pengguna')->where('type', 'log')->latest()->limit(8)->get());
                        $view->with('events', Log::with('pengguna')->where('type', 'event')->latest()->limit(8)->get());
                        $view->with('latestLogs', Log::with('pengguna')->latest()->limit(4)->get());
                    }
                }
            });
    }
}
