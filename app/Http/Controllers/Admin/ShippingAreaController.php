<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShipDistrict;
use App\Models\ShipDivision;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShippingAreaController extends Controller{
    public function create(){
        $division=ShipDivision::orderby('id','DESC')->get();
        return view('admin.division.create',compact('division'));
    }

    public function store(Request $request){
        $request->validate([
            'division_name'=>'required',
        ]);
        ShipDivision::insert([
            'division_name'=>ucfirst($request->division_name),
            'created_at'=>Carbon::now(),
        ]);
            $notification = [
                'message' => 'Successfully Division added',
                'alert-type' => 'success',
            ];
            return Redirect()->back()->with($notification);
    }
    /* division edit */
    public function edit($division_id){
        $division=ShipDivision::findorfail($division_id);
        return view('admin.division.edit',compact('division'));
    }
    public function update(Request $request){
        $division_id=$request->id;

        $request->validate([
            'division_name'=>'required',
        ]);
        ShipDivision::findorfail($division_id)->update([
            'division_name'=>$request->division_name,
        ]);
        $notification = [
            'message' => 'Successfully Division Updated',
            'alert-type' => 'success',
        ];
        return Redirect()->route('division')->with($notification);
    }

    public function destroy($division_id){
        ShipDivision::findOrFail($division_id)->delete();
        $notification = [
            'message' => 'Successfully Division deleted',
            'alert-type' => 'success',
        ];
        return Redirect()->route('division')->with($notification);
    }
    /* =========================district function =============================== start */
    public function district_create(){
        $divisions=ShipDivision::orderby('division_name','ASC')->get();
        $districts=ShipDistrict::with('division')->orderby('id','DESC')->get();
        return view('admin.district.district_create',compact('districts','divisions'));
    }

    public function district_store(Request $request){
        $request->validate([
            'division_id'=>'required',
            'district_name'=>'required',
        ],[
            'division_id.required'=>'select division',
        ]);
        ShipDistrict::insert([
            'division_id'=>$request->division_id,
            'district_name'=>$request->district_name,
            'created_at'=>Carbon::now(),
        ]);
        $notification = [
            'message' => 'Successfully District added ubder a division',
            'alert-type' => 'success',
        ];
        return Redirect()->back()->with($notification);
    }
}
