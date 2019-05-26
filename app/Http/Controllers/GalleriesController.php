<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Http\Requests\GalleryRequest;
use App\Repository\GalleryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Session;
class GalleriesController extends Controller
{
    private $Gallery;
    /**
     * @var GalleryRepository
     */
    private $galleryRepositary;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(GalleryRepository $galleryRepositary)
    {
        $this->galleryRepositary = $galleryRepositary;
    }


    public function index()
    {
        $gallery = $this->galleryRepositary->all();

        return view('admin.gallery.index',compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryRequest $request)
    {
        $data=$request->all();
        $image = Input::file('image');
        $photo = [];
        foreach ($image as $val) {
            $image_extension = $val->getClientOriginalExtension();
            $image_name = 'gallery_image'.str_random(15).'.'. strtolower($image_extension);
            Storage::putFileAs('public/uploads/gallery/' . '/', $val, $image_name);
            $photo[] = $image_name;
        }
        $data['image']=json_encode($photo);
        $Gallery = Gallery::create($data);

        session::flash('success','Gallery created successfully');
        return redirect(route('gallery.index'));
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
        $gallery = $this->galleryRepositary->findById($id);
        $galleries = $this->galleryRepositary->all();
        return view('admin.gallery.edit',compact('gallery','galleries'));
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
        $gallery = $this->galleryRepositary->findById($id);
        $data=$request->all();
        if($request->hasFile('image'))
        {

            $image = Input::file('image');
            $photo = [];
            foreach ($image as $val) {
                $image_extension = $val->getClientOriginalExtension();
                $image_name = 'gallery_image'.str_random(15).'.'. strtolower($image_extension);
                Storage::putFileAs('public/uploads/gallery/' . '/', $val, $image_name);
                $photo[] = $image_name;

            }
            $data['image']=json_encode($photo);
        }
        $gallery->fill($data)->save();


        session::flash('success','Gallery Successfully Updated');
        return redirect(route('gallery.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $gallery = $this->galleryRepositary->findById($id);
       $gallery->delete();
       session::flash('success','Gallery Deleted');
       return redirect()->back();
    }

    public function status($id){
        $gallery = $this->galleryRepositary->findById($id);
        if($gallery->status =='inactive'){
            $gallery->status='active';
            $gallery->save();
            session::flash('success','Status changed successfully');
            return back();


        }
        $gallery->status='inactive';
        $gallery->save();
        session::flash('success','Status changed successfully');
        return back();

    }
    public function banner($id){
        $gallery = $this->galleryRepositary->findById($id);
        if($gallery->banner =='no'){
            $gallery->banner='yes';
            $gallery->save();
            session::flash('success','banner changed successfully');
            return back();


        }
        $gallery->banner='no';
        $gallery->save();
        session::flash('success','banner changed successfully');
        return back();

    }
}
