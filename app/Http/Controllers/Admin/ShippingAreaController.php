<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShipDistrict;
use App\Models\ShipDivision;
use App\Models\ShipState;
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
        $divisions=ShipDivision::orderBy('division_name','ASC')->get();
        $districts=ShipDistrict::with('division')->orderBy('id','DESC')->get();
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
            'message' => 'Successfully District added under a division..!',
            'alert-type' => 'success',
        ];
        return Redirect()->back()->with($notification);
    }

    public function district_edit($district_id){
        $district=ShipDistrict::findorfail($district_id);
        $divisions=ShipDivision::orderby('division_name','ASC')->get();
        return view('admin.district.district_edit',compact('divisions','district'));
    }

    public function district_update(Request $request){
        $district_id=$request->id;
        $request->validate([
            'division_id'=>'required',
            'district_name'=>'required',
        ]);
        ShipDistrict::findorfail($district_id)->update([
            'division_id'=>$request->division_id,
            'district_name'=>$request->district_name,
        ]);
        $notification = [
            'message' => 'Successfully updated district with divison ..!',
            'alert-type' => 'success',
        ];
        return Redirect()->route('district')->with($notification);
    }

    public function district_destroy($district_id){
        ShipDistrict::findorfail($district_id)->delete();
        $notification = [
            'message' => 'Successfully deleted district with divison ..!',
            'alert-type' => 'success',
        ];
        return Redirect()->route('district')->with($notification);
    }

    /* ============================state function ================================== */
    public function state_create(){
        $states=ShipState::with('division','district')->orderby('id','DESC')->get();
        $divisions=ShipDivision::orderby('division_name','ASC')->get();
        return view('admin.state.create',compact('states','divisions'));
    }

    /* =====================get district by ajax================ */
    public function get_districtajax($division_id){
       $shipp= ShipDistrict::where('division_id',$division_id)->orderby('district_name','ASC')->get();
       return json_encode($shipp);
    }

    public function state_store(Request $request){
        $request->validate([
            'division_id'=>'required',
            'district_id'=>'required',
            'state_name'=>'required',
        ],[
            'division_id.required'=>'you must have to select',
            'district_id.required'=>'this one as-well casue it comes below division ',
        ]);
        ShipState::insert([
            'division_id'=>$request->division_id,
            'district_id'=>$request->district_id,
            'state_name'=>$request->state_name,
            'created_at'=>Carbon::now(),
        ]);
        $notification = [
            'message' => 'Successfully state inserted',
            'alert-type' => 'success',
        ];
        return Redirect()->route('state')->with($notification);
    
    }

    public function state_edit($state_id){
        $state=ShipState::findorfail($state_id);
        $divisions=ShipDivision::orderBy('division_name','ASC')->get();
        return view('admin.state.state_edit',compact('state','divisions'));

    }

    public function state_update(Request $request){
        /* j valuta hiiden hoia astycy edit page thaky oita raklam $sate_id te */
        $state_id=$request->id;

        $request->validate([
            'state_name'=>'required',
        ],[
            'state_name.required'=>'ato jamela toa korcen e ai state ta edit korte , 
            first a thik vaby dawa jay nai , fazil lok , state de abr thik kore ',
        ]);
        ShipState::findorfail($state_id)->update([
            'state_name'=>$request->state_name,
            'updated_at'=>Carbon::now(),
        ]);
        $notification = [
            'message' => 'Successfully updated state',
            'alert-type' => 'success',
        ];
        return Redirect()->route('state')->with($notification);
    }

    public function state_destroy($state_id){
        ShipState::findorfail($state_id)->delete();
        $notification = [
            'message' => 'Successfully deleted state',
            'alert-type' => 'success',
        ];
        return Redirect()->route('state')->with($notification);
    }
}
