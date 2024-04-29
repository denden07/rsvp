<?php

namespace App\Http\Controllers;
use App\Models\RsvpResponse;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $rsvp_list = RsvpResponse::all();

        return view('home',['rsvp' => $rsvp_list]);
    }
}
