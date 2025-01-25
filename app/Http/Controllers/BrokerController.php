<?php

namespace App\Http\Controllers;

use App\Models\broker;
use Illuminate\Http\Request;

class BrokerController extends Controller
{
    //
    public function index()
    {
        $brokers = broker::all();

        return view('brokers.allbroker',compact('brokers'));
    }
    
    public function show($id)
    {
        $brokers = broker::find($id);

        return view('brokers.allbroker',compact('brokers'));
    }

    public function destroy($id)
    {
        // Find the resource by ID
        $broker = Broker::findOrFail($id);

        // Delete the resource
        $broker->delete();

        // Redirect or return a response
        return redirect()->route('broker.all')->with('success', 'Broker deleted successfully.');
    }

}
