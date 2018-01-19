<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailToSubscriber extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $title;
    public $description;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title, $description)
    {
        $this->title = $title;
        $this->description = $description;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('new@smartsolution.mn')
        ->subject($this->title)->view('email.subscriber')->with([
            'description' => $this->description,
        ]);
    }
}
