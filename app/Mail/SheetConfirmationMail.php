<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SheetConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $book;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($book)
    {
        $this->book = $book;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $qrCode = \QrCode::size(100)
            ->format('svg')
            ->generate('bb.team.bougaoua@gmail.com');
        return $this->view('sheet',['qrCode' => $qrCode,'book' => $this->book]);
    }
}
