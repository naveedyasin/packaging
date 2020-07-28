<?php

namespace App\Listeners\Backend\Category;

use App\Events\Backend\Category\CategoryCreatedEvent;
use App\Events\Backend\Category\CategoryDeletedEvent;
use App\Events\Backend\Category\CategoryUpdatedEvent;
use App\Mail\Category\SendCategoryCreatedEmail;
use App\Mail\Category\SendCategoryDeletedEmail;
use App\Mail\Category\SendCategoryUpdatedEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class CategoryEventListener implements ShouldQueue
{
    /**
     * @var \Illuminate\Config\Repository
     */
    public $notification_recipient;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $this->notification_recipient = config('roles.notification_recipient');
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        //
    }

    public function onCreated($event)
    {
        Mail::to($this->notification_recipient)->send(new SendCategoryCreatedEmail($event->category));
    }

    public function onUpdated($event)
    {
        Mail::to($this->notification_recipient)->send(new SendCategoryUpdatedEmail($event->category));
    }

    public function onDeleted($event)
    {
        Mail::to($this->notification_recipient)->send(new SendCategoryDeletedEmail($event->category));
    }

    public function subscribe($events)
    {
        $events->listen(
            CategoryCreatedEvent::class,
            '\App\Listeners\Backend\Category\CategoryEventListener@onCreated'
        );
        $events->listen(
            CategoryUpdatedEvent::class,
            '\App\Listeners\Backend\Category\CategoryEventListener@onUpdated'
        );
        $events->listen(
            CategoryDeletedEvent::class,
            '\App\Listeners\Backend\Category\CategoryEventListener@onDeleted'
        );
    }
}
