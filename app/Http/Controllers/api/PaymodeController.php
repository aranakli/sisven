<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Paymode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pay_modes = DB::table('pay_mode')
            ->select('pay_mode.*')
            ->get();
        return json_encode(['pay_modes' => $pay_modes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pay_mode = new Paymode();
        $pay_mode->name = $request->name;
        $pay_mode->observation = $request->observation;
        $pay_mode->save();

        $pay_mode = DB::table('pay_mode')
            ->select('pay_mode.*')
            ->get();
        return json_encode(['pay_mode' => $pay_mode]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pay_mode = Paymode::find($id);
        return json_encode(['pay_mode' => $pay_mode]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pay_mode = Paymode::find($id);
        $pay_mode->name = $request->name;
        $pay_mode->observation = $request->observation;
        $pay_mode->save();
        $pay_mode = DB::table('pay_mode')
            ->select('pay_mode.*')
            ->get();
        return json_encode(['pay_mode' => $pay_mode]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pay_mode = Paymode::find($id);
            $pay_mode->delete();

            $pay_modes = DB::table('pay_mode')
                ->select('pay_mode.*')
                ->get();
            return json_encode(['pay_modes' => $pay_modes, 'success' => true]);
    }
}
