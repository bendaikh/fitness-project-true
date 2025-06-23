<?php

namespace Modules\Order\app\Jobs;


use App\Traits\GetGlobalInformationTrait;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Modules\Order\app\Emails\OrderSuccessfulMail;

class OrderSuccessfulMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, GetGlobalInformationTrait;

    public $from_user;
    public $subject;
    public $message;
    public $admin;
    /**
     * Create a new job instance.
     */
    public function __construct($user, $subject, $message, $admin)
    {

        $this->from_user = $user;
        $this->subject = $subject;
        $this->message = $message;
        $this->admin = $admin;
    }
    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // set mail configuration
        $this->set_mail_config();

        // send mail
        Mail::to($this->from_user->email)->send(new OrderSuccessfulMail($this->subject, $this->message));

        if ($this->admin) {

            Mail::to($this->admin->mail)->send(new OrderSuccessfulMail($this->admin->subject, $this->admin->description));
        }
    }
}
