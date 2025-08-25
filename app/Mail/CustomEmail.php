<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $subject;
    public $messageBody;
    public function __construct($subject, $messageBody)
    {
        $this->subject = $subject;
        $this->messageBody = $messageBody;
    }
    public function build()
    {
        return $this->subject($this->subject)
            ->view('emails.custom') // vista Blade para el correo
            ->with([
                'messageBody' => $this->messageBody,
            ]);
    }
}
