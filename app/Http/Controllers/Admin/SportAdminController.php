<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sport;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;


class SportAdminController extends Controller
{
    public function index(Request $request)
    {
        $sports = Sport::with(['categories', 'prices', 'users']);
        if ($request->input('search')) {
            $search = $request->input('search');
            $sports =  $sports->where('name', 'like', "%{$search}%")
                ->orWhere('updated_at', 'LIKE', "%{$search}%")
                ->orWhereHas('categories', function (Builder $query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%");
                });
        }
        $sports = $sports->sortable()->paginate(5);
        return view('admin/sport', compact('sports'));
    }
}
