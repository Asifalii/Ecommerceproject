<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CuponController extends Controller{

    public function create(){
        $cupons=Cupon::orderBy('id','DESC')->get();
        return view('admin.cupon.create',compact('cupons'));
    }

    public function store(Request $request){
        $request->validate([
            'cupon_name'=>'required',
            'cupon_discount'=>'required',
            'cupon_validity'=>'required',
        ]);

        Cupon::insert([
            'cupon_name'=>strtoupper($request->cupon_name),
            'cupon_discount'=>$request->cupon_discount,
            'cupon_validity'=>$request->cupon_validity,
            'created_at'=>Carbon::now(),
        ]);
        $notification = [
            'message' => ' cupone added',
            'alert-type' => 'success',
        ];
        return Redirect()->back()->with($notification);

    }

    public function edit($c_id){
        $cupons=Cupon::findOrfail($c_id);
        return view('admin.cupon.edit',compact('cupons'));
    }

    public function update(Request $request){
       $cupon_id= $request->id;
       $request->validate([
        'cupon_name'=>'required',
        'cupon_discount'=>'required',
        'cupon_validity'=>'required',
    ]);

    Cupon::findorfail($cupon_id)->update([
        'cupon_name'=>strtoupper($request->cupon_name),
        'cupon_discount'=>$request->cupon_discount,
        'cupon_validity'=>$request->cupon_validity,
        'created_at'=>Carbon::now(),
        ]);
        $notification = [
            'message' => ' cupone updated',
            'alert-type' => 'success',
        ];
        return Redirect()->route('cupone')->with($notification);
        }

    public function destroy($cuppon_id){
        Cupon::findorfail($cuppon_id)->delete();
            $notification = [
                'message' => ' cupone deleted',
                'alert-type' => 'success',
            ];
            return Redirect()->back()->with($notification);
    }
}
