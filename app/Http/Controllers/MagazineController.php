<?php

namespace App\Http\Controllers;

use App\Models\EventForm;
use App\Models\RegistrationEvent;
use App\Models\User;
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
        $eventComing = EventForm::orderBy('date_activity','desc')->take(4)->with('profile')->get();
        foreach($eventComing as $event){
            $comingDate = Carbon::create($event->date_activity)->setTimezone('Asia/Jakarta')->translatedFormat('l, d F Y');
        }

        $eventPop = EventForm::orderBy('view_count', 'desc')->take(4)->get();
        $eventNew = EventForm::orderBy('created_at', 'desc')->take(4)->get();
        // dd($eventComing);
        return view('main-home.home', [
            'date'=> $date,
            'user' => $user,
            'eventComing' => $eventComing,
            'comingDate'=> $comingDate,
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
        $user = Auth::user();
        $userRole = Auth::user()->role;
        $eventDetail = EventForm::where('name_activity', $name_activity)
        ->with('profile')->first();
        // dd($eventDetail);
        $dataRegist = RegistrationEvent::where('user_id', $user->id)->with('profile_mhs_id','profile_general_id')->first();
        // dd($dataRegist);
        $eventDetail->view_count =  (int) ++$eventDetail->view_count;
        $createdAt = Carbon::create($eventDetail->created_at)->setTimezone('Asia/Jakarta')->translatedFormat('l, d F Y');
        $dateAct = Carbon::create($eventDetail->date_activity)->setTimezone('Asia/Jakarta')->translatedFormat('l, d F Y');
        $today = Carbon::today()->format('Y-m-d');
        $eventDetail->save();
        // dd($descEvent);
        return view('main-home.detail', ['eventDetail'=>$eventDetail, 'createdAt'=>$createdAt, 'dateAct'=> $dateAct, 'today'=>$today, 'dataRegist'=>$dataRegist, 'userRole'=>$userRole]);

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
