<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue; // (1) اتأكد إن دي موجودة
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WelcomeUser extends Mailable implements ShouldQueue // (2) ودي
{
    use Queueable, SerializesModels;

    public User $user; // (3) عشان نمرر اليوزر

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject:"Welcome User",
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'email',
        );
    }
}
