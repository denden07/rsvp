<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RsvpResponse;


class RsvpResponseController extends Controller
{
    //

    public function all()
    {
        $rsvp_list = RsvpResponse::paginate(10);

        return response()->json(['data' => $rsvp_list]);
    }


    public function store(Request $request) {

    // Validate the incoming request data
    $validatedData = $request->validate([
        'full_name' => 'required|string|max:255',
        'phone' => 'required|string|max:255',
        'plus_one' => 'nullable|string|max:255',
        'attendance' => 'required|string|max:255',
    ]);

    // Check if the phone number already exists in the database
    $existingRsvp = RsvpResponse::where('phone', $validatedData['phone'])->first();

    if ($existingRsvp) {
        // If phone number already exists, return an error response
        return response()->json(['error' => 'Phone number already exists.'], 422);
    }

    $recaptcha_response = $request->input('g-recaptcha-response');

    if (is_null($recaptcha_response)) {
        return response()->json(['error' => 'Please Complete the Recaptcha to proceed'], 422);
     }


        $rsvp = new RsvpResponse();
        $rsvp->full_name = $request->full_name;
        $rsvp->phone =  $request->phone;
        $rsvp->plus_one =  $request->plus_one;
        $rsvp->attendance =  $request->attendance;
        $rsvp->message =  $request->message;

        $rsvp->save();
        return response()->json(['message' => 'RSVP response saved successfully.'], 200);
    }

    public function delete ($id) {
        $deleted = RsvpResponse::find($id)->delete();
        if($deleted){
            return true;
        }
    }

    public function getMessage ($id) {
        $message = RsvpResponse::find($id);

        return response()->json(['message' => $message->message], 200);
    }
}
