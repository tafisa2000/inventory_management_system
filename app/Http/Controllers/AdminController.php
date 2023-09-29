<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $notification = array (
            'message' => 'User log out successfuly',
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);
    }

    public function profile()
    { 
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.body.admin_profile_view', compact('adminData'));
    }

     public function EditProfile(){

        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('admin.body.admin_profile_edit',compact('editData'));
    }// End Method 

    public function storeprofile(Request $request){
        // dd($request);
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;

        if ($request->file('profile_image')) {
           $file = $request->file('profile_image');

           $filename = date('YmdHi').$file->getClientOriginalName();
           $file->move(public_path('upload/admin_images'),$filename);
           $data['profile_image'] = $filename;
        }
        $data->save();
        
        $notification = array (
            'message' => 'Admin profile updated successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);

    }// End Method
    
    public function changepassword(){
        return view('admin.body.admin_change_password');
    }// End Method

    public function updatepassword (Request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirmpassword' => 'required|same:newpassword',
            
        ]);

         $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword,$hashedPassword )) {
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->newpassword);
            $users->save();

            session()->flash('message','Password Updated Successfully');
            return redirect()->back();
        } else{
            session()->flash('message','Old password is not match');
            return redirect()->back();
        }
        
        
    }// End Method

}