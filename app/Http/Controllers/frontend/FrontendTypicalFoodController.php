<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Typical_food;
use Illuminate\Http\Request;

class FrontendTypicalFoodController extends Controller
{
    function index()
    {
        return 'comidas tipicas - listagem';
    }

    function show(Typical_food $typical_food)
    {
        dd($typical_food);
    }
}
