<?php

namespace App\Http\Controllers;

use App\Http\Requests\SportRequests;
use App\Models\Category;
use App\Models\Image;
use App\Models\Price;
use App\Models\Sport;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SportController extends Controller
{
    public function index(Request $request)
    {
        $sports = Sport::with(['categories', 'prices'])->paginate(5);

        if ($request->input('search')) {
            $search = $request->input('search');
            $sports =  Sport::where('name', 'like', "%{$search}%")
                ->orWhere('updated_at', 'LIKE', "%{$search}%")
                ->orWhereHas('categories', function (Builder $query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%");
                })->paginate(5);
            $sports->appends(['search' => $search]);
        }

        return view('list-sport', compact('sports'));
    }

    public function store()
    {
        $prices = Price::all();
        $categories = Category::all();
        return view('add-sport')->with(compact('prices', 'categories'));
    }

    public function create(SportRequests $request)
    {
        if ($request->hasFile("image_path")) {
            $image_path  = '';
            $image = $request->file('image_path');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('images'), $image_name);

            $sport = new Sport();
            $sport->name = $request->input('name');
            $sport->category_id = $request->input('category_id');
            $sport->image_path = $image_name;
            $sport->price_id = $request->input('price_id');
            $sport->describe = $request->input('describe');
            $uuid = $this->generateUUID();
            $sport->uuid = $uuid;
            $sport->save();
        }

        if ($request->hasFile("images")) {
            $files = $request->file("images");
            foreach ($files as $file) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $image = new Image();
                $image->sport_id = $sport->id;
                $image->image_path = $imageName;
                $image->title = "abc";
                $file->move(public_path("images"), $imageName);
                $image->save();
            }
        }
        return redirect()->route('sports.index')->with('status', "Insert successfully");
    }

    function generateUUID()
    {
        // $uuid = Str::uuid()->toString();
        $uuid =  mt_rand(1, 10);
        return $uuid;
    }

    public function edit($id)
    {
        $sport = Sport::findOrFail($id);
        $prices = Price::all();
        $categories = Category::all();
        return view('edit-sport')->with(compact('prices', 'categories', 'sport'));
    }

    public function update(Request $request, $id)
    {
        $sports = Sport::find($id);
        $sports->name = $request->name;
        $sports->category_id = $request->category_id;
        $sports->image_path = $request->image_path;
        $sports->price_id = $request->price_id;
        $sports->describe = $request->describe;
        if ($request->hasFile('image_path')) {
            $image_path  = 'public/image';
            $image = $request->file('image_path');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('image_path')->storeAs($image_path, $image_name);
            $sports['image_path'] = $image_name;
        }
        $sports->save();
        return redirect()->route('sports.index')->with('status', "Update successfully");
    }

    public function destroy($id)
    {
        $sport = Sport::findOrFail($id);
        $sport->delete();
        return redirect()->back()->with('success', 'Sport removed successfully!');
    }

    public function showDetail($id)
    {
        $sport = Sport::findOrFail($id);
        $images = Image::where('sport_id', '=', $id)->get();
        return view('detail-sport', compact('sport', 'images'));
    }
}
