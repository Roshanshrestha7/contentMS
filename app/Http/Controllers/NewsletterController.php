<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsletterRequest;
use App\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;
use App\Repository\NewsletterRepository;

class NewsletterController extends Controller
{
    private $Newsletter;
    private $NewsletterRepository;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(NewsletterRepository $newsletterRepository)
    {
        $this->newsletterRepository = $newsletterRepository;
    }

    public function index()
    {
        $newsletter = $this->newsletterRepository->all();
        return view('admin.newsletter.index',compact('newsletter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.newsletter.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsletterRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('file')) {
            $file = Input::file('file');
            $file_new = time() . $file->getClientOriginalName();
            $file->move('uploads/newsletter', $file_new);
            $data['file'] = 'uploads/newsletter/' . $file_new;
        }
        $newsletter = Newsletter::create($data);
        session::flash('success','Message created successfully');
        return redirect(route('newsletter.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $newsletter = $this->newsletterRepository->findById($id);
        return view('admin.newsletter.view',compact('newsletter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $newsletter = $this->newsletterRepository->findById($id);
        return view('admin.newsletter.edit',compact('newsletter'));
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
        $newsletter = $this->newsletterRepository->findById($id);
        $data  = $request->all();
        if ($request->hasFile('file')){
            $file = Input::file('file');
            $file_new = time() . $file->getClientOriginalName();
            $file->move('uploads/newsletter', $file_new);
            $data['file'] = 'uploads/newsletter/' . $file_new;
        }
        $newsletter->fill($data)->save();
        session::flash('success','Updated Successfully');
        return redirect(route('newsletter.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $newletter = $this->newsletterRepository->findById($id);
        $newletter->delete();
        session::flash('success','Deleted Successfully');
        return back();
    }
}
