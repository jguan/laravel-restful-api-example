<?php namespace Repositories;

use Repositories\MovieRepositoryInterface;
use Movie;

class EloquentMovieRepository implements MovieRepositoryInterface {

    public function all()
    {
        return Movie::all();
    }

    public function where($name)
    {
        return Movie::where('title', '=', $name);
    }

}