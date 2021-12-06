<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AssetAssignMail extends Mailable
{
    use Queueable, SerializesModels;

        public $asset;
        public $employee;


    public function __construct($asset,$employee)
    {
       $this->asset = $asset;
       $this->employee = $employee;
    }


    public function build()
    {
         return $this->subject('Asset Assign Confirmation - Asset Management')
                ->view('email.confirmationMail');
    }
}
