<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RefFirstnameController extends Controller
{
    $searchquery = $request->searchquery;
    $data = Tag::where('name','like','%'.$searchquery.'%')->get();

    return response()->json($data);
}
