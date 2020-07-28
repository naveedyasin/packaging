<?php

namespace App\Listeners\Backend\Post;

use App\Events\Backend\Post\PostCreatedEvent;
use App\Events\Backend\Post\PostDeletedEvent;
use App\Events\Backend\Post\PostUpdatedEvent;
use App\Mail\Post\SendPostCreatedEmail;
use App\Mail\Post\SendPostDeletedEmail;
use App\Mail\Post\SendPostUpdatedEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class PostEventListener implements ShouldQueue
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
        Mail::to($this->notification_recipient)->send(new SendPostCreatedEmail($event->post));
    }

    public function onUpdated($event)
    {
        Mail::to($this->notification_recipient)->send(new SendPostUpdatedEmail($event->post));
    }

    public function onDeleted($event)
    {
        Mail::to($this->notification_recipient)->send(new SendPostDeletedEmail($event->post));
    }

    public function subscribe($events)
    {
        $events->listen(
          PostCreatedEvent::class,
          '\App\Listeners\Backend\Post\PostEventListener@onCreated'
        );
        $events->listen(
            PostUpdatedEvent::class,
            '\App\Listeners\Backend\Post\PostEventListener@onUpdated'
        );
        $events->listen(
            PostDeletedEvent::class,
            '\App\Listeners\Backend\Post\PostEventListener@onDeleted'
        );
    }
}
