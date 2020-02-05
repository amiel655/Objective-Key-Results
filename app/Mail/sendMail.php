<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
class sendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
                    ->view('emails/upload')
                    ->subject('Today Okr')
                    ->attach($this->data['document']->getRealPath(),
                    [
                        'as' => $this->data['document']->getClientOriginalName(),
                        'mime' => $this->data['document']->getClientMimeType(),
                    ]);
    }
}
