<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ProfileMahasiswa;
use App\Models\ProfileUmum;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'max:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
        ]);
        ProfileMahasiswa::create([
            'user_id' => $user->id
        ]);
        return view('/home');
    }

    public function register(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->role = 'user';
        $user->save();

        $profileMhs = new ProfileMahasiswa();
        $profileMhs->user_id = $user->id;
        $profileMhs->save();

        Auth::login($user);
        return view('dashboard.index');
    }

    public function registIndex(Request $request)
    {
        if($request->page == 'mhs'){
            return view('auth.mhs');
        } else {
            return view('auth.umum');
        };
    }
    public function registUmum()
    {
    }

    public function registStore(Request $request)
    {
        // dd($request->hasFile('mhs_upload'));
        $user = new User();
        $user->name = $request->firstname . ' ' . $request->lastname;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        if($request->type_reg == 'mhs'){
            $user->role = 'user';
            $user->save();
            $profileMhs = new ProfileMahasiswa();
            $profileMhs->user_id = $user->id;
            $profileMhs->first_name = $request->firstname;
            $profileMhs->last_name = $request->lastname;
            $profileMhs->email = $request->email;
            $profileMhs->handphone = $request->handphone;
            $profileMhs->study_program = $request->study_program;
            if ($request->hasFile('mhs_upload')) {
                $path = 'assets/img/user/mahasiswa/' . $request->study_program;
                $file = $request->file('mhs_upload');
                $new_image_name =  $user->name . '.jpg';
                $file->move(public_path($path), $new_image_name);
                $profileMhs->photo = $new_image_name;
            }
            $profileMhs->save();
        } else {
            $user->role = 'umum';
            $user->save();
            $profileUmum = new ProfileUmum();
            $profileUmum->user_id = $user->id;
            $profileUmum->first_name = $request->firstname;
            $profileUmum->last_name = $request->lastname;
            $profileUmum->email = $request->email;
            $profileUmum->handphone = $request->handphone;
            if ($request->hasFile('umum_upload')) {
                $path = 'assets/img/user/umum/';
                $file = $request->file('umum_upload');
                $new_image_name =  $user->name . '.jpg';
                $file->move(public_path($path), $new_image_name);
                $profileUmum->photo = $new_image_name;
            }
            $profileUmum->save();
        };
        
        Auth::login($user);
        return redirect()->route('landing');
    }
}
