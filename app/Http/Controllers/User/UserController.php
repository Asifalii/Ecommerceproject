<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
class UserController extends Controller
{
    public function index()
    {
        return view('user.home');
    }

    public function updatedata(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
            ],
            [
                'name.required' => 'Put your name',
            ]
        );
        User::findOrFail(Auth::id())->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'update_at' => Carbon::now(),
        ]);
        $notification = [
            'message' => 'Successfully Data Updated',
            'alert-type' => 'success',
        ];
        return Redirect()->back()->with($notification);
    }

    // image page view

    public function imagepage(){
        return view('user.change-image');
    }

    // update image method
    public function updateimage(Request $request)
    {
         $old_image = $request->old_image;

         if (User::findOrFail(Auth::id())->image=='f/m/a.jpg') {
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
             return Redirect()->back()->with($notification);
         }else{
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
             return Redirect()->back()->with($notification);
         }
    

    }

    // view page of change_password_view_page_
    
    public function change_password_view_page_method(){
        return view('user.change_password_view_page');
    }

    public function change_password_method(Request $request){
        $request -> validate([
            'old_password'=> 'required',
            'new_password'=> 'required',
            'confirm_pass'=> 'required',
        ]);

        $db_pass = Auth::user()->password;  
        $old_password =$request->old_password;
        $new_password =$request->new_password;
        $confirm_pass =$request->confirm_pass;
        
       if ( Hash::check($old_password,$db_pass)) {
          if($new_password===$confirm_pass){
           User::findOrFail(Auth::id())->update([
               'password'=> Hash::make($new_password),
               
           ]);
           Auth::logout();
           $notification = [
            'message' => 'password updated successfully , please log in with new password !',
            'alert-type' => 'success',
        ];
         return Redirect()->route('login')->with($notification);


          }else {
            $notification = [
                'message' => 'New password & confirm passworddoesn,t match, plase try again !',
                'alert-type' => 'error',
            ];
             return Redirect()
                ->back()
                ->with($notification);
          }
       }else {
        $notification = [
            'message' => 'Old password does,t match in our database',
            'alert-type' => 'error',
        ];
         return Redirect()
            ->back()
            ->with($notification);
     }
       }

       
}