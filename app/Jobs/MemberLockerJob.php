<?php

namespace App\Jobs;

use App\Mail\MemberLockerMail;
use App\Models\User;
use App\Traits\GetGlobalInformationTrait;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class MemberLockerJob implements ShouldQueue
{
    use Dispatchable, GetGlobalInformationTrait, InteractsWithQueue, Queueable, SerializesModels;

    private User $user;
    private string $subject;
    private string $message;
    /**
     * Create a new job instance.
     */
    public function __construct(User $user, string $subject, string $message)
    {
        $this->user = $user;
        $this->subject = $subject;
        $this->message = $message;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->set_mail_config();
        Mail::to($this->user->email)->send(new MemberLockerMail($this->message, $this->subject));
    }
}
