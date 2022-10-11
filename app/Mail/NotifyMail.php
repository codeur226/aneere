<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($rapport, $responsable)
    {
        $this->rapport = $rapport;
        $this->responsable = $responsable;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $rapport = $this->rapport;
        $responsable = $this->responsable;

        return $this->subject("$rapport->libelle")->markdown('emails.notifyMail', ['rapport' => $rapport, 'responsable' => $responsable]);
    }
}
