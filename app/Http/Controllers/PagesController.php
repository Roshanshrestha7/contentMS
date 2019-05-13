<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageRequest;
use App\Http\Requests\UpdatePageRequest;
use Illuminate\Http\Request;
use App\Page;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = Page::all();
        return view('admin.page.index')->with('pages',Page::all())->with('no', 1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {
//        dd($request);

        $data=$request->all();
            $banner = Input::file('banner');
            $photo = [];
        foreach ($banner as $val) {
            $image_extension = $val->getClientOriginalExtension();
            $image_name = 'page_banner'.str_random(15).'.'. strtolower($image_extension);
            Storage::putFileAs('public/uploads/page/' . '/', $val, $image_name);
            $photo[] = $image_name;
        }
            $data['banner']=json_encode($photo);
//        $banner = $request->banner;
//        $banner_new_name = $banner->getClientOriginalName();
//        $banner->move('uploads',$banner_new_name);


            $page = Page::create($data);


        return redirect()->route('page.index')->with('info','page created ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = Page::find($id);
        return view('admin.page.view')->with('page',$page);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::find($id);
        return view('admin.page.edit')->with('pages',Page::all())->with('page',$page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePageRequest $request, $id)
    {

        $page = Page::find($id);
        $data = $request->all();
        $banner = Input::file('banner');
        $photo = [];
        foreach ($banner as $val) {
            $image_extension = $val->getClientOriginalExtension();
            $image_name = 'page_banner'.str_random(15).'.'. strtolower($image_extension);
            Storage::putFileAs('public/uploads/page/' . '/', $val, $image_name);
            $photo[] = $image_name;
        }
        $data['banner']=json_encode($photo);
        $page->fill($data)->save();
        return redirect()->route('page.index')->with('info','page updated');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::find($id);
        $page->delete();
        return redirect()->back()->with('danger','page deleted');

    }
    public function status($id){
        $page = Page::find($id);
        if($page->status =='inactive'){
            $page->status='active';
            $page->save();
            return back();


        }
            $page->status='inactive';
            $page->save();
        return back();

    }
}
