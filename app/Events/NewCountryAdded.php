<?php

// A data container which holds the information related to the event
namespace App\Events;

use App\Country;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewCountryAdded implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public $country;
    public $countryCode;
    public $now;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct ($country, $countryCode, $now)
    {
        $this->country = $country;
        $this->countryCode = $countryCode;
        $this->now = $now;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('main');
    }
}
