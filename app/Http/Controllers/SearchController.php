<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
	$results = NULL;
	if($request->input('query')){
		$results = User::where('name', 'LIKE', '%'.$request->input('query').'%')->orWhere('surname1', 'LIKE', '%'.$request->input('query').'%')->orWhere('surname2', 'LIKE', '%'.$request->input('query').'%')->paginate(10);
	}
        return view('SocialQuest.search.home', compact('results'));
    }

	public function search(Request $request, $search){
		$results="";
		if($search){
			$results = User::where('name', 'LIKE', '%'.$search.'%')->orWhere('surname1', 'LIKE', '%'.$search.'%')->orWhere('surname2', 'LIKE', '%'.$search.'%')->paginate(10);
		}
		return view('SocialQuest.search.home', compact('results'));
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
