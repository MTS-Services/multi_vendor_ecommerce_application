<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;

class StaffVerifyEmail extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct()
    {
        // Force all generated URLs to use http://localhost
        URL::forceRootUrl('http://localhost');
        // (Optional) If you ever need HTTPS:
        // URL::forceScheme('https');
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $verificationUrl = $this->verificationUrl($notifiable);

        return (new MailMessage)
                    ->subject('Verify Your Staff Account Email Address')
                    ->line('Please click the button below to verify your email address for your staff account.')
                    ->action('Verify Email Address', $verificationUrl)
                    ->line('If you did not create an account, no further action is required.')
                    ->line('This verification link will expire in '
                          . config('auth.verification.expire', 60)
                          . ' minutes.');
    }

    protected function verificationUrl($notifiable)
    {
        return URL::temporarySignedRoute(
            'staff.verification.verify',
            Carbon::now()->addMinutes(config('auth.verification.expire', 60)),
            [
                'id'   => $notifiable->getKey(),
                'hash' => sha1($notifiable->getEmailForVerification()),
            ]
        );
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
