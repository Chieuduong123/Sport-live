<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Sport;


class SportController extends Controller
{
    public function index()
    {
        $sports = Sport::with(['categories', 'prices', 'images']);
        $sports = $sports->paginate(4);
        return view('index', compact('sports'));
    }

    public function showDetail($id)
    {
        $sport = Sport::findOrFail($id);
        $images = Image::where('sport_id', '=', $id)->get();
        return view('detail-sport', compact('sport', 'images'));
    }
}
