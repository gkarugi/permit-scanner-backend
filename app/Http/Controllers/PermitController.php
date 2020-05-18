<?php

namespace App\Http\Controllers;

use App\Permit;
use App\Vehicle;
use App\VehicleOccupant;
use Illuminate\Http\Request;

class PermitController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $permits = Permit::all();

        return view('permits.index', compact('permits'));
    }

    public function create()
    {
        return view('permits.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $vehicle = Vehicle::create([
           'reg_no' => $data['reg_no'],
           'make' => $data['make'],
           'model' => $data['model'],
           'color' => $data['color'],
        ]);

        $permit = Permit::create([
            'vehicle_id' => $vehicle->id,
           'permit_number' => $data['permit_number'],
           'valid_from' => $data['valid_from'],
           'expires_on' => $data['expires_on'],
           'goods_description' => $data['goods_description'],
           'origin' => $data['origin'],
           'destination' => $data['destination'],
        ]);

        return redirect()->route('permits.show', ['permit' => $permit]);
    }

    public function show(Permit $permit)
    {
        return view('permits.show', compact('permit'));
    }

    public function storeOccupant(Request $request, Permit $permit)
    {
        VehicleOccupant::create([
            'vehicle_id' => $permit->vehicle->id,
            'name' => $request->get('name'),
            'reg_document' => $request->get('document_type'),
            'reg_document_number' => $request->get('reg_number'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
        ]);

        return redirect()->back()->withSuccess('Vehicle occupant created successfully');
    }

    public function qr()
    {

    }
}
