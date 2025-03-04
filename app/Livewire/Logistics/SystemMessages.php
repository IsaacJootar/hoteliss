<?php

namespace App\Livewire\Logistics;
use Livewire\Component;
use App\Models\SystemMessage;
use Livewire\Attributes\Title;
use App\Services\EmailMessageService;

#[Title('Logistics | Messaging')]
class SystemMessages extends Component
{


    public  $messages; // message instance
    public $message;
    public $message_type;
    public $sent_by = 12345; //userID= '12345'; // hardcode User ID for now til Auth Module is  ready

    public $sent_to = 124578; // user

    public $message_id; // give me a random numberto identify each message

    public $section = 'Logistics'; //Hotel Section,like depart






    public function sendMessage()
    {

        $this->message_id = mt_rand(100000, 999999); // give me a random number
        $system_message = app(abstract: EmailMessageService::class); // inject the dependency class
        $system_message->SendMessageAndCreateRecord($this->message, $this->message_type = 'message', $this->message_id,  $this->sent_by, $this->sent_to, $this->section);
        toastr()->info('Message Has Been Sent Successfuly');
        $this->reset();


    }

    public function sendEmail()
    {

        //dd($this->message);
        $this->message_id = mt_rand(100000, 999999); // give me a random number
        $system_message = app(abstract: EmailMessageService::class); // inject the dependency class
        $system_message->SendMessageAndCreateRecord($this->message, $this->message_type = 'email',  $this->message_id,   $this->sent_by, $this->sent_to, $this->section);

        toastr()->info('Email Has Been Sent Successfuly');
        $this->reset();


    }
    public function render()
    {
        $this->messages = SystemMessage::all();
        return view('livewire.logistics.system-messages')->layout('layouts.logistics');
    }
}
