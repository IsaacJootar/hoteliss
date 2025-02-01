<?php

namespace App\Services;

use Carbon\Carbon;
use App\Mail\systemEmails;
use Illuminate\Support\Str;
use App\Models\SystemMessage;
use Illuminate\Support\Facades\Mail;



class EmailMessageService
{



    public function SendMessageAndCreateRecord($message,  $message_type,  $message_id, $sent_by, $sent_to,  $section)
    {

        switch ($message_type) {

            case 'message':
                SystemMessage::create([
                    'message' => $message,
                    'message_type' => $message_type,
                    'message_id' => $message_id,
                    'sent_by' => $sent_by,
                    'sent_to' => $sent_to,
                    'section' => Str::upper($section),
                    'date' => Carbon::now()->timezone('Africa/Lagos')->format('Y-m-d'), // create a class later to accomodate other timezones
                ]);

                break;
            case 'email':

                $to_mail = 'jootarisaac@gmail.com';//for now till auth is ready
                Mail::to($to_mail)->send(new systemEmails($message));

                SystemMessage::create([
                    'message' => $message,
                    'message_type' => $message_type,
                    'message_id' => $message_id,
                    'sent_by' => $sent_by,
                    'sent_to' => $sent_to,
                    'section' => Str::upper($section),
                    'date' => Carbon::now()->timezone('Africa/Lagos')->format('Y-m-d'), // create a class later to accomodate other timezones
                ]);


                break;

            default:
                SystemMessage::create([
                    'message' => $message,
                    'message_id' => $message_id,
                    'sent_by' => $sent_by,
                    'sent_to' => $sent_to,
                    'section' => Str::upper($section)
                ]);
        }
    }
}
