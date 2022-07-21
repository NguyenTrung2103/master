<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InformUserProfile extends Mailable
{
    use Queueable;
    use SerializesModels;

    protected $user;
    protected $attachment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $attachment = null)
    {
        $this->user = $user;
        $this->attachment = $attachment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = $this->view(
            'admin.users.inform-user-profile-mail',
            [
            'user' => $this->user,
        ]
        );

        if ($this->attachment) {
            $mail->attach($this->attachment, [
                  'as' => ''.$this->attachment->getClientOriginalName(),
           ]);
        }

        return $mail;
    }
}
