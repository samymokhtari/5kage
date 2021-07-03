<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serie;
use App\Services\MovieService;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        try {
            $movies = (new MovieService())->getMovieList($request);
            $series = Serie::all();
        } catch(ModelNotFoundException $exception) {
            return view('pages/error');
        }
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
