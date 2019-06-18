<?php

namespace App\Repository;


use App\Newsletter;

class NewsletterRepository
{
    private $newsletter;

    public function __construct(newsletter $newsletter)
    {
        $this->newsletter = $newsletter;
    }

    public function all()
    {
        $newsletter= $this->newsletter
            ->orderBy('id','ASC')
            ->get();
        return $newsletter;

    }
    public function findById($id)
    {
        $newsletter = $this->newsletter->find($id);
        return $newsletter;
    }
    public function status()
    {
        $newsletter = $this->newsletter->where('status','=','active')
            ->orderBy('id','desc')
            ->get();
        return $newsletter;
    }



}