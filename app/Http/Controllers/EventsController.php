<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests\EventRequest;
use App\Notice;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Repository\EventRepository;

class EventsController extends Controller
{
    private $Event;
    private $EventRepository;

    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = $this->eventRepository->all();
        return view('admin.event.index',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $image = $request->image;
        $image_new_name = time() . $image->getClientOriginalName();
        $image->move('uploads/banner', $image_new_name);
        $data['image'] = 'uploads/banner/' . $image_new_name;
        $event = Event::create($data);
        session::flash('success','Event created successfully');
        return redirect(route('event.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = $this->eventRepository->findById($id);
        return view('admin.event.view',compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = $this->eventRepository->findById($id);
        return view('admin.event.edit',compact('event'));
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
        $event = $this->eventRepository->findById($id);
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        if ($request->hasFile('image'))
        {
            $image = $request->image;
            $image_new_name = time() . $image->getClientOriginalName();
            $image->move('uploads/banner', $image_new_name);
            $data['image'] = 'uploads/banner/' . $image_new_name;
        }
        $event->fill($data)->save();
        session::flash('success','Event updated successfully');
        return redirect(route('event.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = $this->eventRepository->findById($id);
        $event->delete();
        session::flash('success','Event Deleted Successfully');
        return back();

    }
    public function status($id){
        $event = $this->eventRepository->findById($id);
        if($event->status =='inactive'){
            $event->status='active';
            $event->save();
            session::flash('success','Status changed successfully');
            return back();


        }
        $event->status='inactive';
        $event->save();
        session::flash('success','Status changed successfully');
        return back();

    }
}
