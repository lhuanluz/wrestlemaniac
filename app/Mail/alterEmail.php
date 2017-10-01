<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
class alterEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $newEmail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, String $newEmail)
    {
        //
        $this->user = $user;
        $this->newEmail = $newEmail;    
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.user.alterEmail')
        ->with([
            'verifyCode' => $this->user->verifyCode,
            'name' => $this->user->name,
            'newEmail' => $this->newEmail
            ]);
    }
}
