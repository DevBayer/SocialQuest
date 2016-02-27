<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class QuestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $latitude = \Auth::user()->latitude;
        $longitude = \Auth::user()->longitude;
        $quests = \App\Quest::select(\DB::raw(
            '*,( 6371 * acos( cos( radians(' . $latitude . ') ) * cos( radians( latitude ) ) 
            * cos( radians( longitude ) - radians('.$longitude.') ) + sin( radians('.$latitude.') ) 
            * sin( radians( latitude ) ) ) ) AS distance'))
                ->having('distance', '<', '25')
                ->orderBy('distance')->get();
        return view('SocialQuest.quests.list', compact('quests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = \App\Category::all()->lists('name','id');
        return view('SocialQuest.quests.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'category_id' => 'required',
            'description' => 'required',
            'location' => 'required',
            'start_time' => 'required',
            'end_time' => 'required'
        );

        $validator = \Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return \Redirect::route('quests.create')->withErrors($validator);
        }else{
            $request['user_id'] = \Auth::user()->id;
            $request['latitude'] = explode(",",$request->latlng)[1];
            $request['longitude'] = explode(",",$request->latlng)[0];
            $element = \App\Quest::create($request->all());
            \Session::flash('message', 'Quest creada correctamente');
            return \Redirect::route('quests.list');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //TODO
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //TODO
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
        if($request->quest()){
            $quest = Quest::find($id)->first();
            $quest->fill($request->all());
            $quest->save();
            /** create setLocation and parse between http://maps.googleapis.com/maps/api/geocode/json?latlng=41.404045599999996,2.1786171999999997&sensor=true to get real data. **/
            return redirect()->route('quest.list');
        }
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
