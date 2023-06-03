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

    public function indexCategory($name_category , Request $request) {
        $eventCategory = new EventForm();
        $eventSeminars = EventForm::where('type_activity', 'seminar')->where('status_activity', 'akan datang')->get();
        $eventNasionals = EventForm::where('type_activity', 'nasional')->where('status_activity', 'akan datang')->get();
        $eventPamerans = EventForm::where('type_activity', 'pameran')->where('status_activity', 'akan datang')->get();
        $eventPelatihans = EventForm::where('type_activity', 'pelatihan')->where('status_activity', 'akan datang')->get();
        $eventLainnyas = EventForm::where('type_activity', 'lainnya')->where('status_activity', 'akan datang')->get();
        $eventOlahragas = EventForm::where('type_activity', 'lainnya')->where('status_activity', 'akan datang')->get();

        if($name_category == 'olahraga') {
            if(!empty($request->q)) {
                $eventOlahraga = $eventCategory->where('name_activity', 'LIKE' , '%'. $request->q. '%')->paginate(6);
            } else {
                $eventOlahraga = $eventCategory->where('type_activity', 'olahraga')->orderBy('created_at', 'desc')->with('profile')->paginate(6);
            }
            $eventOlahragaPopuler = $eventCategory->where('type_activity','olahraga')->orderBy('view_count', 'desc')->take(3)->get();
            $eventOlahragaComing = $eventCategory->where('type_activity','olahraga')->orderBy('date_activity', 'desc')->take(3)->get();
            return view('main-home.category.olahraga', [
                'category' => $name_category,
                'eventOlahraga' => $eventOlahraga,
                'eventOlahragaPopuler' => $eventOlahragaPopuler,
                'eventSeminar' => $eventSeminars,
                'eventPameran' => $eventPamerans,
                'eventNasional' => $eventNasionals,
                'eventPelatihan' => $eventPelatihans,
                'eventLainnya' => $eventLainnyas,
                'eventOlahragaComing' => $eventOlahragaComing
            ]);
        } else if ($name_category == 'seminar') {
            if(!empty($request->q)) {
                $eventSeminar = $eventCategory->where('type_activity', 'seminar')->where('name_activity', 'LIKE' , '%'. $request->q. '%')->paginate(6);
            } else {
                $eventSeminar = $eventCategory->where('type_activity', 'seminar')->orderBy('created_at', 'desc')->with('profile')->paginate(6);
            }
            $eventSeminarPopuler = $eventCategory->where('type_activity','seminar')->orderBy('view_count', 'desc')->take(3)->get();
            $eventSeminarComing = $eventCategory->where('type_activity','seminar')->orderBy('date_activity', 'desc')->take(3)->get();
            return view('main-home.category.seminar', [
                'category' => $name_category,
                'eventSeminar' => $eventSeminar,
                'eventSeminarPopuler' => $eventSeminarPopuler,
                'eventPameran' => $eventPamerans,
                'eventNasional' => $eventNasionals,
                'eventPelatihan' => $eventPelatihans,
                'eventLainnya' => $eventLainnyas,
                'eventOlahraga' => $eventOlahragas,
                'eventSeminarComing' => $eventSeminarComing
            ]);
        } else if ($name_category == 'pameran') {
            if(!empty($request->q)) {
                $eventPameran = $eventCategory->where('name_activity', 'LIKE' , '%'. $request->q. '%')->paginate(6);
            } else {
                $eventPameran = $eventCategory->where('type_activity', 'pameran')->orderBy('created_at', 'desc')->with('profile')->paginate(6);
            }
            $eventPameranPopuler = $eventCategory->where('type_activity','pameran')->orderBy('view_count', 'desc')->take(3)->get();
            $eventPameranComing = $eventCategory->where('type_activity','pameran')->orderBy('date_activity', 'desc')->take(3)->get();
            return view('main-home.category.pameran', [
                'category' => $name_category,
                'eventPameran' => $eventPameran,
                'eventPameranPopuler' => $eventPameranPopuler,
                'eventOlahraga' => $eventOlahragas,
                'eventNasional' => $eventNasionals,
                'eventPelatihan' => $eventPelatihans,
                'eventLainnya' => $eventLainnyas,
                'eventSeminar' => $eventSeminars,
                'eventPameranComing' => $eventPameranComing
            ]);
        } else if ($name_category == 'pelatihan') {
            if(!empty($request->q)) {
                $eventPelatihan = $eventCategory->where('name_activity', 'LIKE' , '%'. $request->q. '%')->paginate(6);
            } else {
                $eventPelatihan = $eventCategory->where('type_activity', 'pelatihan')->orderBy('created_at', 'desc')->with('profile')->paginate(6);
            }
            $eventPelatihanPopuler = $eventCategory->where('type_activity','pelatihan')->orderBy('view_count', 'desc')->take(3)->get();
            $eventPelatihanComing = $eventCategory->where('type_activity','pelatihan')->orderBy('date_activity', 'desc')->take(3)->get();
            return view('main-home.category.pelatihan', [
                'category' => $name_category,
                'eventPelatihan' => $eventPelatihan,
                'eventPelatihanPopuler' => $eventPelatihanPopuler,
                'eventOlahraga' => $eventOlahragas,
                'eventNasional' => $eventNasionals,
                'eventLainnya' => $eventLainnyas,
                'eventSeminar' => $eventSeminars,
                'eventPelatihanComing' => $eventPelatihanComing
            ]);
        }  else if ($name_category == 'nasional') {
            if(!empty($request->q)) {
                $eventNasional = $eventCategory->where('name_activity', 'LIKE' , '%'. $request->q. '%')->paginate(6);
            } else {
                $eventNasional = $eventCategory->where('type_activity', 'nasional')->orderBy('created_at', 'desc')->with('profile')->paginate(6);
            }
            $eventNasionalPopuler = $eventCategory->where('type_activity','nasional')->orderBy('view_count', 'desc')->take(3)->get();
            $eventNasionalComing = $eventCategory->where('type_activity','nasional')->orderBy('date_activity', 'desc')->take(3)->get();
            return view('main-home.category.hari-nasional', [
                'category' => $name_category,
                'eventNasional' => $eventNasional,
                'eventNasionalPopuler' => $eventNasionalPopuler,
                'eventOlahraga' => $eventOlahragas,
                'eventPameran' => $eventPamerans,
                'eventPelatihan' => $eventPelatihans,
                'eventSeminar' => $eventSeminars,
                'eventLainnya' => $eventLainnyas,
                'eventNasionalComing' => $eventNasionalComing
            ]);
        } else if ($name_category == 'lainnya') {
            if(!empty($request->q)) {
                $eventLainnya = $eventCategory->where('name_activity', 'LIKE' , '%'. $request->q. '%')->paginate(6);
            } else {
                $eventLainnya = $eventCategory->where('type_activity', 'lainnya')->orderBy('created_at', 'desc')->with('profile')->paginate(6);
            }
            $eventLainnyaPopuler = $eventCategory->where('type_activity','lainnya')->orderBy('view_count', 'desc')->take(3)->get();
            $eventLainnyaComing = $eventCategory->where('type_activity','lainnya')->orderBy('date_activity', 'desc')->take(3)->get();
            return view('main-home.category.lainnya', [
                'category' => $name_category,
                'eventLainnya' => $eventLainnya,
                'eventLainnyaPopuler' => $eventLainnyaPopuler,
                'eventOlahraga' => $eventOlahragas,
                'eventPameran' => $eventPamerans,
                'eventPelatihan' => $eventPelatihans,
                'eventNasional' => $eventNasionals,
                'eventSeminar' => $eventSeminars,
                'eventLainnyaComing' => $eventLainnyaComing
            ]);
        } 
        
    }

    public function loadMoreNewestEvent(Request $request) 
    {
        $lastItemId = $request->input('lastItemId');
        $limit = 8; // Number of items to load
    
        $data = EventForm::where('status_activity', 'akan datang')->orderBy('created_at', 'desc')->where('id', '>', $lastItemId)
                        ->limit($limit)
                        ->get();
    
        return response()->json($data);
    }
}
