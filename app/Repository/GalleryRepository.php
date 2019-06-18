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
            ->paginate(5);


        return $gallery;

    }

    public function findById($id)
    {
        $gallery = $this->gallery->find($id);
        return $gallery;
    }
    public function carousel()
    {
        $gallery = $this->gallery->select('galleries.*')
            ->where('status','=','active')
            ->where('banner','=','yes')
            ->orderBy('id','desc')->limit(3)
            ->get();
        return $gallery;
    }
    public function bodyimage()
    {
        $gallery = $this->gallery->select('galleries.*')
            ->where('status','=','active')
            ->orderBy('id','asc')
            ->get();
        return $gallery;
    }



}