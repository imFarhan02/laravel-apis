<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Categories; // Categories model
use App\Http\Resources\CategoriesResource;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index() // For API Request
    {
        try {
            $categoryGroups = Categories::all(); // Fetch all category groups

            if ($categoryGroups->count() > 0) {
                return CategoriesResource::collection($categoryGroups); // Return the categories in the resource format
            } else {
                return response()->json(['message' => 'No Record Found!!'], 200); // If no records are found
            }
        } catch (\Exception $e) {
            // Log the error details for debugging
            Log::error('Error fetching category groups: ' . $e->getMessage());

            // Optionally, you can also send an error message to the client
            return response()->json([
                'message' => 'An error occurred while fetching category groups.',
                'error' => $e->getMessage()
            ], 500); // Return a 500 internal server error
        }
    }

    // public function index()   //For Web Request
    // {
    //     $categoryGroups = Categories::all(); // Fetch all category groups
    //     if ($categoryGroups->count() > 0) {
    //         return view('category-groups.index', compact('categoryGroups'));
    //     } else {
    //         return view('category-groups.index', ['message' => 'No Record Found!!']);
    //     }
    // }

    // public function index() //For Both Requests
    // {
    //     $categoryGroups = Categories::all(); // Fetch all category groups
    //     if ($categoryGroups->count() > 0) {
    //         if (request()->expectsJson()) {
    //             return CategoriesResource::collection($categoryGroups); // For API requests
    //         } else {
    //             return view('category-groups.index', compact('categoryGroups')); // For web requests
    //         }
    //     } else {
    //         if (request()->expectsJson()) {
    //             return response()->json(['message' => 'No Record Found!!'], 200); // For API requests
    //         } else {
    //             return view('category-groups.index', ['message' => 'No Record Found!!']); // For web requests
    //         }
    //     }
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category-groups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'alias' => 'nullable|string|max:255',
            // Add validation for other fields as needed
        ]);

        Categories::create($validated); // Use the Categories model
        return redirect()->route('category-groups.index')->with('success', 'Category Group created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categoryGroup = Categories::findOrFail($id); // Use the Categories model
        return view('category-groups.show', compact('categoryGroup'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categoryGroup = Categories::findOrFail($id); // Use the Categories model
        return view('category-groups.edit', compact('categoryGroup'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'alias' => 'nullable|string|max:255',
            // Add validation for other fields as needed
        ]);

        $categoryGroup = Categories::findOrFail($id); // Use the Categories model
        $categoryGroup->update($validated);

        return redirect()->route('category-groups.index')->with('success', 'Category Group updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categoryGroup = Categories::findOrFail($id); // Use the Categories model
        $categoryGroup->delete();

        return redirect()->route('category-groups.index')->with('success', 'Category Group deleted successfully.');
    }
}
