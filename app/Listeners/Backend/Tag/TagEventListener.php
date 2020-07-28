<?php

namespace App\Listeners\Backend\Tag;

use App\Events\Backend\Tag\TagCreatedEvent;
use App\Events\Backend\Tag\TagDeletedEvent;
use App\Events\Backend\Tag\TagUpdatedEvent;
use App\Mail\Tag\SendTagCreatedEmail;
use App\Mail\Tag\SendTagDeletedEmail;
use App\Mail\Tag\SendTagUpdatedEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class TagEventListener implements ShouldQueue
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
        Mail::to($this->notification_recipient)->send(new SendTagCreatedEmail($event->tag));
    }

    public function onUpdated($event)
    {
        Mail::to($this->notification_recipient)->send(new SendTagUpdatedEmail($event->tag));
    }

    public function onDeleted($event)
    {
        Mail::to($this->notification_recipient)->send(new SendTagDeletedEmail($event->tag));
    }

    public function subscribe($events)
    {
        $events->listen(
          TagCreatedEvent::class,
          '\App\Listeners\Backend\Tag\TagEventListener@onCreated'
        );
        $events->listen(
            TagUpdatedEvent::class,
            '\App\Listeners\Backend\Tag\TagEventListener@onUpdated'
        );
        $events->listen(
            TagDeletedEvent::class,
            '\App\Listeners\Backend\Tag\TagEventListener@onDeleted'
        );
    }
}
