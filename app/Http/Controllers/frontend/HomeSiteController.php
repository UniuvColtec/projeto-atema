<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Event;
use App\Models\Tourist_spot;
use Illuminate\Http\Request;

class HomeSiteController extends Controller
{
    public function index()
    {
        $events = Event::where('status', 'Aprovado')->whereDate('final_date', '>=', date('Y-m-d'))->orderBy('start_date')->take(3)->with('city', 'firstImage')->get();
        $annualevents = Event::where('annual_calendar' , 1)->whereDate('start_date', '>=', date('Y-m-d'))->take('6')->orderBy('start_date')->with('city', 'firstImage')->get();
        $banner =  Banner::with('images')->get();
        return view('web.home', compact('events','annualevents','banner'));
    }
}

use Spatie\Searchable\Search;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class BlogPost extends Search implements Searchable
{
    public function getSearchResult(): SearchResult
    {
        $url = route('blogPost.show', $this->slug);

        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->title,
            $url

        );
    }
}
