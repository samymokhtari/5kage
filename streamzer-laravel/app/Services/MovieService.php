<?php

namespace App\Services;

use App\Movie;
use Illuminate\Http\Request;

class MovieService {

    public function retrieveAllFilms(Request $request) {
        return  Movie::all();
    }
}