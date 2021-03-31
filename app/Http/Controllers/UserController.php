<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'password' => 'required|min:5',
            'email' => 'required|email|unique:users'
        ], [
            'name.required' => 'Name is required',
            'password.required' => 'Password is required'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $user = User::create($validatedData);
        return back()->with('success', 'User created successfully.');
    }

    public function destroy($id) {
        
        $res=User::find($id)->delete();
        if ($res){
            return back()->with('success', 'User deleted successfully.');
        }
    }

    public function getUser($id) {
        $data=User::find($id);
        if ($data){
            return view('user-update' , ['data' => $data]);
        }else{
            return 'user not found...';
        }
    }

    public function updateUser(Request $user)
    {
        $data=User::find($user->id);
        if ($data){
            $validatedData = $user->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,'.$data->id
    
            ], [
                'name.required' => 'Name is required',
            ]);


    
        }

       $data->name  = $user->name;
       $data->email = $user->email;
       $data->save();
    
       return back()->with('success', 'User Updated successfully.');
    
    }

}
