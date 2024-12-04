<?php

namespace App\Http\Controllers\Strapi;

use App\Http\Controllers\Controller; // Import the base Controller class
use Illuminate\Http\Request;
use App\Http\Resources\Strapi\HelplineContactResource; // Helpline Resource
use App\Models\HelplineContact; // Helpline Model
use App\Http\Resources\Strapi\ConstitutionResource; // Constitution Resource
use App\Models\ConstitutionOfIndia; // Constitution Model


class getController extends Controller
{
    /**
     * Filter HelplineContacts based on the request payload.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function constitution()
    {
        $constitutionRecords = ConstitutionOfIndia::all();

        if ($constitutionRecords->isEmpty()) {
            return response()->json([
                'message' => 'No records found!',
            ], 200);
        }

        return response()->json(
            ConstitutionResource::collection($constitutionRecords),
            200
        );
    }

    public function index()
    {
        // Fetch HelplineContacts with related HelplineTypes and StateDeptOrgs
        $helplineContacts = HelplineContact::with(['helplineTypes', 'stateDeptOrgs'])->get();

        return HelplineContactResource::collection($helplineContacts); // Return resource collection
    }

    public function show($id)
    {
        // Find the HelplineContact by ID with its relationships
        $helplineContact = HelplineContact::with(['helplineTypes', 'stateDeptOrgs'])->find($id);

        // Check if the entry exists
        if (!$helplineContact) {
            return response()->json([
                'message' => 'Helpline Contact not found.'
            ], 404);
        }

        // Return the single resource
        return new HelplineContactResource($helplineContact);
    }


    public function filter(Request $request)
    {
        // Get the input payload
        $filters = $request->all();

        // Query the HelplineContact model with filters
        $query = HelplineContact::query();

        // Apply filters dynamically
        foreach ($filters as $key => $value) {
            if (is_array($value)) {
                // For relationships (helpline_type, state_dept_org)
                if ($key === 'helpline_type') {
                    $query->whereHas('helplineTypes', function ($q) use ($value) {
                        foreach ($value as $relFilter) {
                            $q->where($relFilter); // Assumes each array contains key-value pairs
                        }
                    });
                } elseif ($key === 'state_dept_org') {
                    $query->whereHas('stateDeptOrgs', function ($q) use ($value) {
                        foreach ($value as $relFilter) {
                            $q->where($relFilter); // Assumes each array contains key-value pairs
                        }
                    });
                }
            } else {
                // For direct attributes
                $query->where($key, $value);
            }
        }

        // Execute query and fetch results
        $helplineContacts = $query->with(['helplineTypes', 'stateDeptOrgs'])->get();

        // Return as resource collection
        return response()->json(HelplineContactResource::collection($helplineContacts));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'url' => 'nullable|url',
            'workflow_status' => 'required|string',
        ]);

        // Create the HelplineContact with basic fields
        $helplineContact = HelplineContact::create([
            'title' => $request->input('title'),
            'contact' => $request->input('contact'),
            'url' => $request->input('url'),
            'workflow_status' => $request->input('workflow_status'),
            'owner' => $request->input('owner', null), // Assuming 'owner' is optional
            'review' => $request->input('review', null), // Optional field
            'alias' => $request->input('alias', null), // Optional field
            'subtitle' => $request->input('subtitle', null) // Optional field
        ]);

        // Attach helpline types and state dept orgs through pivot tables
        $helplineContact->helplineTypes()->attach($request->input('helplineTypes'));
        $helplineContact->stateDeptOrgs()->attach($request->input('stateDeptOrgs'));

        return response()->json([
            'message' => 'Helpline contact created successfully',
            'data' => $helplineContact->load('helplineTypes', 'stateDeptOrgs') // Optional: load relations
        ], 201);
    }
}
