<?php

namespace App\Listeners\Backend\Pages;

use App\Mail\Pages\SendPageCreatedEmail;
use App\Mail\Pages\SendPageDeletedEmail;
use App\Mail\Pages\SendPageUpdatedEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class PageEventListener implements ShouldQueue
{
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

    public function onCreated($event)
    {
        Mail::to($this->notification_recipient)->send(new SendPageCreatedEmail($event->page));
    }

    public function onUpdated($event)
    {
        Mail::to($this->notification_recipient)->send(new SendPageUpdatedEmail($event->page));
    }

    public function onDeleted($event)
    {
        Mail::to($this->notification_recipient)->send(new SendPageDeletedEmail($event->page));
    }

    public function subscribe($events)
    {
        $events->listen(
          \App\Events\Backend\Pages\PageCreated::class,
          '\App\Listeners\Backend\Pages\PageEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Pages\PageUpdated::class,
            '\App\Listeners\Backend\Pages\PageEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\Pages\PageDeleted::class,
            '\App\Listeners\Backend\Pages\PageEventListener@onDeleted'
        );
    }
}
