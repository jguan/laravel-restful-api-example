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
        return Response::json(Cinema::where('name', '=', $name)->first()->toArray());
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
