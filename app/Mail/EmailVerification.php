<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class EmailVerification extends Mailable
{
    use Queueable, SerializesModels;

    public $url;
    public $user;

    public function __construct($user)
    {
        $generate = URL::temporarySignedRoute('verify.email',now()->addMinute(30),['email'=>$user->email]);
        $this->url = str_replace(env('APP_URL'),env('FRONTEND_URL'), $generate);
    }


    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Email Verification',
        );
    }


    public function content(): Content
    {
        return new Content(
            markdown: 'emails.email_verification',
                with: [
                'url' => $this->url
               ],
        );
    }


    public function attachments(): array
    {
        return [];
    }
}
