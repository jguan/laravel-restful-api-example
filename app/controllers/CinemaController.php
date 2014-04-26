<?php

class CinemaController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        // Pagination support on cinema listings
        if (Input::has('page')) {
            $page = (int)Input::get('page');
            $page = $page > 0 ? $page-1 : 0;
            $page_size = Config::get('app.page_size', 10);
            return Response::json(Cinema::skip($page*$page_size)->take($page_size)->get()->toArray());
        }

        return Response::json(Cinema::all()->toArray());
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  string  $name
	 * @return Response
	 */
	public function show($name)
	{
        return Response::json(Cinema::where('name', '=', $name)->firstOrFail()->toArray());
	}

    /**
     * Retrieve the movies at the specified cinema on the specified date.
     *
     * @param  string  $name
     * @param  string  $date
     * @return Response
     */
    public function showMovies($name, $date)
    {
        $dt = new Carbon($date);
        $from = $dt->startOfDay()->toDateTimeString();
        $to = $dt->endOfDay()->toDateTimeString();

        $cinema = Cinema::with(array('movies' => function($query) use ($from, $to) {
            $query->where('play_at', '>=', $from)->where('play_at', '<=', $to)->orderBy('title')->orderBy('play_at');
        }))->where('name', '=', $name)->firstOrFail();

        $result = $cinema->toArray();
        $result['movies'] = [];

        $movieInfo = [];
        foreach($cinema->movies as $movie) {
            if (!empty($movieInfo) && $movieInfo['id'] == $movie->pivot->movie_id) {
                $movieInfo['session_times'][] = $movie->pivot->play_at;
            } else {
                if (!empty($movieInfo)) {
                    $result['movies'][] = (object)$movieInfo;
                }
                $movieInfo = [];
                $movieInfo['id'] = $movie->id;
                $movieInfo['title'] = $movie->title;
                $movieInfo['session_times'][] = $movie->pivot->play_at;
            }
        }
        $result['movies'][] = (object)$movieInfo;

        return Response::json($result);
    }


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
