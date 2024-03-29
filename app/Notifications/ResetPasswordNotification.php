<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
    use Queueable;

    public $token;

    /**
     * Create a new notification instance.
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
{
    return (new MailMessage)
        ->greeting('Buenas tardes')
        ->subject('Notificacion de restablecimiento de contraseña')
        ->line('Has recibido este email debido a que se te ha olvidado la contraseña. Clickeando en el botón de abajo puedes restablecer tu contraseña')
        ->action('Restablecer Contraseña', route('password.reset', $this->token))
        ->line('Si has recibido este mensaje sin haberlo pedido previamente, cámbia la contraseña inmediatamente.');
}

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
