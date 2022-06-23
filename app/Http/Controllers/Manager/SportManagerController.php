<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\SportRequests;
use App\Http\Requests\UpdateSportRequests;
use App\Models\Category;
use App\Models\Image;
use App\Models\Price;
use App\Models\Sport;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SportManagerController extends Controller
{
    public function index(Request $request)
    {
        $sports = Sport::with(['categories', 'prices', 'users'])->where(['user_id' => Auth::user()->id]);
        if ($request->input('search')) {
            $search = $request->input('search');
            $sports =  $sports->where('name', 'like', "%{$search}%")
                ->orWhere('updated_at', 'LIKE', "%{$search}%")
                ->orWhereHas('categories', function (Builder $query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%");
                });
        }
        $sports = $sports->sortable()->paginate(5);
        return view('manager/list-sport', compact('sports'));
    }

    public function store()
    {
        $prices = Price::all();
        $categories = Category::all();
        return view('manager/add-sport')->with(compact('prices', 'categories'));
    }

    public function create(SportRequests $request)
    {
        if ($request->hasFile("image_path")) {
            $image = $request->file('image_path');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);

            $sport = new Sport();
            $sport->fill([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'category_id' => $request->category_id,
                'image_path' => $imageName,
                'price_id' => $request->price_id,
                'describe' => $request->describe,
                'uuid' => $this->generateUUID()
            ]);
            $sport->save();
        }

        if ($request->hasFile("images")) {
            $files = $request->file("images");
            foreach ($files as $file) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $image = new Image();
                $image->fill([
                    'sport_id' => $sport->id,
                    'image_path' => $imageName,
                    'title' => "abc",
                ]);
                $file->move(public_path("images"), $imageName);
                $image->save();
            }
        }
        return redirect()->route('manager.sports.index')->with('status', "Insert successfully");
    }

    function generateUUID()
    {
        // $uuid = Str::uuid()->toString();
        $uuid =  mt_rand(1, 10);
        return $uuid;
    }

    public function edit($id)
    {
        $sport = Sport::find($id);
        $prices = Price::all();
        $categories = Category::all();
        $images = Image::where('sport_id', '=', $id)->get();
        return view('manager/edit-sport')->with(compact('prices', 'categories', 'sport', 'images'));
    }

    public function update(UpdateSportRequests $request, $id)
    {
        $sports = Sport::find($id);
        $sports->fill([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price_id' => $request->price_id,
            'describe' => $request->describe,
        ]);

        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $sports['image_path'] = $imageName;
        }

        $sports->save();
        $this->updateImageItem($request, $id);
        return redirect()->route('manager.sports.index')->with('status', "Update successfully");
    }

    public function updateImageItem(UpdateSportRequests $request, $id)
    {
        $sports = Sport::find($id);
        if ($request->hasFile("images")) {
            $files = $request->file("images");
            foreach ($files as $file) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $image = new Image();
                $image->fill([
                    'sport_id' => $sports->id,
                    'image_path' => $imageName,
                    'title' => "abc",
                ]);
                $file->move(public_path("images"), $imageName);
                $image->save();
            }
        }
    }

    public function destroy($id)
    {
        $sport = Sport::findOrFail($id);
        $sport->delete();
        return redirect()->back()->with('success', 'Sport removed successfully!');
    }

    public function deleteImage($id)
    {
        $images = Image::findOrFail($id);
        if (File::exists("images/" . $images->image_path)) {
            File::delete("images/" . $images->image_path);
        }
        Image::find($id)->delete();
        return back();
    }
}
