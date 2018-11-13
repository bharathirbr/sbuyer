<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class Header extends Controller
{public function category(Request $request)
    {
    $cat = Category::where('page_type','menu_page')->where('status','1')->get();
    return view('home')->with(compact('address'));
}
}
