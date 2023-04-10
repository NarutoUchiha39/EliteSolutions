<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class request_problem extends Mailable
{
    use Queueable, SerializesModels;
    public string $url;
    public string $Description;
    public string $title;
    public string $category;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($url,$Description,$title,$category)
    {
        $this->url = $url;
        $this->Description = $Description;
        $this->title = $title;
        $this->category = $category;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Request Problem',
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
            view: 'REQ',
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
