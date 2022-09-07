<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class QuestionApproved implements ShouldBroadcastNow
{

    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $id;
    //public $question;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
        //$this->question = $question;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    /*public function broadcastOn()
    {
        return new Channel('questions');
    }*/
    
    public function broadcastOn()
    {
        return [new PrivateChannel('user.'.$this->id)];
    }

    
    public function broadcastWith() {
        return [
          'user_id' => $this->id,
        ];
      }
      /*
    public function broadcastWith($event)
    {
        return match ($event) {
            'question_text' => ['question_text' => $this->question->question_text],
            default => ['model' => $this],
        };
    }*/
}
