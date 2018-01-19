<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;
use App\Mail\MailToSubscriber;

class SendSubscriberMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $emails;
    protected $title;
    protected $description;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($emails, $title, $description)
    {
        $this->emails = $emails;
        $this->title = $title;
        $this->description = $description;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new MailToSubscriber($this->title, $this->description);
        Mail::to($this->emails)->queue($email);
    }
}
