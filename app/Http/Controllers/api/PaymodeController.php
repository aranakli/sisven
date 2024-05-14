<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
    public function show(string $id)
    {
        $paymode = Paymode::find($id);
        if (is_null($paymode)){
            return abort(404);
        }
        return json_encode(['paymode' => $paymode]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $paymode = Paymode::find($id);
        if (is_null($paymode)){
            return abort(404);
        }
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
    public function destroy(string $id)
    {
        $paymode = Paymode::find($id);
        if (is_null($paymode)){
            return abort(404);
        }
            $paymode->delete();

            $pay_mode = DB::table('pay_mode')
                ->select('pay_mode.*')
                ->get();
            return json_encode(['pay_mode' => $pay_mode]);
    }
}
