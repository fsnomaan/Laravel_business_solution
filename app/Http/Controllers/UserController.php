<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        if(Auth::user()->role!=7){
            Session::flash('message','Sorry! Only admin can create new user.');
            return redirect()->route('home');
        }

        $users=User::where('role','!=',7)
            ->get();
        return view('user.index')->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role!=7){
            Session::flash('message','Sorry! Only admin can create new user.');
            return redirect()->route('home');
        }
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->role!=7){
            Session::flash('message','Sorry! Only admin can create new user.');
            return redirect()->route('home');
        }
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required|numeric',
            'dob' => 'required|date|max:30',
        ]);

        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->role=5;
        $user->password=Hash::make($request->password);
        $user->dob=Carbon::parse($request->dob);
        $user->save();

        Session::flash('message','New user added successfully!');
        return view('user.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::user()->role!=7){
            Session::flash('message','Sorry! Only admin can create new user.');
            return redirect()->route('home');
        }
        $user=User::find($id);
        return view('user.show')->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->role!=7){
            Session::flash('message','Sorry! Only admin can create new user.');
            return redirect()->route('home');
        }
        $user=User::find($id);
        return view('user.edit')->withUser($user);
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
        if(Auth::user()->role!=7){
            Session::flash('message','Sorry! Only admin can create new user.');
            return redirect()->route('home');
        }
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'dob' => 'required|date|max:30',
        ]);

        $user=User::find($id);
        $user->name=$request->name;
        $user->phone=$request->phone;
        $user->dob=Carbon::parse($request->dob);
        $user->save();

        Session::flash('message','User details updated successfully!');
        return redirect()->route('user.index');

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


    public function resetPassword($id)
    {
        return view('reset-password.reset_password')->withId($id);
    }

    public function resetPasswordStore(Request $request, $id)
    {
        $this->validate($request, [
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::find($id);
        $user->password = Hash::make($request->password);
        $user->save();

        Session::flash('message', 'Password successfully changed!');
        return redirect()->back();
    }

    public function changePassword(){
        return view('change-password.change_password');
    }


    public function changePasswordStore(Request $request){
        $this->validate($request, [
            'old_password' => 'required|string|min:6',
            'password' => 'required|string|min:6|confirmed',
        ]);


        if(Hash::check($request->old_password,Auth::user()->password)) {
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request->password);
            $user->save();

            Session::flash('message', 'Password successfully changed!');
            return redirect()->back();
        }else{
            Session::flash('message', 'Current password does not matched!');
            return redirect()->back();
        }
    }

}
