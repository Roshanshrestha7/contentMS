<?php

namespace App\Repository;


use App\Gallery;

class GalleryRepository
{

    /**
     * @var Gallery
     */
    private $gallery;

    public function __construct(Gallery $gallery)
    {
        $this->gallery = $gallery;
    }

    public function all()
    {
        $gallery= $this->gallery->select('galleries.*')
            ->orderBy('id','ASC')
            ->get();

        $galleries=$this->gallery->all();
        return $gallery;

    }

    public function findById($id)
    {
        $gallery = $this->gallery->find($id);
        return $gallery;
    }



}