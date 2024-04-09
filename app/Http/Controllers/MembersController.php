<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\members;
use App\Models\plan;
use App\Models\enquiry;
use Auth;

class MembersController extends Controller
{
	 public function membersList()
    {
    	$get_members=members::where('is_deleted',0)->get();
    	return view('admin.membersList')->with(['member'=>$get_members]);
    }

    public function membersRegistration()
    {
        $members = members::where('status',0)->where('is_deleted',0)->get();
    	$get_plan = plan::where('status',0)->where('is_deleted',0)->get();
    	return view('members.memberRegistration')->with(['plan'=>$get_plan])->with(['members'=>$members]);
    }
    public function storeMembers(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        // exit;

    	$validated = $request->validate([
    		'name'=>'required',
    		'mobileno'=>'required|min:10|max:10',
    		'email'=>'required',
    		'dob'=>'required|date|before:-18 years',
    		'height'=>'required',
    		'currentWeight'=>'required',
    		'fatPercentage'=>'required',
    		'address'=>'required',
    		'occupation'=>'required',
    		'photo'=>'required|mimes:png,jpg,jpeg']);
    	
    	if($request->photo)
    	{
    		$user_photo = substr(md5(mt_rand()),0,7).$request->file('photo')->getClientOriginalName();
    		$request->photo->move(public_path('image'),$user_photo);
    	}

    	$member_store = new members();
        $member_store->joining = $request->joining;
        $member_store->reference = $request->reference;
    	$member_store->name = $request->name;
    	$member_store->mobileno = $request->mobileno;
    	$member_store->email = $request->email;
    	$member_store->dob = $request->dob;
    	$member_store->gender = $request->gender;
    	$member_store->doj = $request->doj;
    	$member_store->height = $request->height;
    	$member_store->currentWeight = $request->currentWeight;
    	$member_store->fatPercentage = $request->fatPercentage;
    	$member_store->plan_id = $request->plan;
    	$member_store->address = $request->address;
    	$member_store->photo = $user_photo;
    	$member_store->diet = $request->diet;
    	$member_store->lifestyle = $request->lifestyle;
    	$member_store->profession = $request->profession;
    	$member_store->occupation = $request->occupation;
    	$member_store->save();
    	return redirect("membersRegistration");
    }

    public function editmember($id)
    {
    	$get_plan = plan::where('status',0)->where('is_deleted',0)->get();
    	$get_members = members::where('id',$id)->first();
    	return view('admin.edit_member')->with(['plan'=>$get_plan])->with(['member'=>$get_members]);
    }

    public function storememberedit(Request $request)
    {
    	if($request->photo)
    	{
    		$user_photo = substr(md5(mt_rand()),0,7).$request->file('photo')->getClientOriginalName();
    	$request->photo->move(public_path('image'),$user_photo);
    	}

    	$member_edit = members::where('id',$request->id)->first();
        $member_edit->reference = $request->reference;
    	$member_edit->name = $request->name;
    	$member_edit->mobileno = $request->mobileno;
    	$member_edit->email = $request->email;
    	$member_edit->dob = $request->dob;
    	$member_edit->gender = $request->gender;
    	$member_edit->doj = $request->doj;   
    	$member_edit->height = $request->height;
    	$member_edit->currentWeight = $request->currentWeight;
    	$member_edit->fatPercentage = $request->fatPercentage;
    	$member_edit->plan_id = $request->plan;
    	$member_edit->address = $request->address;
    	if($request->file('user_photo')){
            $member_edit->photo=$user_photo;
        }
    	$member_edit->diet = $request->diet;
    	$member_edit->lifestyle = $request->lifestyle;
    	$member_edit->profession = $request->profession;
    	$member_edit->occupation = $request->occupation;
    	$member_edit->update();
    	return redirect('memberslist');
    }

    public function deletemember($id)
    {
    	$delete_member = members::where('id',$id)->first();   	
    	$delete_member->is_deleted=1;
    	$delete_member->update();
    	return redirect('memberslist');
    }

    public function changeStatus($id,$status)
    {
        $member = members::find($id);
        $member->status = $status;
        $member->save();

        return response()->json(['success' => 'Status change successfully.']);
    }

    public function checkMobile($mobileno)
    {
        $get_mobile = enquiry::where('mobileno',$mobileno)->first();
        if($get_mobile!=''){
            $name = $get_mobile->name;
            $mobile = $get_mobile->mobileno;
            return response()->json(['name' => $name, 'mobile' => $mobile]);
        }
        else{
            return response(1);
        }
    }

    
}
