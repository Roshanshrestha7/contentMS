<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageRequest;
use App\Pages;
use App\Repository\PageRepository;
use Session;

class PagesController extends Controller
{
    /**
     * @var Pages
     */
    private $pages;
    /*
     * @var PageRepository
     * */
    private  $pageRepository;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(PageRepository $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    public function index()
    {
        $page = $this->pageRepository->all();
        return view('admin.pages.index',compact('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentPage = $this->pageRepository->getParent();
        return view('admin.pages.create',compact('parentPage'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {
        try{

            $pages = Pages::create($request->all());

            if($pages){

                session::flash('success','you created page successfully');

            }else{
                session::flash('error','Could not created !!');

            }
            return redirect(route('page.index'));

        }catch (Exception $exception){

            $e=$exception->getMessage();
            session()->flash('error','Exception :'.$e);
            return redirect(route('page.index'));


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
       $page = $this->pageRepository->findById($id);
       $pages=$this->pageRepository->all();
       return view('admin.pages.view',compact('page','pages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page =$this->pageRepository->findById($id);
        $pages=$this->pageRepository->all();
        return view('admin.pages.edit',compact('page','pages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PageRequest $request, $id)
    {
        $page = $this->pageRepository->findById($id);
        if($page){
            $page->fill($request->all())->save();
            session::flash('success','pages updated');
            return redirect(route('page.index'));
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pages = $this->pageRepository->findById($id);
        $pages->delete();
        session::flash('success','Deleted Successfully');
        return back();
    }
    public function status($id){
        $page = $this->pageRepository->findById($id);
        if($page->status =='inactive'){
            $page->status='active';
            $page->save();
            session::flash('success','Status changed successfully');
            return back();


        }
        $page->status='inactive';
        $page->save();
        session::flash('success','Status changed successfully');
        return back();

    }
}
