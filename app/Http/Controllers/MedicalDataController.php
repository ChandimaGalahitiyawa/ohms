<?php

namespace App\Http\Controllers;

use App\Models\MedicalData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MedicalDataController extends Controller
{
    
    // Patient data route
    public function PatientData()
    {

        $user = Auth::user();

        $patient = $user->patient;

        $myMedicalData = $patient->medicalData;

        return view('patient.medical-data', compact('myMedicalData'));
    }

    public function createMedicalData(){



        return view('patient.newMedicalData');
    }


    public function storeMedicalData(Request $request)
    {
        // Validate the form data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'stu-img' => 'nullable|file|mimes:pdf,jpeg,png,jpg,gif|max:2048', // Validate the uploaded image
            'webcam_capture_file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the captured image from webcam
        ]);

        $user = Auth::user();

        $patient = $user->patient;

        // Create a new MedicalData instance
        $medicalData = new MedicalData();
        $medicalData->title = $request->title;
        $medicalData->patient_id = $patient->id;
        $medicalData->description = $request->description;

        // Handle file upload from form
        if ($request->hasFile('stu-img')) {
            $file = $request->file('stu-img');
            $filePath = $file->store('medical_data', 'public');
            $medicalData->file_path = $filePath;
        }

        // Handle file upload from webcam capture
        if ($request->hasFile('webcam_capture_file')) {
            $file = $request->file('webcam_capture_file');
            $filePath = $file->store('medical_data', 'public');
            $medicalData->file_path = $filePath;
        }

        // Save the MedicalData instance
        $medicalData->save();

        // Redirect back with success message or return JSON response
        return redirect()->back()->with('success', 'Medical data added successfully!');
    }


    public function deleteMedicalData($id){

        $medicaldata = MedicalData::findOrfail($id);

        if ($medicaldata->file_path) {

            Storage::delete($medicaldata->file_path);

        }

        $medicaldata->delete();

        return redirect()->back()->with('success' , 'data deleted successfully');

    }

    public function getUpdateMedicaldata($id){

        $medicalData = MedicalData::findOrfail($id);

        return view('patient.updateMedicaldata', compact('medicalData'));
    }

    public function updateMedicalData(Request $request, $id){

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'stu-img' => 'nullable|file|mimes:pdf,jpeg,png,jpg,gif|max:2048', // Validate the uploaded image
            'webcam_capture_file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the captured image from webcam
        ]);
        
        $medicalData = MedicalData::findOrFail($id);

        $user = Auth::user();

        $patient = $user->patient;


        $medicalData->title = $request->title;
        $medicalData->patient_id = $patient->id;
        $medicalData->description = $request->description;

         // Handle file upload from form
         if ($request->hasFile('stu-img')) {
            $file = $request->file('stu-img');
            $filePath = $file->store('medical_data', 'public');
            $medicalData->file_path = $filePath;
        }

        // Handle file upload from webcam capture
        if ($request->hasFile('webcam_capture_file')) {
            $file = $request->file('webcam_capture_file');
            $filePath = $file->store('medical_data', 'public');
            $medicalData->file_path = $filePath;
        }

        // Save the MedicalData instance
        $medicalData->save();

        return redirect()->back()->with('success' , 'data updated successfully');

    }
}
