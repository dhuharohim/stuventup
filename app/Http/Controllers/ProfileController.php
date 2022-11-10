<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
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
        $profile = Profile::where('user_id', $user_id)->first();
        return view('profile.index', ['user'=>$user, 'profile' =>$profile]);
    }

    public function setting()
    {
        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->first();
        $profile = Profile::where('user_id', $user_id)->first();
        return view('profile.setting', ['user'=>$user, 'profile'=>$profile]);
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
        $this->validate($request,[
            'email' => 'required',
            'handphone' => 'required'
        ]);
        $user_id = Auth::user()->id;

        $profile = Profile::where('user_id', $user_id )->first();
        $profile->email = $request->email;
        $profile->handphone = $request->handphone;
        $profile->save();

        return redirect()->back();
    }

    public function updateuser(Request $request, $id)
    {
        $this->validate($request,[
            'username' => 'required',
            'password' => 'required'
        ]);
        $user_id = Auth::user()->id;

        User::where('id', $user_id)->update([
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->back();
    }

    function crop(Request $request)
    {
        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->first();
        $profile = Profile::where('user_id', $user_id )->first();
        $path = 'assets/img/profile/';
        $file = $request->file('profile_img');
        $new_image_name = 'Logo ' . $user->name . '.jpg';
        $upload = $file->move(public_path($path), $new_image_name);
        $profile->photo = $new_image_name;
        $profile->save();
        if($upload){
            return response()->json([
                'status'=>1, 'msg'=>'Image has been cropped successfully.', 
                'name'=>$new_image_name
            ]);
        }else{
            return response()->json([
                'status'=>0, 
                'msg'=>'Something went wrong, try again later'
            ]);
        }
    }

    public function resetPhoto(Request $request){
        $user_id = Auth::user()->id;
        $profile = Profile::where('user_id', $user_id )->first();
        if(empty($profile->photo)){
            return response()->json([
                'error' => true,
                'message' => 'Kamu belum memasukan foto profil'
            ]);
        }
        
            $profile->photo = $request->photo_reset;
            $profile->save();
            return redirect()->back();
        
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
