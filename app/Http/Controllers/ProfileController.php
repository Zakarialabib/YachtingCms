<?php

namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Services\PortalCustomNotificationHandler;

class ProfileController extends Controller
{

    public function profileView()
    {
        $user = new User();

        $role = new Role();

        $name = $user->getAuthenticatedUserFullName();

        $sign_up_date = $user->userCreatedDate();

        $role = $role->role(auth()->id());

        $profile = $user->authenticatedUserProfile();

        return view('pages.backend.settings.profile', compact('name', 'role','sign_up_date', 'profile'));
    }

    public function updateUserProfile(Request $r){

        $this->validate($r,[
            'name'    => 'required|string|max:255',
            'phone'  => 'required|digits:11',
            'address'       => 'required',
        ]);

        $profile = User::where('user_id',auth()->user()->id)->first();
        $profile->sur_name = $r->name;
        $profile->phone = $r->phone;
        $profile->address = $r->address;
        $update = $profile->update();
        if($update){
            return $profile;
        }
        return 0;

    }

    public function updateUserProfilePassword(Request $r){

        $this->validate($r,[
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::find(auth()->user()->id);
        $user->password = Hash::make($r->password);
        $update = $user->update();

        if($update){
            PortalCustomNotificationHandler::passwordReset();
            return $user;
        }

        return 0;

    }
    

    public function updateProfileImageJs(Request $r){

        $file      = $r->file('customer_profile_photo');
        $fileName  = time().$file->getClientOriginalName();
        $file_path = 'images/users/profile/'.$fileName;
        $file->move(public_path('/images/users/profile/'),$fileName);
        $profile = Auth::user()->id->first();
        $profile->photo = $file_path;
        $update = $profile->update();

        if($update){
            return $profile;
        }else{
            return 0;
        }

    }

}
