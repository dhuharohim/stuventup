<?php

namespace App\Http\Controllers;

use App\Models\EventForm;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MagazineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        
        $date = Carbon::now()->setTimezone('Asia/Jakarta')->translatedFormat('l, d F Y');
        $eventData = EventForm::with('profile')->get();
        $eventPop = EventForm::orderBy('view_count', 'desc')->take(6)->get();
        $eventNew = EventForm::orderBy('created_at', 'desc')->take(4)->get();
        // dd($eventData);


        return view('main-home.home', [
            'date'=> $date,
            'user' => $user,
            'eventData' => $eventData,
            'eventNew' => $eventNew,
            'eventPop' => $eventPop,
        ]);

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
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($name_activity)
    {
        $eventDetail = EventForm::where('name_activity', $name_activity)->first();
        // panggil data berdasarkan id

        $eventDetail->view_count =  (int) ++$eventDetail->view_count;
        $eventDetail->save();
        return view('main-home.detail', ['eventDetail'=>$eventDetail]);

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
