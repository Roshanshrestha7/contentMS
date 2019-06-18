<?php

namespace App\Repository;


use App\Contact;

class ContactRepository
{
    private $contact;

    public function __construct(contact $contact)
    {
        $this->contact = $contact;
    }

    public function all()
    {
        $contact= $this->contact
            ->orderBy('id','desc')
            ->get();
        return $contact;

    }
    public function findById($id)
    {
        $contact = $this->contact->find($id);
        return $contact;
    }



}