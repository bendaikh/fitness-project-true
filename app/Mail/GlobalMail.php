<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class GlobalMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mail_subject;

    public $mail_message;

    public array $link;

    /**
     * Create a new message instance.
     *
     * @param  string  $mail_subject  The subject of the email.
     * @param  string  $mail_message  The body message of the email.
     * @param  array  $link  An associative array containing one key-value pair. Example: ['Link Name' => 'https://example.com/link']
     * @return void
     */

    /**
     * Create a new message instance.
     */
    public function __construct($mail_subject, $mail_message, $link = [])
    {
        $this->mail_subject = $mail_subject;
        $this->mail_message = $mail_message;
        $this->link = $link;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->mail_subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.global_mail',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
