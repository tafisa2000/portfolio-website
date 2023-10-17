<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class AdiminController extends Controller
{
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
         $notification = array (
            'message' => 'admin logout successfuly',
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);
    }//end function

    public function profile()
    {
        $id = Auth:: user()->id;
        $adminData = User:: find($id);
        return view ('admin.admin_profile_view',compact('adminData'));

        }//end function


        public function Editprofile()
        {
        $id = Auth:: user()->id;
        $editData = User:: find($id);
        return view ('admin.admin_profile_edit',compact('editData'));

            
        }//end function

        public function storeprofile(Request $request){
        $id = Auth:: user()->id;
        $data = User:: find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        if($request->file('profile_image')){
            $file = $request->file('profile_image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['profile_image'] = $filename;
        }
        $data->save();
        $notification = array (
            'message' => 'admin profile updated successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);
        
        }

        public function changepassword(){
            return view('admin.admin_change_password');
        }

        public function updatepassword(Request $request){
            $validateData = $request->validate([
                'oldpassword' => 'required',
                'newpassword' => 'required',
                'confirm_password' => 'required|same:newpassword',
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
        }
}