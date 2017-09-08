<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;

class ResetPassword extends ResetPasswordNotification
{
    use Queueable;

    public $nama_lengkap;
    public $username;

    /**
     * Create a notification instance.
     *
     * @param  string  $token
     * @return void
     */
    public function __construct($token, $nama_lengkap, $username)
    {
        $this->token = $token;
        $this->nama_lengkap = $nama_lengkap;
        $this->username = $username;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Permintaan Reset Password')
                    ->greeting('Assalamu`alaikum, '.$this->nama_lengkap.'.')
                    ->line('Username anda adalah '.$this->username)
                    ->line('Silakan klik tombol di bawah ini untuk melakukan reset password.')
                    ->action('Reset Password', url('password/reset', $this->token))
                    ->line('Apabila Anda tidak meminta reset password, abaikan pesan ini.')
                    ->line('Silakan hubungi admin SIM LPQ jika masih ada masalah.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
