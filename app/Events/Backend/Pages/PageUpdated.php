<?php

namespace App\Events\Backend\Pages;

use App\Models\Page\Page;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PageUpdated
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;
    /**
     * @var string
     */
    public $page;

    /**
     * Create a new event instance.
     *
     * @param  \App\Models\Page\Page  $page
     */
    public function __construct(Page $page)
    {

        $this->page = $page;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
