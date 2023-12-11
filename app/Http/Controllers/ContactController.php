<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\JoinUsEmail;
use App\Mail\ContactUsEmail;

class ContactController extends Controller
{
    public function joinUs(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'companyName' => 'required',
            'companyEmail' => 'required|email',
            'companyPhone' => 'required',
            'companyIndustry' => 'required',
            'companyCountry' => 'required',
            'companyCity' => 'required',
        ]);

        // Send the email
        Mail::to('info@return-ly.com')->send(new JoinUsEmail($validatedData));

        // Return a response indicating success or failure
        return response()->json(['message' => __('dashboard.email-sent-successfully')]);
    }

    public function contactUs(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'userName' => 'required',
            'userEmail' => 'required|email',
            'userSubject' => 'nullable',
            'userMessage' => 'required',
        ]);

        // Send the email
        Mail::to('info@return-ly.com')->send(new ContactUsEmail($validatedData));

        // Return a response indicating success or failure
        return response()->json(['message' => __('dashboard.email-sent-successfully')]);
    }
}
