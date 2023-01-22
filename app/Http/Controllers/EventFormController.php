<?php

namespace App\Http\Controllers;

use App\Models\EventForm;
use App\Models\Profile;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
        return view('event.index', ['profile' => $profile, 'user' => $user, 'today' => $today]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /** @var Illuminate\Filesystem\FilesystemAdapter */

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $profile = Profile::where('user_id', $user_id)->first();
        $user = User::where('id', $user_id)->first();
        $eventForm = new EventForm();
        $today = Carbon::today()->format('Y-m-d');
        $now = Carbon::now()->format('H:i');

        $eventForm->profile_id = $profile->id;

        $eventForm->name_activity = $request->name_activity;
        $eventForm->desc_activity = $request->desc_activity;
        $eventForm->date_activity = $request->date_activity;

        if(strtotime($request->time_end_activity) < strtotime($request->time_start_activity)){
            return response()->json([
                'error' =>  true,
                'message' => 'Mohon isi waktu mulai dan waktu selesai dengan benar.'
            ]);
        }
        $eventForm->time_start_activity = $request->time_start_activity;
        $eventForm->time_end_activity = $request->time_end_activity;

        $eventForm->place_activity = $request->place_activity;

        if ($request->date_activity == $today && strtotime($request->time_start_activity) >= time()) {
            $eventForm->status_activity = 'berlangsung';
        } else {
            $eventForm->status_activity = 'akan datang';
        }

        if($request->hasFile('img_activity')) {
            $file = $request->file('img_activity');
            $path = 'assets/img/poster/' . $user->name;
            $file->move(public_path($path), $request->file_name);
        }
        
        $eventForm->img_activity = $request->file_name;

        $eventForm->type_activity = $request->type_activity;
        if ($request->type_activity == 'lainnya') {
            $eventForm->other_type = $request->other_type;
        }

        $eventForm->ticket = $request->ticket;
        if ($request->ticket == 'yes') {
            $eventForm->price_ticket = $request->price_ticket;
        }
        $eventForm->name_pic = $request->name_pic;
        $eventForm->contact_pic = $request->contact_pic;
        $eventForm->save();
    }

    public function uploadPoster(Request $request)
    {
        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->first();
        $profile = Profile::where('user_id', $user_id)->first();
        $eventForm = EventForm::where('profile_id', $profile->id)->first();

        $path = 'assets/img/poster/' . $user->name;
        $file = $request->file('img_activity');
        $new_image_name = 'Poster Acar' . $request->name_activity . '.jpg';
        $upload = $file->move(public_path($path), $new_image_name);
        $eventForm->img_activity = $new_image_name;
        $eventForm->save();
        if ($upload) {
            return response()->json([
                'status' => 1, 'msg' => 'Image has been cropped successfully.',
                'name' => $new_image_name
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'msg' => 'Something went wrong, try again later'
            ]);
        }
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
        $changeStatus = EventForm::where('status_activity', 'akan datang')->where('date_activity', $today)->get();
        return view('event.data-kegiatan.index', [
            'dataEvent' => $dataEvent,
            'profile' => $profile,
            'user' => $user,
            'today' => $today,
            'time' => $time,
            'todayEvent' => $todayEvent,
            'eventForm' => $eventForm,
            'changeStatus' => $changeStatus
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

    public function updateBerlangsung(Request $request)
    {
        $status = EventForm::where('id', $request->id)->first();
        $status->status_activity = 'berlangsung';
        $status->save();
        return redirect()->back();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EventForm  $eventForm
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $user_id = Auth::user()->id;
        $profile = Profile::where('user_id', $user_id)->first();
        $dataEvent = EventForm::where('id', $request->idEventEdit)->first();
        $today = Carbon::today()->format('Y-m-d');

        $dataEvent->profile_id = $profile->id;
        $dataEvent->name_activity = $request->name_activity;
        $dataEvent->desc_activity = $request->desc_activity;
        $dataEvent->date_activity = $request->date_activity;
        $dataEvent->time_start_activity = $request->time_start_activity;
        $dataEvent->time_end_activity = $request->time_end_activity;
        $dataEvent->place_activity = $request->place_activity;

        if ($request->date_activity == $today) {
            $dataEvent->status_activity = 'berlangsung';
        } else {
            $dataEvent->status_activity = 'akan datang';
        }

        $dataEvent->img_activity = $request->img_activity;

        $dataEvent->type_activity = $request->type_activity;
        if ($request->type_activity == 'lainnya') {
            $dataEvent->other_type = $request->other_type;
        }

        $dataEvent->ticket = $request->ticket;
        if ($request->ticket == 'yes') {
            $dataEvent->price_ticket = $request->price_ticket;
        }
        $dataEvent->name_pic = $request->name_pic;
        $dataEvent->contact_pic = $request->contact_pic;
        $dataEvent->save();
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
    public function destroy(EventForm $eventForm, Request $request)
    {
        $eventDelete = $eventForm->where('id', $request->id);
        $eventDelete->delete();
    }
}
