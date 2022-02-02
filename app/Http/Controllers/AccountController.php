<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AccountController extends Controller
{

    public function index()
    {
        return view('account');
    }
    
    public function updategeneral($id, Request $request)
    {
        
        $imagenameget = $id.'.png';
        
        if ($request->file('user_img')) {
            $imagePath = $request->file('user_img');
            
            $imagenameget = $id.'.png';
            $imagePath->move(public_path('/app-assets/uploads/users/'), $imagenameget);

        }
        DB::table('users')->where('id', $id)->update([
            'name' => $request->username,
            'email'=> $request->useremail,
            'user_img' => '/app-assets/uploads/users/'.$imagenameget
        ]);

        return response()->json(['success'=>true]);
    }
    public function updatechangepass($id, Request $request)
    {
        $users = DB::table('users')->where('id', $id)->get('password');
        foreach($users as $user){
            $password = $user->password;
          }
        $validatedData = $request->validate([
            'password' => 'required',
            'new_password' => 'required',
        ]);
        if(Hash::check($validatedData['password'], $password) == 1){
            DB::table('users')->where('id', $id)->update([
                'password' => Hash::make($validatedData['new_password'])
            ]);
            return response()->json(['success'=>true]);
        }
        else{
            return response()->json(['success'=>false]);
        }

    }
}