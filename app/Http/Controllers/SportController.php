<?php

namespace App\Http\Controllers;

use App\Models\Sport;

class SportController extends Controller
{
    public function index(){
        $sports = Sport::with(['categories', 'prices'])->paginate(5);
        return view('list-sport', compact('sports'));
    }
}
