<?php

namespace App\Http\Controllers;

use App\Models\EventForm;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->first();
        $profile = Profile::where('user_id', $user_id)->first();
        return view('event.index', ['profile'=>$profile, 'user'=>$user] );
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
     * @param  \App\Models\EventForm  $eventForm
     * @return \Illuminate\Http\Response
     */
    public function show(EventForm $eventForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EventForm  $eventForm
     * @return \Illuminate\Http\Response
     */
    public function edit(EventForm $eventForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EventForm  $eventForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventForm $eventForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EventForm  $eventForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventForm $eventForm)
    {
        //
    }
}
