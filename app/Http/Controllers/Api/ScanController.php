<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ScanCollection;
use App\Http\Resources\ScanResource;
use App\Permit;
use App\Scan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ScanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $user = \request()->user('api');

        return new ScanCollection(Scan::where('user_id', $user->id)->get());
    }

    public function scan(Request $request)
    {
        Log::info(json_encode($request->all()));
        $request->validate([
           'permit_number' => ['required','string'],
//           'latitude' => ['required','string'],
//           'longitude' => ['required','string'],
        ]);

        $permit = Permit::where('permit_number',$request->get('permit_number'))->first();

        if ($permit) {
            $scan = $permit->scans()->create([
                'user_id' => 2,
                'latitude' => $request->get('latitude'),
                'longitude' => $request->get('longitude'),
                'valid' => true
            ]);

            return response()->json(new ScanResource($scan), 200);
        } else {
            return response()->json([
                'error' => 'invalid permit'
            ], 404);
        }
    }
}
