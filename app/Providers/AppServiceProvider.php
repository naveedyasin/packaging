<?php

namespace App\Providers;

use App\Repository\Backend\Page\PagesInterface;
use App\Repository\Backend\Page\PagesRepository;
use App\Repository\Backend\Post\PostRepository;
use App\Repository\Backend\Box\BoxRepository;
use App\Repository\Backend\Post\PostRepositoryInterface;
use App\Repository\Backend\Box\BoxRepositoryInterface;
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
        $this->app->singleton(BoxRepositoryInterface::class, BoxRepository::class);
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
