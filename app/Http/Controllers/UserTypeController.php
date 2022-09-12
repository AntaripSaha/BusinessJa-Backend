<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserTypeController extends Controller
{
    public function index(){
        return view ('auth.user_type');
    }
    public function store(Request $request){
        User::where('id', auth()->user()->id)->update([
            'user_type'=>$request->user_type
        ]);
        return redirect(route('users.profile'));
    }
}
