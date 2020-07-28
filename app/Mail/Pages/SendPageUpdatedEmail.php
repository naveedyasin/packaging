<?php

namespace App\Mail\Pages;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendPageUpdatedEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $page;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($page)
    {
        //
        $this->page = $page;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.pages.send-page-updated-email');
    }
}
