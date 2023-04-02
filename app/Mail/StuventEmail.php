<?php

namespace App\Mail;

use App\Models\RegistrationEvent;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class StuventEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $registMahasiswa;
    public $registUmum;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($type, $registId)
    {
        if($type == 'registMhs'){
            $this->registMahasiswa = RegistrationEvent::where('id', $registId)->with('profileMahasiswa','event', 'event.profile')->first();
        } else if($type == 'registUmum'){
            $this->registUmum = RegistrationEvent::where('id', $registId)->with('profileGeneral','event', 'event.profile')->first();
        }
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Stuvent Email',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'mail.payment-ticket',
            with: ['registMhs' => $this->registMahasiswa, 'registUmum' => $this->registUmum]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
