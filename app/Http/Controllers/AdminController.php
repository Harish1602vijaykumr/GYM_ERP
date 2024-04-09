<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\plan;
use App\Models\fees;
use App\Models\members;
use App\Models\workout;
use App\Models\bodyshape;
use App\Models\entry;
use App\Models\enquiry;

class 
AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }


    public function addplan()
    {
    	return view('admin.plan');
    }

    public function storeplan(Request $request)
    {
    	$store_plan = new plan();
    	$store_plan->plan_name = $request->plan_name;

    	$store_plan->save();

    	return redirect('listplan'); 
    }

    public function listplan()
    {
    	$get_plan = plan::where('is_deleted',0)->get();
    	return view('admin.listplan')->with(['plan'=>$get_plan]);
    }

    public function editplan($id)
    {
    	$edit_plan = plan::where('id',$id)->first();
    	return view('admin.edit_plan')->with(['plan'=>$edit_plan]);
    }

    public function storeplanedit(Request $request)
    {
    	$storeplanedit = plan::where('id',$request->id)->first();
    	$storeplanedit->plan_name = $request->plan_name;
    	$storeplanedit->update();

    	return redirect('listplan');
    }

    public function deleteplan($id)
    {
    	$deleteplan = plan::where('id',$id)->first();
    	$deleteplan->is_deleted=1;
    	$deleteplan->update();

    	return redirect('listplan');
    }

    public function planStatus($id,$status)
    {
        $plan = plan::find($id);
        $plan->status = $status;
        $plan->update();

        return response()->json(['success' => 'Status change successfully.']);
    }
    public function feesentry()
    {
    	$get_plan = plan::where('status',0)->where('is_deleted',0)->get();
        return view('admin.fees')->with(['plan'=>$get_plan]);
    }

    public function storefeesentry(Request $request)
    {
    	$storefees = new fees();
    	$storefees->date = $request->date;
    	$storefees->mobileno = $request->mobileno;
        $storefees->plan_id = $request->plan;
        $storefees->amount = $request->amount;
        $storefees->save();

        return redirect('feesentry');
    }

    public function listfees()
    {
        $get_fees = fees::with('getplan')->where('is_deleted',0)->get();
        return view('admin.listfees')->with(['fees'=>$get_fees]);
    }

    public function editfees($id)
    {
        $get_plan = plan::where('status',0)->where('is_deleted',0)->get();
        $get_fees = fees::where('id',$id)->first();
        return view('admin.edit_fees')->with(['plan'=>$get_plan])->with(['fees'=>$get_fees]);
    }

    public function storefeesedit(Request $request)
    {
        $storefees = fees::where('id',$request->id)->first();
        $storefees->date = $request->date;
        $storefees->mobileno = $request->mobileno;
        $storefees->plan_id = $request->plan;
        $storefees->amount = $request->amount;
        $storefees->update();

        return redirect('listfees');
    }

    public function deletefees($id)
    {
        $deletefees = fees::where('id',$id)->first();
        $deletefees->is_deleted=1;
        $deletefees->update();

        return redirect('listfees');
    }

    public function checkMobile($mobileno)
    {
        $get_mobile = members::where('mobileno',$mobileno)->first();
        if($get_mobile!=''){
            return response()->json(['name'=>$get_mobile->name, 'mobileno' =>$get_mobile->mobileno]);
        }
        else{
            return response(1);
        }
    }
public function feesStatus($id,$status)
    {
        $fees = fees::find($id);
        $fees->status = $status;
        $fees->update();

        return response()->json(['success' => 'Status change successfully.']);
    }

    public function workout()
    {
        return view('admin.workout');
    }

    public function storeworkout(Request $request)
    {
        $store_workout = new workout();
        $store_workout->workout_name = $request->workout_name;
        $store_workout->save();
        return redirect('workout');
    }

    public function listworkout()
    {
       $get_workout = workout::where('is_deleted',0)->get();
       return view('admin.listworkout')->with(['workout'=>$get_workout]);
    }

     public function editworkout($id)
     {
        $edit_workout = workout::where('id',$id)->first();
        return view('admin.editworkout')->with(['workout'=>$edit_workout]);
     }

     public function storeworkoutedit(Request $request)
     {
        $storeworkout = workout::where('id', $request->id)->first();
        $storeworkout->workout_name = $request->workout_name;
        $storeworkout->update();
        return redirect('listworkout');
     }

     public function deleteworkout($id)
     {
        $deleteworkout = workout::where('id',$id)->first();
        $deleteworkout->is_deleted=1;
        $deleteworkout->update();

        return redirect('listworkout');
     }
     public function workoutStatus($id,$status)
    {
        $workout = workout::find($id);
        $workout->status = $status;
        $workout->update();

        return response()->json(['success' => 'Status change successfully.']);
    }

    public function bodyshape()
    {
        return view('admin.bodyshape');
    }

    public function storebodyshape(Request $request)
    {
        $storebodyshape = new bodyshape();
        $storebodyshape->bodyshape = $request->bodyshape;
        $storebodyshape->update();
        return redirect('bodyshape');
    }

    public function listbodyshape()
    {
       $get_bodyshape = bodyshape::where('is_deleted',0)->get();
       return view('admin.listbodyshape')->with(['bodyshape'=>$get_bodyshape]);
    }

     public function editbodyshape($id)
     {
        $edit_bodyshape = bodyshape::where('id',$id)->first();
        return view('admin.editbodyshape')->with(['bodyshape'=>$edit_bodyshape]);
     }

     public function storebodyshapeedit(Request $request)
     {
        $storebodyshape = bodyshape::where('id', $request->id)->first();
        $storebodyshape->bodyshape = $request->bodyshape;
        $storebodyshape->update();
        return redirect('listbodyshape');
     }

     public function deletebodyshape($id)
     {
        $deletebodyshape = bodyshape::where('id',$id)->first();
        $deletebodyshape->is_deleted=1;
        $deletebodyshape->update();

        return redirect('listbodyshape');
     }

      public function bodyshapeStatus($id,$status)
    {
        $bodyshape = bodyshape::find($id);
        $bodyshape->status == $status;
        $bodyshape->update();

        return response()->json(['success' => 'Status change successfully.']);
    }

    public function entry()
    {
        $members = members::where('status',0)->where('is_deleted',0)->get();
        $workout = workout::where('status',0)->where('is_deleted',0)->get();
        $bodyshape = bodyshape::where('status',0)->where('is_deleted',0)->get();
        return view ('admin.entry')->with(['members'=>$members])->with(['workout'=>$workout])->with(['bodyshape'=>$bodyshape]);
    }

    public function storeentry(Request $request)
    {
        $storeentry = new entry();
        $storeentry->member_id = $request->member_id;
        $storeentry->weight = $request->weight;
        $storeentry->supplements = $request->supplements;
        $storeentry->supplement_name = $request->supplement_name;
        $storeentry->fatPercentage = $request->fatPercentage;
        $storeentry->workout_id = $request->workout;
        $storeentry->bodyshape_id = $request->bodyshape;
        $storeentry->save();
        return redirect('entry');
    }

    public function listentry()
    {
        $get_entry = entry::where('is_deleted',0)->get();
        return view('admin.listentry')->with(['entry'=>$get_entry]);
    }

    public function editentry($id)
    {
        $members = members::where('status',0)->where('is_deleted',0)->get();
        $workout = workout::where('status',0)->where('is_deleted',0)->get();
        $bodyshape = bodyshape::where('status',0)->where('is_deleted',0)->get();
        $get_entry = entry::where('id',$id)->first();
        return view ('admin.editentry')->with(['members'=>$members])->with(['workout'=>$workout])->with(['bodyshape'=>$bodyshape])->with(['entry'=>$get_entry]);
    }

    public function storeentryedit(Request $request)
    {
        $storeentry = entry::where('id',$request->id)->first();
        $storeentry->member_id = $request->member_id;
        $storeentry->weight = $request->weight;
        $storeentry->supplements = $request->supplements;
        $storeentry->supplement_name = $request->supplement_name;
        $storeentry->fatPercentage = $request->fatPercentage;
        $storeentry->workout_id = $request->workout;
        $storeentry->bodyshape_id = $request->bodyshape;
        $storeentry->update();
        return redirect('listentry');

    }
    public function deleteentry($id)
    {
        $get_entry = entry::where('id',$id)->first();
        $get_entry->is_deleted = 1;
        $get_entry->update();
        return redirect('listentry');
    }
    public function entryStatus($id,$status)
    {
        $entry = entry::find($id);
        $entry->status = $status;
        $entry->update();

        return response()->json(['success' => 'Status change successfully.']);
    }

    public function enquiry()
    {
        return view('admin.enquiry');
    }

    public function storeenquiry(Request $request)
    {
        $store_enquiry = new enquiry();
        $store_enquiry->name = $request->name;
        $store_enquiry->mobileno = $request->mobileno;
        $store_enquiry->save();
        return redirect('listenquiry');
    }

    public function listenquiry()
    {
       $get_enquiry= enquiry::where('is_deleted',0)->get();
       return view('admin.listenquiry')->with(['enquiry'=>$get_enquiry]);
    }

     public function editenquiry($id)
     {
        $edit_enquiry = enquiry::where('id',$id)->first();
        return view('admin.editenquiry')->with(['enquiry'=>$edit_enquiry]);
     }

     public function storeenquiryedit(Request $request)
     {
        $storeenquiry = enquiry::where('id', $request->id)->first();
        $storeenquiry->name = $request->name;
        $storeenquiry->mobileno = $request->mobileno;
        $storeenquiry->update();
        return redirect('listenquiry');
    }

     public function deleteenquiry($id)
     {
        $deleteenquiry = enquiry::where('id',$id)->first();
        $deleteenquiry->is_deleted=1;
        $deleteenquiry->update();

        return redirect('listenquiry');
     }

      public function enquiryStatus($id,$status)
    {
        // dd($status);
        $enquiry = enquiry::find($id);
        // dd($enquiry);
        $enquiry->status = $status;
        $enquiry->update();
        // dd($enquiry->status);

        return response()->json(['success' => 'Status change successfully.']);
    }

}
