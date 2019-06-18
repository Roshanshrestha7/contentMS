<?php

namespace App\Repository;


use App\Subscribe;

class SubscribeRepository
{
    private $subscribe;

    public function __construct(subscribe $subscribe)
    {
        $this->subscribe = $subscribe;
    }

    public function all()
    {
        $subscribe= $this->subscribe
            ->orderBy('id','ASC')
            ->get();
        return $subscribe;

    }
    public function findById($id)
    {
        $subscribe = $this->subscribe->find($id);
        return $subscribe;
    }



}