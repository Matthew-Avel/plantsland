<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GardenersController extends Controller
{
    public function index(){
        $gardeners = \App\Gardener::all();
        
        
        return view('gardenerList', compact('gardeners'));
    }
}
