<?php

namespace App\Repository;


use App\Pages;

class PageRepository
{

    /**
     * @var Pages
     */
    private $pages;

    public function __construct(Pages $pages)
    {
        $this->pages = $pages;
    }

    public function all()
    {
        $pages= $this->pages->select('pages.*' ,'pages.id as id')
        ->orderBy('order')
            ->get();
        return $pages;

    }

    public function findById($id)
    {
        $pages = $this->pages->find($id);
        return $pages;
    }
    public  function getParent(){
        $pages = $this->pages->where('status','active')
            ->orderBy('order','desc')
            ->get();
        return $pages;
    }


}