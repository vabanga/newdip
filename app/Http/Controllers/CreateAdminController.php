<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class CreateAdminController extends Controller
{
    public function index()
    {
        return view('page.pageIndexInterface.creatAdmin');
    }

    public function create(Request $request)
    {
        $input = $request->all();
        if(!empty($input['Create'])){
            $this->validate($request, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:5|confirmed',
            ]);
            $input = $request->all();
            $arr = [
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => bcrypt($input['password']),
                'remember_token' => $input['_token']
            ];
            User::create($arr);
            return redirect('/admin/create');
        }
    }
}
