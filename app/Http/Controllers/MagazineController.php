<?php

namespace App\Http\Controllers;

use App\Models\EventForm;
use App\Models\ProfileMahasiswa;
use App\Models\ProfileUmum;
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
        $eventDetail = EventForm::where('name_activity', $name_activity)
        ->with('profile')->first();
        $eventDetail->view_count =  (int) ++$eventDetail->view_count;
        $createdAt = Carbon::create($eventDetail->created_at)->setTimezone('Asia/Jakarta')->translatedFormat('l, d F Y');
        $dateAct = Carbon::create($eventDetail->date_activity)->setTimezone('Asia/Jakarta')->translatedFormat('l, d F Y');
        $today = Carbon::today()->format('Y-m-d');
        $eventDetail->save();

        // user not logged in
        if(empty(auth()->user()->role)){
            return view('main-home.detail', ['eventDetail'=>$eventDetail, 'createdAt'=>$createdAt, 'dateAct'=> $dateAct, 'today'=>$today]);
        }
        $userRole = Auth::user()->role;
        $user = Auth::user();
        $dataRegist = RegistrationEvent::where('user_id', $user->id)->where('event_id', $eventDetail->id)->with('profileMahasiswa','profileGeneral')->first();
        // dd($dataRegist);

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
     *  Show invoice ticket information
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function invoiceTicket(Request $request)
    {
        $user = Auth::user();
        $userRole = Auth::user()->role;

        $eventDetail = EventForm::where('name_activity', $request->name_activity)
        ->with('profile')->first();
        if(empty($user)){
            return response()->json([
                'error' => true,
                'success' => false,
                'message' => 'Mohon login sebelum mendaftar'
            ]);
        }
        $profileMhs = ProfileMahasiswa::where('user_id', $user->id)->first();
        $profileUmum = ProfileUmum::where('user_id', $user->id)->first();
        if($userRole == 'user'){
            $dataMhs = new RegistrationEvent();
            $dataMhs->user_id = $user->id;
            $dataMhs->profile_mhs_id = $profileMhs->id;
            $dataMhs->event_id = $eventDetail->id;
            $dataMhs->status_regist = "telah daftar";
            $dataMhs->save();
        } else {
            $dataUmum = new RegistrationEvent();
            $dataUmum->user_id = $user->id;
            $dataUmum->profile_general_id = $profileUmum->id;
            $dataUmum->event_id = $eventDetail->id;
            $dataUmum->status_regist = "telah daftar";
            $dataUmum->save();
        }
    }
    
    public function indexInvoice($name_activity){
        $user = Auth::user();
        $eventDetail = EventForm::where('name_activity', $name_activity)
        ->with('profile')->first();
        if(empty($user)){
            return response()->json([
                'error' => true,
                'success' => false,
                'message' => 'Mohon login sebelum mendaftar'
            ]);
        }
        $profileMhs = ProfileMahasiswa::where('user_id', $user->id)->first();
        $profileUmum = ProfileUmum::where('user_id', $user->id)->first();
        $dataRegist = RegistrationEvent::where('user_id', $user->id)->where('event_id', $eventDetail->id)->with('profileMahasiswa','profileGeneral')->first();
        $dateAct = Carbon::create($dataRegist->created_at)->setTimezone('Asia/Jakarta')->translatedFormat('l, d F Y');
        return view('main-home.event-ticket.confirmation', ['user'=>$user, 'eventDetail'=> $eventDetail, 'profileMhs'=>$profileMhs, 'profileUmum'=>$profileUmum, 'dataRegist'=>$dataRegist,'date'=>$dateAct]);
    }
}
