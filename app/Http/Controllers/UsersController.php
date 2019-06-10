<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Mail;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $password = str_random('8');
        $value = $request->all();
        $avatar = $request->avatar;
        $avatar_new_name = time() . $avatar->getClientOriginalName();
        $avatar->move('uploads/avatar', $avatar_new_name);
        $value['avatar'] = 'uploads/avatar/' . $avatar_new_name;
        $value['password'] = bcrypt($password);
        $user = User::create($value);
        if ($user)
            Mail::send('frontend.addUser', ['email' => $request->email, 'password' => $password], function ($m) use ($request) {
                $m->to($request->email)->subject('User Registration Information');
            });

        Session::flash('success', 'User created Successfully');
        return redirect(route('user.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);

        $data = $request->all();


        $user = User::find($id);
        if($request->hasFile('avatar')){
            $avatar = $request->avatar;
            $avatar_new_name = time() . $avatar->getClientOriginalName();
            $avatar->move('uploads/avatar', $avatar_new_name);
            $data['avatar'] = 'uploads/avatar/' . $avatar_new_name;
        }
        if ($request->has('password'))
        {
            $data['password']= bcrypt($request->password);
        }
        $user->fill($data)->save();
        session::flash('success','Profile updated');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function changePassword(Request $request){

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);





        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        session::flash('success','Password changed successfully');
        return back();

    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        session::flash('success','user deleted');
        return redirect()->back();
    }
    public function admin($id)
    {
        $user = User::find($id);
        if($user->admin == '0'){
            $user->admin = '1';
            $user->save();
            session::flash('success','permission changed');
            return back();
        }
        else
        {
            $user->admin = '0';
            $user->save();
            session::flash('success','permission changed');
            return back();
        }

    }
}
