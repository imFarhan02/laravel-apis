<?php

namespace App\Http\Controllers\Strapi;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\Strapi\ConstitutionResource; // Constitution Resource
use App\Models\ConstitutionOfIndia; // Constitution Model

class getController extends Controller
{
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
    
}
