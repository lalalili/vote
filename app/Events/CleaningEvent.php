<?php

namespace App\Events;

use App\Events\Event;
use App\Models\Photo;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CleaningEvent extends Event
{
    use SerializesModels;

    public $photo;
    /**
     * Create a new event instance.
     *
     * @param $photo
     */
    public function __construct($photo)
    {
        $this->photo = $photo;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
