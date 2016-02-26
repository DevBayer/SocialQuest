<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class StaticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('SocialQuest.home');
    }

    public function contact()
    {
        return view('SocialQuest.contact');
    }

    public function how_works()
    {
        return view('SocialQuest.how_works');
    }



}
