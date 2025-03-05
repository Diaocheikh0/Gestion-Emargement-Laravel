<?php

namespace App\Mail;

use App\Models\Cours;
use App\Models\CoursProfesseur;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AttributionCoursMail extends Mailable
{
    use Queueable, SerializesModels;

    public $cours;
    public $professeur;

    /**
     * Create a new message instance.
     *
     * @param  Cours  $cours
     * @param  CoursProfesseur  $professeur
     * @return void
     */
    public function __construct(Cours $cours, CoursProfesseur $professeur)
    {
        $this->cours = $cours;
        $this->professeur = $professeur;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Attribution de Cours'
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.attribution',  // Vue pour l'email
            with: [
                'cours' => $this->cours,
                'professeur' => $this->professeur,
            ]
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
