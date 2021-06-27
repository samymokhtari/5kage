<?php

namespace App\Services;

use App\Serie;
use Illuminate\Http\Request;

class MovieService {

    public function retrieveAllSeries(Request $request) {
        
        return  Serie::all();
    }
}