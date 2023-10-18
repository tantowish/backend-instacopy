<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\AccountResource;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    public function profile(){
        $user = User::findOrFail(Auth::user()->id);
        return new AccountResource($user->loadMissing('post'));
    }

    public function register(Request $request){
        $validated = $request->validate([
            'username'=>'required|unique:users',
            'email'=>"required|unique:users",
            'password'=>'required',
            'firstName'=>'required'
        ]);
        $validated['password'] = bcrypt($validated['password']);
        $user = User::create($validated);
        return new AccountResource($user->loadMissing('post:id,posts_content'));
    }

    public function update(Request $request, $id){
        $rules = [
            'password'=>'required',
            'firstName'=>'required'
        ];



        $user = User::findOrFail($id);
        if($request['username'] != $user->username){
            $rules['username']='required|unique:users';
            if($request['email'] != $user->email){
                $rules['email']='required|unique:users';
            }
        }
        elseif($request['email'] != $user->email){
            $rules['email']='required|unique:users';
            if($request['username'] != $user->username){
                $rules['username']='required|unique:users';
            }
        }
        else{
            $rules['email']='required';
            $rules['username']='required';
        }
        $validated = $request->validate($rules);
        
        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validated['image'] = $request->file('image')->store('/image/users');
        }
        $validated['password'] = bcrypt($validated['password']);

        User::where('id', $id)->update($validated);

        $updatedUser = User::findOrFail($id);
        return new AccountResource($updatedUser);
    } 
}
