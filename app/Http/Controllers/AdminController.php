<?php
/**
 * Created by PhpStorm.
 * User: Shisui
 * Date: 26.09.2017
 * Time: 4:09
 */

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('page.indexInterface');
    }
    public function changeAndDelete(Request $request)
    {

        $input = $request->all();

        if(!empty($input['Change'])){
            $this->validate($request, [
                'Password' => 'required|string|min:5',
            ]);
            $id = $input['AdminID'];
            $pass = bcrypt($input['Password']);
            User::where('id', '=', "$id")->update(['password' => "$pass"]);
            return redirect('/admin');

        }
        if(!empty($input['Delete'])){
            $id = $input['AdminID'];
            User::where('id', '=', "$id")->delete();
            return redirect('/admin');
        }
    }

}