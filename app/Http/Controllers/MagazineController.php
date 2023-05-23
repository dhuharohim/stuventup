<?php

namespace App\Http\Controllers;

use App\Models\EventForm;
use App\Models\ProfileMahasiswa;
use App\Models\ProfileUmum;
use App\Models\RegistrationEvent;
use App\Models\Social;
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
        $now = Carbon::now()->translatedFormat('Y-m-d');
        $date = Carbon::now()->setTimezone('Asia/Jakarta')->translatedFormat('l, d F Y');
        $mostPopularEvent = EventForm::orderBy('view_count', 'desc')->where('status_activity', 'akan datang')->with('profile')->first();
        $comingDate = Carbon::create($mostPopularEvent->date_activity)->setTimezone('Asia/Jakarta')->translatedFormat('l, d F Y');

        $eventPop = EventForm::orderBy('view_count', 'desc')->where('status_activity', 'akan datang')->take(4)->get();
        $eventNew = EventForm::orderBy('created_at', 'desc')->where('status_activity', 'akan datang')->take(4)->get();
        $eventPopLarge = EventForm::orderBy('view_count', 'desc')->where('status_activity', 'akan datang')->with('profile')->take(2)->get();
        $eventPopSmall = EventForm::orderBy('view_count', 'asc')->where('status_activity', 'akan datang')->take(2)->get();

        $typeActivity = ['nasional', 'pameran', 'olahraga', 'pelatihan', 'seminar', 'lainnya'];
        $eventCategoryies = EventForm::whereIn('type_activity', $typeActivity)->where('status_activity', 'akan datang')->orderBy('view_count', 'desc')->take(6)->get();
        $uniqueEventCategories = $eventCategoryies->unique('type_activity');

        $eventSeminar = EventForm::where('type_activity', 'seminar')->where('status_activity', 'akan datang')->get();
        $eventNasional = EventForm::where('type_activity', 'nasional')->where('status_activity', 'akan datang')->get();
        $eventPameran = EventForm::where('type_activity', 'pameran')->where('status_activity', 'akan datang')->get();
        $eventOlahraga = EventForm::where('type_activity', 'olahraga')->where('status_activity', 'akan datang')->get();
        $eventPelatihan = EventForm::where('type_activity', 'pelatihan')->where('status_activity', 'akan datang')->get();
        $eventLainnya = EventForm::where('type_activity', 'lainnya')->where('status_activity', 'akan datang')->get();

        $eventComingNext = EventForm::where('status_activity', 'akan datang')->orderBy('date_activity', 'desc')->take(3)->get();

        $latestEvent = EventForm::where('status_activity', 'akan datang')->orderBy('created_at', 'desc')->take(4)->get();

        // dd($eventPopLarge);
        return view('main-home.home', [
            'date'=> $date,
            'user' => $user,
            'mostPopularEvent' => $mostPopularEvent,
            'comingDate'=> $comingDate,
            'eventNew' => $eventNew,
            'eventPop' => $eventPop,
            'eventPopLarge' => $eventPopLarge,
            'eventPopSmall' => $eventPopSmall,
            'uniqueEventCategories' => $uniqueEventCategories,
            'eventSeminar' => $eventSeminar,
            'eventPameran' => $eventPameran,
            'eventLainnya' => $eventLainnya,
            'eventOlahraga' => $eventOlahraga,
            'eventPelatihan' => $eventPelatihan,
            'eventNasional' => $eventNasional,
            'eventComingNext' => $eventComingNext,
            'latestEvent' => $latestEvent
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
        $eventDetail = EventForm::where('name_activity', $name_activity)->with('profile')->first();
        $eventDetail->view_count =  (int) ++$eventDetail->view_count;
        $createdAt = Carbon::create($eventDetail->created_at)->setTimezone('Asia/Jakarta')->translatedFormat('l, d F Y');
        $dateAct = Carbon::create($eventDetail->date_activity)->setTimezone('Asia/Jakarta')->translatedFormat('l, d F Y');
        $today = Carbon::today()->format('Y-m-d');
        $eventDetail->save();

        $mostPopularEvent = EventForm::orderBy('view_count', 'desc')->where('status_activity', 'akan datang')->with('profile')->take(3)->get();
        $eventComingNext = EventForm::where('status_activity', 'akan datang')->orderBy('date_activity', 'desc')->take(3)->get();
        $socialMedia = Social::where('profile_id', $eventDetail->profile->id)->get();

        $eventSeminar = EventForm::where('type_activity', 'seminar')->where('status_activity', 'akan datang')->get();
        $eventNasional = EventForm::where('type_activity', 'nasional')->where('status_activity', 'akan datang')->get();
        $eventPameran = EventForm::where('type_activity', 'pameran')->where('status_activity', 'akan datang')->get();
        $eventOlahraga = EventForm::where('type_activity', 'olahraga')->where('status_activity', 'akan datang')->get();
        $eventPelatihan = EventForm::where('type_activity', 'pelatihan')->where('status_activity', 'akan datang')->get();
        $eventLainnya = EventForm::where('type_activity', 'lainnya')->where('status_activity', 'akan datang')->get();

        // user not logged in
        if(empty(auth()->user()->role)){
            return view('main-home.detail', [
            'eventDetail'=>$eventDetail, 
            'createdAt'=>$createdAt, 
            'dateAct'=> $dateAct, 
            'today'=>$today,
            'mostPopularEvent'=>$mostPopularEvent,
            'eventComingNext'=>$eventComingNext,
            'socialMedia' =>$socialMedia,
            'eventSeminar'=>$eventSeminar,
            'eventNasional' =>$eventNasional,
            'eventPameran' =>$eventPameran,
            'eventOlahraga' => $eventOlahraga,
            'eventPelatihan' => $eventPelatihan,
            'eventLainnya' => $eventLainnya
            
        ]);
        }
        $userRole = Auth::user()->role;
        $user = Auth::user();
        $dataRegist = RegistrationEvent::where('user_id', $user->id)->where('event_id', $eventDetail->id)->with('profileMahasiswa','profileGeneral')->first();
        // dd($dataRegist);

        return view('main-home.detail', [
            'eventDetail'=>$eventDetail, 
            'createdAt'=>$createdAt, 
            'dateAct'=> $dateAct, 
            'today'=>$today, 
            'dataRegist'=>$dataRegist, 
            'userRole'=>$userRole,
            'mostPopularEvent'=>$mostPopularEvent,
            'eventComingNext'=>$eventComingNext,
            'socialMedia' =>$socialMedia,
        ]);

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

    public function email(){
        return view('mail.payment-ticket');
    }
}
