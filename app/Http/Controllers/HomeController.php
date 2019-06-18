<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Gallery;
use App\Pages;
use App\Notice;
use App\Event;
use App\subscribe;
use App\User;
use App\Image;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.layout.dashboard')
            ->with('gallery_count',Gallery::all()->count())
            ->with('pages_count',Pages::all()->count())
            ->with('notice_count',Notice::all()->count())
            ->with('event_count',Event::all()->count())
            ->with('user_count',User::all()->count())
            ->with('image_count',Image::all()->count())
            ->with('subscribe_count',subscribe::all()->count())
            ->with('message_count',Contact::all()->count());
    }
}
