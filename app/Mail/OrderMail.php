<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;
    public Order $order;
    
    public function __construct($order)
    {
        $this->order = $order;
    }

    
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Подтверждение заказа с Pandbox.kz',
        );
    }

    
    public function content(): Content
    {
        return new Content(
            view: 'mails.order-mail',
        );
    }

    
    public function attachments(): array
    {
        return [];
    }
}
