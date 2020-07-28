<?php

namespace App\Mail\Tag;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendTagCreatedEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $tag;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($tag)
    {
        //
        $this->tag = $tag;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.tag.send-tag-created-email');
    }
}
