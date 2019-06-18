<?php

namespace App\Http\Controllers;

use App\Pages;
use App\Repository\EventRepository;
use App\Repository\NoticeRepository;
use Illuminate\Http\Request;
use App\Repository\PageRepository;
use App\Repository\GalleryRepository;
use App\Gallery;
use App\Repository\ImageRepository;
use App\Notice;

class FrontEndsController extends Controller
{
    private $pages;
    private $gallery;
    private $image;
    private $notice;
    private  $event;
    private $eventRepository;
    private $imageRepository;
    private $pageRepository;
    private $galleryRepository;
    private $noticeRepository;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function  __construct(PageRepository $pageRepository, GalleryRepository $galleryRepository,
                                 ImageRepository $imageRepository, NoticeRepository $noticeRepository,
                                    EventRepository $eventRepository)
    {
        $this->pageRepository = $pageRepository;
        $this->galleryRepository = $galleryRepository;
        $this->imageRepository = $imageRepository;
        $this->eventRepository = $eventRepository;
        $this->noticeRepository = $noticeRepository;
    }

    public function index()

    {
        $gallery = $this->galleryRepository->bodyimage();
        $page = Pages::all();
        $pageName = $this->pageRepository->status();
        $slider = $this->galleryRepository->carousel();


        return view('frontend.index',compact('page','pageName','slider','gallery'));

//        return view('frontview.page.test');
    }
    public function getImages($galleryId){

//        if ($request->has('gallery_id') && $request->gallery_id != null) {
//            $galleryId = $request->get('gallery_id');
//        } else {
//            $galleryId = 0;
//        }
        $pageName = $this->pageRepository->status();
        $gallery = $this->galleryRepository->findById($galleryId);
        $images = $this->imageRepository->all($galleryId);
        return view('frontend.gallery',compact('images','gallery','pageName'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pageName = $this->pageRepository->status();
        $pages = $this->pageRepository->findById($id);
        return view('frontend.single',compact('pages','pageName'));
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
        //
    }
    public function form()
    {
        $pageName = $this->pageRepository->status();

        return view('frontend.contactus',compact('pageName'));
    }
    public function notice()
    {
        $pageName = $this->pageRepository->status();
        $notice = $this->noticeRepository->status();
        return view('frontend.notice',compact('pageName','notice'));
    }
    public function singlenot($id)
    {
        $notice = $this->noticeRepository->findById($id);
        $pageName = $this->pageRepository->status();

        return view('frontend.singlenotice',compact('notice','pageName'));
    }
    public function event()
    {
        $pageName = $this->pageRepository->status();
        $events = $this->eventRepository->status();
        return view('frontend.event',compact('pageName','events'));
    }
    public  function singleevent($id)
    {
        $event = $this->eventRepository->findById($id);
        $pageName = $this->pageRepository->status();
        return view('frontend.eventsingle',compact('pageName','event'));
    }
}
