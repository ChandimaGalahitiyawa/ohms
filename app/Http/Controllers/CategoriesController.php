<?php

namespace App\Http\Controllers;

use App\Models\Categories; 
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class CategoriesController extends Controller
{

     // Memebr dashboard route
     public function CatagoriesManagement()
     {
         return view('admin.catagories');
     }

     public function CatagoriesManagementAdd()
     {
         return view('admin.catagories-add');
     }

    // Category Creation
    public function createCatagories(Request $request) 
    {
        $validatedData = $request->validate([
            'category-type' => 'required|string|max:255',
            'category-name' => 'required|string|max:255',
            'description' => 'nullable|string|max:4096',
        ]);

        try {
            Categories::create([
                'category_type' => $validatedData['category-type'], 
                'category_name' => $validatedData['category-name'],
                'description' => $validatedData['description']
            ]);

            Session::flash('success', 'Category created successfully!');
        } catch (\Exception $e) {
            Session::flash('error', 'Error creating category. Please try again.');
        }

        return redirect()->route('admin.categories'); 
    }
}
