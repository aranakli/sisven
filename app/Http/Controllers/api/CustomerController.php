<?php

namespace App\Http\Controllers\api;

use App\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        return json_encode(['customers' => $customers]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $customer = new Customer();
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
        return json_encode(['customers' => $customers]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = Customer::find($id);
        return json_encode(['customer' => $customer]);
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
        return json_encode(['customers' => $customers]);
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
            return json_encode(['customers' => $customers]);
    }
}
