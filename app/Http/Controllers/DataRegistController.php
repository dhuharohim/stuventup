<?php

namespace App\Http\Controllers;

use App\Mail\StuventEmail;
use App\Models\EventForm;
use App\Models\Profile;
use App\Models\ProfileMahasiswa;
use App\Models\ProfileUmum;
use App\Models\Registration;
use App\Models\RegistrationEvent;
use App\Models\User;
use Carbon\Carbon;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DataRegistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name_activity)
    {
        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->first();
        $today = Carbon::today()->format('Y-m-d');
        $profile = Profile::where('user_id', $user_id)->first();  
        $event = EventForm::where('name_activity', $name_activity)->first();
        $registMhs = RegistrationEvent::where('event_id', $event->id)->where('profile_general_id', null)->with('profileMahasiswa')->paginate(5);
        $registUmum = RegistrationEvent::where('event_id', $event->id)->where('profile_mhs_id', null)->with('profileGeneral')->paginate(5);

        $totalRegisMhs = RegistrationEvent::where('event_id', $event->id)->where('status_regist','terkonfirmasi')->where('profile_general_id', null)->get();
        $totalRegisUmum = RegistrationEvent::where('event_id', $event->id)->where('status_regist','terkonfirmasi')->where('profile_mhs_id', null)->get();


        return view('event.data-kegiatan.registrasi', ['event'=> $event ,'profile'=>$profile, 'user'=>$user, 'today'=>$today, 'registMhs'=> $registMhs, 'registUmum'=> $registUmum, 'totalRegisMhs'=>$totalRegisMhs,'totalRegisUmum'=>$totalRegisUmum]);
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
        if(empty($user)){
            
            return response()->json([
                'error' => true,
                'success' => false,
                'message' => 'Mohon login sebelum mendaftar'
            ]);
        }
        $event = EventForm::where('name_activity', $request->name_activity)->first();
        $profileMhs = ProfileMahasiswa::where('user_id', $user->id)->first();
        $profileUmum = ProfileUmum::where('user_id', $user->id)->first();
        if($user->role = 'user'){
            $dataMhs = new RegistrationEvent();
            $dataMhs->user_id = $user->id;
            $dataMhs->profile_mhs_id = $profileMhs->id;
            $dataMhs->event_id = $event->id;
            $dataMhs->status_regist = "terkonfirmasi";
            $dataMhs->save();
        } else {
            $dataUmum = new RegistrationEvent();
            $dataUmum->user_id = $user->id;
            $dataUmum->profile_general_id = $profileUmum->id;
            $dataUmum->event_id = $event->id;
            $dataUmum->status_regist = "terkonfirmasi";
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
    public function confirmPayment(Request $request)
    {
        if($request->type == 'paymentMhs'){
            $registMhs = RegistrationEvent::where('profile_mhs_id', $request->id)->first();
            $registMhs->status_regist = 'terkonfirmasi';
            $registMhs->save();

            if($registMhs->save()){
                Mail::to('dhuhacmd@gmail.com')->send(new StuventEmail('registMhs', $registMhs->id));
                try{
                } catch(Error $e){
                    return response()->json([
                        'error' => true,
                        'message' => 'Maaf email gagal untuk dikirim'
                    ]);
                }
            }
        } else{
            $registUmum = RegistrationEvent::where('profile_general_id', $request->id)->first();
            $registUmum->status_regist = 'terkonfirmasi';
            $registUmum->save();
            if($registUmum->save()){
                Mail::to('dhuhacmd@gmail.com')->send(new StuventEmail('registUmum', $registUmum->id));
                try{
                } catch(Error $e){
                    return response()->json([
                        'error' => true,
                        'message' => 'Maaf email gagal untuk dikirim'
                    ]);
                }
            }
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
