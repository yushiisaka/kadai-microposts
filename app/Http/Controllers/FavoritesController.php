<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoritesController extends Controller
{
     public function store(Request $request, $id)
    {
        \Auth::user()->addfav($id);
        return back();
    }

    public function destroy($id)
    {
        \Auth::user()->unfav($id);
        return back();
    }
}
