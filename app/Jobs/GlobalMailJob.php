<?php

namespace App\Jobs;

use App\Mail\GlobalMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class GlobalMailJob implements ShouldQueue {
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $mail_address;
    private $mail_subject;
    private $mail_message;
    private $link;

    /**
     * Constructs a new instance of the mail sender job.
     *
     * @param string $mail_address The email address to send the mail to.
     * @param string $mail_subject The subject of the email.
     * @param string $mail_message The body message of the email.
     * @param array $link An associative array containing one key-value pair. Example: ['Link Name' => 'https://example.com/link']
     */
    public function __construct($mail_address, $mail_subject, $mail_message, $link = []) {
        $this->mail_address = $mail_address;
        $this->mail_subject = $mail_subject;
        $this->mail_message = $mail_message;
        $this->link = $link;
    }
    /**
     * Execute the job.
     */
    public function handle(): void {
        try {
            Mail::to($this->mail_address)->send(new GlobalMail($this->mail_subject, $this->mail_message, $this->link));
        } catch (\Exception $e) {
            info($e->getMessage());
            throw $e;
        }
    }
}
