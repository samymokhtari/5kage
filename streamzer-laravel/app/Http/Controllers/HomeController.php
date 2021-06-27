<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Serie;
use App\Services\MovieService;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $movies = (new MovieService())->retrieveAllFilms($request);
        $series = Serie::all();
        return view('pages/home', [
            'movies' => $movies,
            'series' => $series
        ]);
    }

    /**
     * Show the application about page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function about()
    {
        return view('pages/about');
    }
}
