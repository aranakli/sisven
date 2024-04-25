<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = DB::table('customers')
            ->select('customers.*')
            ->get();
        return view('customer.index', ['customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $customer = new Customer();
        // $customer->id = $request->id;
        // El código de customer es auto incremental
        $customer->document_number = $request->document;
        $customer->first_name = $request->firstname;
        $customer->last_name = $request->lastname;
        $customer->address = $request->address;
        $customer->birthdate = $request->birthdate;
        $customer->phone_number = $request->phone;
        $customer->email = $request->email;
        $customer->save();

        $customers = DB::table('customers')
            ->select('customers.*')
            ->get();
        return view('customer.index', ['customers' => $customers]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('customer.edit', ['customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $customer = Customer::find($id);
        $customer->document_number = $request->document;
        $customer->first_name = $request->firstname;
        $customer->last_name = $request->lastname;
        $customer->address = $request->address;
        $customer->birthdate = $request->birthdate;
        $customer->phone_number = $request->phone;
        $customer->email = $request->email;
        $customer->save();
        $customers = DB::table('customers')
            ->select('customers.*')
            ->get();
        return view('customer.index', ['customers' => $customers]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
            $customer = Customer::find($id);
            $customer->delete();

            $customers = DB::table('customers')
                ->select('customers.*')
                ->get();
            return view('customer.index', ['customers' => $customers]);
        
    }
}
