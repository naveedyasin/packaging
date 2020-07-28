<?php

namespace App\Providers;

use App\Repository\Backend\Page\PagesInterface;
use App\Repository\Backend\Page\PagesRepository;
use App\Repository\Backend\Post\PostRepository;
use App\Repository\Backend\Post\PostRepositoryInterface;
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
        $this->app->singleton(PostRepositoryInterface::class, PostRepository::class);
        $this->app->singleton(PagesInterface::class, PagesRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
