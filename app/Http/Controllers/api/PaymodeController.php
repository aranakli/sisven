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
        $pay_mode = DB::table('pay_mode')
            ->select('pay_mode.*')
            ->get();
        return json_encode(['pay_mode' => $pay_mode]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $paymode = new Paymode();
        $paymode->name = $request->nombre;
        $paymode->observation = $request->observacion;
        $paymode->save();

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
        $paymode = Paymode::find($id);
        return json_encode(['paymode' => $paymode]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $paymode = Paymode::find($id);
        $paymode->name = $request->nombre;
        $paymode->observation = $request->observacion;
        $paymode->save();
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
        $paymode = Paymode::find($id);
            $paymode->delete();

            $pay_mode = DB::table('pay_mode')
                ->select('pay_mode.*')
                ->get();
            return json_encode(['pay_mode' => $pay_mode, 'success' => true]);
    }
}
