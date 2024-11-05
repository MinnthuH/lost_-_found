<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Request as RequestModel;
use App\Models\User;
use App\Models\Device;
use App\Models\Brand;

class RequestController extends Controller
{
    // Request page
    public function request_page() {
        $request_datas = RequestModel::orderBy('id', 'desc')->take(5)->get();
        $users = User::all();       
        $devices = Device::all();
        $brands = Brand::all();        
        return view('request_page', compact('request_datas', 'users','devices','brands'));
    }

    // Request store
    public function request_register(Request $request) {
        // Validate the request
        $validatedData = $request->validate([            
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',            
            // Add other fields as necessary
        ]);
                
            $request_store = new RequestModel();
            $request_store->job_id = $this->generateUniqueIdWithDate($request->lost_date);
            $request_store->user_id = Auth::user()->id;
            $request_store->brand_id = $request->brand_id;
            $request_store->phone_model = $request->phone_model;
            $request_store->phone_color = $request->phone_color;
            $request_store->imei_number = $request->imei_number;
            $request_store->lost_date = $request->lost_date;
            $request_store->lost_time = $request->lost_time;
            $request_store->lost_location = $request->lost_location;
            $request_store->contact_number = $request->contact_number;
            $request_store->contact_email = $request->contact_email;
            $request_store->address = $request->address;
            $request_store->message = $request->message;
            $request_store->social_url = $request->social_url;

            // Handle file upload if an image is provided
            if ($request->hasFile('image')) {
                $file = $request->file('image'); // Get the uploaded file
                $filename = 'image' . time() . '.' . $file->getClientOriginalExtension(); // Create a unique filename
                $file->move('images', $filename); // Move the file to the specified directory
                $request_store->image = $filename; // Assign the filename to the model
            }
            // $path = $file->storeAs('images', $filename, 'public');
            // $request_store->image = $path;

            $request_store->save();            
            return redirect()->route('accept_page')->with('success', 'Your Request Form is Successful!');        
    }

    // Function to generate unique ID with date
    private function generateUniqueIdWithDate($lost_date) {
        $formattedDate = date('Ymd', strtotime($lost_date));
        $randomNumber = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
        return $formattedDate . $randomNumber;
    }
}
