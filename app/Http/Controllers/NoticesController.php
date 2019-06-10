<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoticeRequest;
use App\Notice;
use Illuminate\Http\Request;
use App\Repository\NoticeRepository;
use Illuminate\Support\Facades\Input;
use App\User;
use Auth;
use Session;



class NoticesController extends Controller
{
    private $Notice;
    private $NoticeRepository;

    public function __construct(NoticeRepository $noticeRepository)
    {
        $this->noticeRepository = $noticeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notice =  $this->noticeRepository->all();
        return view('admin.notice.index',compact('notice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NoticeRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $file = Input::file('file');
        $file_new = time() . $file->getClientOriginalName();
        $file->move('uploads/notice', $file_new);
        $data['file'] = 'uploads/notice/' . $file_new;
        $notice = Notice::create($data);

        session::flash('success','notice post successfully');
        return redirect(route('notice.index'));


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notice = $this->noticeRepository->findById($id);
        return view('admin.notice.view',compact('notice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notice = $this->noticeRepository->findById($id);
        return view('admin.notice.edit',compact('notice'));
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
        $notice = $this->noticeRepository->findById($id);
        $data  = $request->all();
        $data['user_id'] = Auth::user()->id;
        if ($request->hasFile('file')){
            $file = Input::file('file');
            $file_new = time() . $file->getClientOriginalName();
            $file->move('uploads/notice', $file_new);
            $data['file'] = 'uploads/notice/' . $file_new;
        }
        $notice->fill($data)->save();
        session::flash('success','Updated Successfully');
        return redirect(route('notice.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notice= $this->noticeRepository->findById($id);
        $notice->delete();
        session::flash('success','Deleted Successfully');
        return back();

    }
    public function status($id){
        $notice = $this->noticeRepository->findById($id);
        if($notice->status =='inactive'){
            $notice->status='active';
            $notice->save();
            session::flash('success','Status changed successfully');
            return back();


        }
        $notice->status='inactive';
        $notice->save();
        session::flash('success','Status changed successfully');
        return back();

    }
}
