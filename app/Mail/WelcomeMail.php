<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;

    public $password;

    public $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$password,$email)
    {
        $this->name=$name;
        $this->password=$password;
        $this->email=$email;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function build()
    {
        return $this->from('vanessachebukwa@gmail.com', 'Biti Agency')
        ->markdown('admins.welcomeMail')
        ->subject('Thank you for choosing Biti Agency!');
    }

    public function attachments()
    {
        return [];
    }
}
