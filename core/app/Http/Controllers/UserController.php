<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(){

        $users = User::all();

        $products = Product::all();

        return view('front', compact('users', 'products'));

    }

    public function add(){
        return view('user.add');
    }

    public function store(Request $request){

        $request->validate([
            "username" => 'required|max:100|unique:users,username',
            "email" => 'required|email|unique:users,email',
            "city" => 'required|max:50',
            "country" => 'required|max:50',
            "date_of_birth" => 'required',
            "password" => 'required|min:8',
            "status" => 'required|integer|between:0,1'
        ]);

        $user = new User();

        $user->username = $request->username;
        $user->email = $request->email;
        $user->city = $request->city;
        $user->country = $request->country;
        $user->date_of_birth = $request->date_of_birth;
        $user->password = bcrypt($request->password);
        $user->status =$request->status;

        $user->save();

        $notification = [
            "messege" => "New User Registration Successfully",
            "alert" => "success"
        ];

        return redirect(route('front.index'))->with("notification", $notification);
    }

    public function edit($id){

        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));

    }

    public function update(Request $request){

        $user = User::findOrFail($request->id);

      $request->validate([
        "username" => 'required|max:100|unique:users,username,'.$request->id,
        "email" => 'required|email|unique:users,email,'.$request->id,
        "city" => 'required|max:50',
        "country" => 'required|max:50',
        "date_of_birth" => 'required',
        "status" => 'required|integer|between:0,1',
       ]);


        $user->username = $request->username;
        $user->email = $request->email;
        $user->city = $request->city;
        $user->country = $request->country;
        $user->date_of_birth = $request->date_of_birth;
        $user->status =$request->status;

        $user->save();

        $notification = [
            "messege" => "User Information Updated Successfully",
            "alert" => "success"
        ];

        return redirect()->back()->with("notification", $notification);

    }

    public function changepass(Request $request){

        $user = User::findOrFail($request->id);

        $messages = [
            'old_password.required' => 'The old password field is required',
            'password.required' => 'The new password field is required',
        ];

       $validator = Validator::make($request->all(), [
        'old_password' => 'required',
        'password' => 'required|min:8'
       ], $messages);

       if(Hash::check($request->old_password, $user->password)) {
            $oldPassMatch = 'matched';
        } else {
            $oldPassMatch = 'not_matched';
        }

        if ($validator->fails() || $oldPassMatch=='not_matched') {
            if($oldPassMatch == 'not_matched') {
                $validator->errors()->add('oldPassMatch', "Password does'nt match");
            }
            return redirect()->back()->withErrors($validator);
        }

        $user->password = bcrypt($request->password);
        $user->save();

        $notification = [
            "messege" => "User Password Changed Successfully",
            "alert" => "success"
        ];
        return redirect()->back()->with("notification", $notification);
    }

    public function delete(Request $request){

        $user = User::findOrFail($request->id);
        $user->delete();

        $notification = [
            "messege" => "Register User Deleted Successfully",
            "alert" => "success"
        ];

        return redirect()->back()->with("notification", $notification);

    }

}
