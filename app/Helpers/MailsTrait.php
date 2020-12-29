<?php
namespace App\Helpers;

use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;

trait MailsTrait
{
	public function sendCodeToMail($email, $code)
    {
        $data = __('lang.your_code', ['model' => $code]);
        
        Mail::to($email)->send(new SendEmail($data, 'emails.code'));
        
    }

}
