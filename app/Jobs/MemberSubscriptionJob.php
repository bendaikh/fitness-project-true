<?php

namespace App\Jobs;

use App\Mail\MemberSubscriptionMail;
use App\Traits\GetGlobalInformationTrait;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class MemberSubscriptionJob implements ShouldQueue
{
    use Dispatchable, GetGlobalInformationTrait, InteractsWithQueue, Queueable, SerializesModels;

    private $message;
    private $subject;
    private $email;
    /**
     * Create a new job instance.
     */
    public function __construct($message, $subject, $email)
    {
        $this->message = $message;
        $this->subject = $subject;
        $this->email = $email;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if (self::setMailConfig()) {
            Mail::to($this->email)->send(new MemberSubscriptionMail($this->message, $this->subject));
        }
    }

    private static function setMailConfig()
    {
        try {
            $email_setting = Cache::get('setting');

            $mailConfig = [
                'transport' => 'smtp',
                'host' => $email_setting->mail_host,
                'port' => $email_setting->mail_port,
                'encryption' => $email_setting->mail_encryption,
                'username' => $email_setting->mail_username,
                'password' => $email_setting->mail_password,
                'timeout' => null,
            ];

            config(['mail.mailers.smtp' => $mailConfig]);
            config(['mail.from.address' => $email_setting->mail_sender_email]);
            config(['mail.from.name' => $email_setting->mail_sender_name]);

            return true;
        } catch (\Throwable $th) {
            if (app()->isLocal()) {
                Log::error($th->getMessage());
            }

            return false;
        }
    }
}
