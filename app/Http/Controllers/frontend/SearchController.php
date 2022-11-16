<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Search;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    function index(string $search)
    {
        $results = (new Search($search))->getResults();
//        dd($results);
        return view('web.search', compact('results', 'search'));
    }}
