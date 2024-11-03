<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Request as RequestModel;
use App\Models\User;

class RequestController extends Controller
{
    // request page
    public function request_page(){
        $request_datas = RequestModel::orderBy('id', 'desc')->take(5)->get();
        $users = User::all();       
        return view('request_page',compact('request_datas','users'));
    }

    // request store
    public function request_register(Request $request){
        // dd($request->all());
        $request_store = new RequestModel();
        $request_store->job_id = $this->generateUniqueIdWithDate($request->lost_date);
        $request_store->user_id = Auth::user()->id;
        $request_store->brand_id = $request->brand_id;
        $request_store->name = $request->name;
        $request_store->phone_color = $request->phone_color;
        $request_store->imei_number = $request->imei_number;
        $request_store->lost_date = $request->lost_date;
        $request_store->lost_time = $request->lost_time;
        $request_store->lost_location = $request->lost_location;
        $request_store->contact_number = $request->contact_number;
        $request_store->contact_email = $request->contact_email;
        $request_store->address = $request->address;
        $request_store->message = $request->message;
        // $request_store->social_url = $request->social_url;
        // $request_store->image = $request->image;
        $request_store->save();
        return view('accept_page')->with('success','Your Request Form is Successful!');
    }

     // Define the function within the controller
    private function generateUniqueIdWithDate($lost_date) {
        // Format the date as YYYYMMDD (no dashes)
        $formattedDate = date('Ymd', strtotime($lost_date));

        // Generate a random 6-digit number, padded with leading zeros if necessary
        $randomNumber = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);

        // Combine the formatted date with the random number
        return $formattedDate . $randomNumber;
    }
}
