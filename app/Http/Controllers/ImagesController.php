<?php

namespace App\Http\Controllers;

use App\Image;
use App\Repository\GalleryRepository;
use App\Repository\ImageRepository;
use Illuminate\Http\Request;
use App\Http\Requests\ImageRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Session;
use App\Gallery;

class ImagesController extends Controller
{
    private $Image;
    /**
     * @var GalleryRepository
     */
    private $galleryRepository;
    private $imageRepository;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(ImageRepository $imageRepository,
    GalleryRepository $galleryRepository)
    {
        $this->imageRepository = $imageRepository;
        $this->galleryRepository = $galleryRepository;
    }

    public function index($id)
    {

    }
    public function getImages($galleryId){

//        if ($request->has('gallery_id') && $request->gallery_id != null) {
//            $galleryId = $request->get('gallery_id');
//        } else {
//            $galleryId = 0;
//        }
        $gallery = $this->galleryRepository->findById($galleryId);
        $images = $this->imageRepository->all($galleryId);
        return view('admin.imagecoll.index',compact('images','gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function createImages($galleryId){
        $gallery = $this->galleryRepository->findById($galleryId);
        return view('admin.imagecoll.create',compact('gallery'));

    }
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImageRequest $request )
    {
        $data=$request->all();
        $galleryId = $request->gallery_id;
        $image = Input::file('image');
        $photo = [];
        foreach ($image as $val) {
            $image_extension = $val->getClientOriginalExtension();
            $image_name = 'image'.str_random(15).'.'. strtolower($image_extension);
            Storage::putFileAs('public/uploads/images/' . '/', $val, $image_name);
            $photo[] = $image_name;
        }
        $data['image']=json_encode($photo);
        $data['gallery_id'] = $galleryId;
        $image = Image::create($data);

        if($image){

            session::flash('success','Image collection created successfully');
            return redirect(url('/admin/getImage/'.$request->gallery_id));
        }else{

            session::flash('error','Image could not created');
            return back();

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = $this->imageRepository->findById($id);
        $image->delete();
        session::flash('success','Image Deleted');
        return redirect()->back();
    }
}
