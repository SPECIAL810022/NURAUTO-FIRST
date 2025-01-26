<?php

namespace App\Http\Controllers;

use App\Models\Broker;
use Illuminate\Http\Request;

class BrokerController extends Controller
{
    // Display all brokers
    public function index()
    {
        $brokers = Broker::all();
        return view('brokers.allbroker', compact('brokers'));
    }

    // Show details of a specific broker
    public function show($id)
    {
        $broker = Broker::find($id);
    
        if (!$broker) {
            return response()->json(['error' => 'Broker not found'], 404);
        }
    
        return response()->json([
            'name' => $broker->broker_name,
            'mobile' => $broker->broker_phone,
            'gram_panchayat' => $broker->gram_panchayat,
            'additional_address' => $broker->additional_address,
        ]);
    }

    // Display create broker form (if applicable)
    public function create()
    {
        return view('brokers.create');
    }

    // Store a new broker
    public function store(Request $request)
    {
        $request->validate([
            'broker_name' => 'required|string|max:255',
            'broker_phone' => 'required|string|max:15',
            'gram_panchayat' => 'nullable|string|max:255',
            'additional_address' => 'nullable|string',
        ]);

        Broker::create([
            'broker_name' => $request->broker_name,
            'broker_phone' => $request->broker_phone,
            'gram_panchayat' => $request->gram_panchayat,
            'additional_address' => $request->additional_address,
        ]);

        return redirect()->route('broker.all')->with('success', 'Broker added successfully.');
    }

    // Edit broker details
    public function edit($id)
    {
        $broker = Broker::findOrFail($id);
        return view('brokers.edit', compact('broker'));
    }

    // Update broker details
    public function update(Request $request, $id)
    {
        $request->validate([
            'broker_name' => 'required|string|max:255',
            'broker_phone' => 'required|string|max:15',
            'gram_panchayat' => 'nullable|string|max:255',
            'additional_address' => 'nullable|string',
        ]);

        $broker = Broker::findOrFail($id);
        $broker->update([
            'broker_name' => $request->broker_name,
            'broker_phone' => $request->broker_phone,
            'gram_panchayat' => $request->gram_panchayat,
            'additional_address' => $request->additional_address,
        ]);

        return redirect()->route('broker.all')->with('success', 'Broker updated successfully.');
    }

    // Delete a broker
    public function destroy($id)
    {
        $broker = Broker::findOrFail($id);
        $broker->delete();

        return redirect()->route('broker.all')->with('success', 'Broker deleted successfully.');
    }
}
