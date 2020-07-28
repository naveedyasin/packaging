<?php

namespace App\Providers;

use App\Models\Page\Page;
use App\Observers\Page\PagesObserver;
use Illuminate\Support\ServiceProvider;

class EloquentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Page::observe(PagesObserver::class);
    }
}
