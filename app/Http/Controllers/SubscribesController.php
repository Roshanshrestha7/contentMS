<?php

namespace App\Http\Controllers;

use App\subscribe;
use Illuminate\Http\Request;
use Session;
use App\Repository\SubscribeRepository;

class SubscribesController extends Controller
{
    private $Subscribe;
    private $SubscribeRepository;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(SubscribeRepository $subscribeRepository)
    {
        $this->subscribeRepository = $subscribeRepository;
     }

    public function index()
    {
        $subscribe = $this->subscribeRepository->all();
        return view('admin.subscribe.index',compact('subscribe'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subscribe = subscribe::create($request->all());
        session::flash('success','Subscribed Successfully!');
        return redirect()->back();
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
        $subscribe = $this->subscribeRepository->findById($id);
        $subscribe->delete();
        session::flash('success','Deleted Successfully');
        return back();
    }
    public function status($id){
        $subscribe = $this->subscribeRepository->findById($id);
        if($subscribe->status =='inactive'){
            $subscribe->status='active';
            $subscribe->save();
            session::flash('success','Status changed successfully');
            return back();


        }
        $subscribe->status='inactive';
        $subscribe->save();
        session::flash('success','Status changed successfully');
        return back();

    }
}
