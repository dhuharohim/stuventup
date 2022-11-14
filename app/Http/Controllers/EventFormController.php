<?php

namespace App\Http\Controllers;

use App\Models\EventForm;
use App\Models\Profile;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

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
        $today = Carbon::today()->format('Y-m-d');
        $profile = Profile::where('user_id', $user_id)->first();
        return view('event.index', ['profile'=>$profile, 'user'=>$user, 'today'=>$today]);
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
        $user_id = Auth::user()->id;
        $profile = Profile::where('user_id', $user_id)->first();
        $eventForm = new EventForm();
        $today = Carbon::today()->format('Y-m-d');

        $eventForm->profile_id = $profile->id;

        $eventForm->name_activity = $request->name_activity;
        $eventForm->desc_activity = $request->desc_activity;
        $eventForm->date_activity = $request->date_activity;

        
        $eventForm->time_start_activity = $request->time_start_activity;
        $eventForm->time_end_activity = $request->time_end_activity;

        $eventForm->place_activity = $request->place_activity;

        if($request->date_activity == $today){
            $eventForm->status_activity = 'berlangsung';
        } else {
            $eventForm->status_activity = 'akan datang';
        }
        
        $eventForm->img_activity = $request->img_activity;

        $eventForm->type_activity = $request->type_activity;
        if($request->type_activity == 'lainnya'){
            $eventForm->other_type = $request->other_type;
        }

        $eventForm->ticket = $request->ticket;
        if($request->ticket == 'yes'){
            $eventForm->price_ticket = $request->price_ticket;
        }
        $eventForm->name_pic = $request->name_pic;
        $eventForm->contact_pic = $request->contact_pic;
        $eventForm->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EventForm  $eventForm
     * @return \Illuminate\Http\Response
     */
    public function show(EventForm $eventForm)
    {
        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->first();
        $profile = Profile::where('user_id', $user_id)->first();
        $dataEvent = EventForm::where('profile_id', $profile->id)->paginate(5);
        $today = Carbon::today()->format('Y-m-d');
        $time = Carbon::now()->format('H:i:s');
        $todayEvent = EventForm::where('date_activity', $today)->get();
        return view('event.data-kegiatan.index', [
            'dataEvent' => $dataEvent,
            'profile'=>$profile,
            'user'=>$user,
            'today'=>$today,
            'time' =>$time,
            'todayEvent' => $todayEvent,
            'eventForm' =>$eventForm
        ]);

    }

    public function showEvent(Request $request)
    {
        $eventEdit = EventForm::where('id', $request->id)->first();

    }

    public function updateStatus(Request $request)
    {

        $status = EventForm::where('id', $request->id)->first();
        $status->status_activity = 'selesai';
        $status->save();
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EventForm  $eventForm
     * @return \Illuminate\Http\Response
     */
    public function edit(EventForm $eventForm)
    {
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
