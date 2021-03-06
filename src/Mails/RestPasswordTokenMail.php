<?php

namespace Heloufir\SimplePassport\Mails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RestPasswordTokenMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var
     */
    protected $user;

    /**
     * Create a new message instance.
     *
     * @param  $user
     */
    public function __construct( $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('simple-passport.forgot-password')
                    ->with(['user' => $this->user])
                    ->from(config('simple-passport.mail_from'), config('simple-passport.mail_from_name'))
                    ->subject(trans('simple-passport::forgot-password.mail_subject'));
    }
}
