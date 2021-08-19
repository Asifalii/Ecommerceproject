<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\Models\User;
use Intervention\Image\Facades\Image;
use Hash;
class AdminController extends Controller
{
    public function index(){
        return view('admin.home');
    }
    /* admin profile view */
    public function admin_profile_view_method(){
        return view('admin.admin_profile');
    }

    public function update_data(Request $request){
        $request -> validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ],[
            'name' =>'put your name plz',
        ]);
        User::findOrFail(Auth::id())->update([
            'name' => $request->name,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'updated_at'=> Carbon::now(),
        ]);
        $notification = [
            'message' => 'Successfully Data Updated',
            'alert-type' => 'success',
        ];
        return Redirect()
            ->back()
            ->with($notification);

    }

    public function imagepage()
    {
        return view('admin.admin_image');
    }

    public function update_image(Request $request){
        $old_image = $request->old_image;
        if(User::findOrFail(Auth::id())->image=='f/m/a.jpg'){
        $image    = $request->file('image');
        $name_gen =  hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('f/m/'.$name_gen);
        $save_url = 'f/m/'.$name_gen;
        User::findOrFail(Auth::id())->update([
           'image' => $save_url,
       ]);
           
    }else {
        unlink($old_image);
        $image    = $request->file('image');
        $name_gen =  hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('f/m/'.$name_gen);
        $save_url = 'f/m/'.$name_gen;
        User::findOrFail(Auth::id())->update([
           'image' => $save_url,
       ]);
       $notification = [
        'message' => 'Successfully Image Updated',
        'alert-type' => 'success',
    ];
     return Redirect()
        ->back()
        ->with($notification);
    }       

    }

    /* update pass route view */

    public function update_pass_vied_method(){
        return view('admin.admin-password');
    }

    /* update route method */
    public function update_pass_method(Request $request){
        
        $request -> validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_pass' => 'required',
        ],
        [
            'old_password.required' => 'please isert the puran pass',
        ]);
        
        $db_pass     = Auth::user()->password;
        $old_password=$request->old_password;
        $new_password=$request->new_password;
        $confirm_pass=$request->confirm_pass;

        if (Hash::check($old_password,$db_pass)) {
           if ($new_password===$confirm_pass) {
               User::findOrFail(Auth::id())->update([
                'password' => Hash::make($new_password),
               ]);
               Auth::logout();
               $notification = [
                'message' => 'Password updated successfully',
                'alert-type' => 'success',
            ];
             return Redirect()->route('login')->with($notification);

           }else {
            $notification = [
                'message' => 'New password doesnt match match to the confirm pass',
                'alert-type' => 'error',
            ];
             return Redirect()
                ->back()
                ->with($notification);
           }
        }else {
            $notification = [
                'message' => 'Old password doesnt match match to the current pass',
                'alert-type' => 'error',
            ];
             return Redirect()
                ->back()
                ->with($notification);     
            }
    }
   
}