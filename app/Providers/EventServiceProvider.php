<?php

namespace App\Providers;

use App\Listeners\Backend\Category\CategoryEventListener;
use App\Listeners\Backend\Pages\PageEventListener;
use App\Listeners\Backend\Post\PostEventListener;
use App\Listeners\Backend\Tag\TagEventListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    protected $subscribe = [
        PageEventListener::class,
        CategoryEventListener::class,
        TagEventListener::class,
        PostEventListener::class,
    ];
    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
