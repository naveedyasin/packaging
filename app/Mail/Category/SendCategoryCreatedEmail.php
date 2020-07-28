<?php

namespace App\Mail\Category;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendCategoryCreatedEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $category;

    /**
     * Create a new message instance.
     *
     * @param $category
     */
    public function __construct($category)
    {
        //
        $this->category = $category;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.category.send-category-created-email');
    }
}
