<?php

namespace App\Repository;


use App\Image;

class ImageRepository
{

    /**
     * @var Gallery
     */
    private $image;

    public function __construct(Image $image)
    {
        $this->image = $image;
    }

    public function all($galleryId)
    {
        $result= $this->image->select('images.*','images.id as id')
            ->where('gallery_id','=',$galleryId)
            ->orderBy('id','ASC')
            ->get();
        return $result;

    }

    public function findById($id)
    {
        $image = $this->image->find($id);
        return $image;
    }



}