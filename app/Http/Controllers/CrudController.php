<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function Store(Request $request){
        return view('crud.store');
    }
}
