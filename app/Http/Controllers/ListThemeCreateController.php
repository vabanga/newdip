<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;

class ListThemeCreateController extends Controller
{
    public function create(Request $request)
    {
        $input = $request->all();
        $arr = [
            'name' => $input['name']
        ];
        Theme::create($arr);
        return redirect('/admin/listTheme');

    }
}
