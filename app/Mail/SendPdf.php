<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendPdf extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($files)
    {
        $this->files = $files;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.pdf')->attach(storage_path('app/public/pdf/'.$this->files['blank_ticket_template']))
        ->attach(storage_path('app/public/pdf/'.$this->files['blank_sale_order']))
        ->attach(storage_path('app/public/pdf/'.$this->files['product_sample_ticket']));
    }
}
