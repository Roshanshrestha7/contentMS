<?php

namespace App\Http\Controllers;

use App\Test;
use Illuminate\Http\Request;

class FrontEController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = Test::all();
        $pageName = Test::where('status','=','active')
            ->orderBy('id','asc')->take(3)
        ->get();

        return view('frontview.test.index',compact('page','pageName'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $page = Test::all();
        $pageName = Test::where('status','=','active')->orderBy('id','asc')->take(3)->get();
        return view('frontview.test.single',compact('page','pageName'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        {
            $page = Test::all();
            $pageName = Test::where('status','=','active')
                ->orderBy('id','asc')->take(3)
                ->get();

            return view('frontview.page.test',compact('page','pageName'));
        }


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
    public function destroy()
    {

    }
}
