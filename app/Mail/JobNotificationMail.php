<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JobNotificationMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user,$listing;
    public function __construct($user,$listing){
        $this->user=$user;
        $this->listing=$listing;
    }
    public function build(){
        return $this->markdown('emails.job-notification-email')->subject(config('app.name'). ', Job Notification');
    }
}

?>