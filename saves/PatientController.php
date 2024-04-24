<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{

    // patient dashboard route
    public function dashboard()
    {
        return view('patient.dashboard');
    }

    public function createPatient(Request $request)
    {

    

        $validatedData = $request->validate([
            'FirstName' => 'required|string|max:20',
            'LastName' => 'required|string|max:20',
            'email' => 'required|email|unique:users,email', 
            'nic' => 'nullable|string|max:12', // Added nic field
            'phone' => 'nullable|string|max:13', // Added phone number field
            'password' => 'required|string|min:8|confirmed', // Added password field
        ]);

    //dd($validatedData);

        $user = User::create([
            'name' => $validatedData['FirstName'] . ' ' . $validatedData['LastName'],
            'email' => $validatedData['email'],
            
            'password' => Hash::make($validatedData['password']),
        ]);

        $user->assignRole('patient'); // Ensure you have roles set up correctly

        $patient = new Patient([
            'last_name' => $validatedData['LastName'],
            'nic' => $validatedData['nic'],
            'user_id' => $user->id,
        ]);
        $patient->save();

        if($patient){
            auth()->login($user);
        }

        // if($patient){
        //      $this->sendSms($user); 

        //      return redirect()->route('PatientDashboard');
        // }

        return redirect()->route('PatientDashboard');
    }    

    // private function sendSms(Student $student)
    // { 
    //     $user_id = "26373";
    //     $api_key = "SjAR7q9dPPuR8Ecb2uzm";
    //     $message = "Welcome to Skygate International, " . $student->name . ". We turn your dreams into reality. Together, let's build a successful future for you. Thank you for registering!";
    //     $to = $student->phone;
    //     $sender_id = "SkyGate"; // Replace with your sender ID

    //     $api_url = "https://app.notify.lk/api/v1/send";

    //     try {
    //         $response = Http::get($api_url, [
    //             'user_id' => $user_id,
    //             'api_key' => $api_key,
    //             'message' => $message,
    //             'to' => $to,
    //             'sender_id' => $sender_id,
    //         ]);

    //         // Log the response
    //         $logMessage = "Notify.lk SMS Response for student {$student->id}: " . json_encode($response->json());
    //         \Illuminate\Support\Facades\Log::info($logMessage);

    //         // Check if the SMS was sent successfully
    //         if ($response->successful()) {
    //             // SMS sent successfully
    //             // You may log this or perform additional actions
    //         } else {
    //             // SMS sending failed
    //             // You may log this or handle errors
    //             // $response->status(), $response->body(), etc.
    //         }
    //     } catch (\Exception $e) {
    //         // Log any exceptions that might occur during the HTTP request
    //         \Illuminate\Support\Facades\Log::error('Exception during Notify.lk SMS request: ' . $e->getMessage());
    //     }
    // }
}
