<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section1_name;
use App\Models\Section2_name;

class HomeController extends Controller
{
    //view home page
    public function index() {
        $section_1_data = Section1_name::all();
        $section_2_data = Section2_name::all();

        return view('home')->with([
            'section_1_data' => $section_1_data,
            'section_2_data' => $section_2_data
        ]);
    }
}
