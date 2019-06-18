<?php

namespace App\Repository;


use App\Event;

class EventRepository
{
    private $event;

    public function __construct(event $event)
    {
        $this->event = $event;
    }

    public function all()
    {
        $event= $this->event
            ->orderBy('id','ASC')
            ->get();
        return $event;

    }
    public function findById($id)
    {
        $event = $this->event->find($id);
        return $event;
    }
    public function status()
    {
        $event = $this->event->where('status','=','active')
            ->orderBy('id','desc')
            ->paginate(8);
        return $event;
    }



}