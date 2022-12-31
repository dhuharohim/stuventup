<?php

namespace App\Http\Controllers;

use App\Models\EventForm;
use App\Models\Profile;
use App\Models\ProfileMahasiswa;
use App\Models\ProfileUmum;
use App\Models\Registration;
use App\Models\RegistrationEvent;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataRegistController extends Controller
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
        return view('event.data-kegiatan.registrasi', ['profile'=>$profile, 'user'=>$user, 'today'=>$today]);
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
        $user = Auth::user();
        $event = EventForm::where('name_activity', $request->name_activity)->first();
        $profileMhs = ProfileMahasiswa::where('user_id', $user->id)->first();
        $profileUmum = ProfileUmum::where('user_id', $user->id)->first();
        if($user->role = 'user'){
            $dataMhs = new RegistrationEvent();
            $dataMhs->user_id = $user->id;
            $dataMhs->profile_mhs_id = $profileMhs->id;
            $dataMhs->event_id = $event->id;
            $dataMhs->status_regist = "telah daftar";
            $dataMhs->save();
        } else {
            $dataUmum = new RegistrationEvent();
            $dataUmum->user_id = $user->id;
            $dataUmum->profile_general_id = $profileUmum->id;
            $dataUmum->event_id = $event->id;
            $dataUmum->status_regist = "telah daftar";
            $dataUmum->save();
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
