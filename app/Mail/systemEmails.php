<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class systemEmails extends Mailable
{
    use Queueable, SerializesModels;

    public $mail_message;
    public $subject = 'Hotelis System Emails'; // create email subject field in the view later,mails need a subject

    /**
     * Create a new message instance.
     */
    public function __construct($mail_message)
    {
        $this->mail_message = $mail_message;
        $this->subject;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('vinegroup@gmail.com', 'John Doe'),  // mail and name of sender
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'Emails.system-emails-template',
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
