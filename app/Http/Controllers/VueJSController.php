<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Tag;
use App\Search;


class VueJSController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function autocomplete()
    {
        return view('vuejsAutocomplete');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function autocompleteSearch(Request $request)
    {
        $searchquery = $request->searchquery;
        $data = Search::where('label','like','%'.$searchquery.'%')->get();
        return response()->json($data);
    }
}
