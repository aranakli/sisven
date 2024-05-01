<?php

namespace App\Http\Controllers;

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
        return view('paymode.index', ['pay_mode' => $pay_mode]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('paymode.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $paymode = new Paymode();
        // $paymode->id = $request->id;
        // El código de paymode es auto incremental
        $paymode->name = $request->nombre;
        $paymode->observation = $request->observacion;
        $paymode->save();

        $pay_mode = DB::table('pay_mode')
            ->select('pay_mode.*')
            ->get();
        return view('paymode.index', ['pay_mode' => $pay_mode]);
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
        $paymode = Paymode::find($id);
        return view('paymode.edit', ['paymode' => $paymode]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $paymode = Paymode::find($id);
        $paymode->name = $request->nombre;
        $paymode->observation = $request->observacion;
        $paymode->save();
        $pay_mode = DB::table('pay_mode')
            ->select('pay_mode.*')
            ->get();
        return view('paymode.index', ['pay_mode' => $pay_mode]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
            $paymode = Paymode::find($id);
            $paymode->delete();

            $pay_mode = DB::table('pay_mode')
                ->select('pay_mode.*')
                ->get();
            return view('paymode.index', ['pay_mode' => $pay_mode]);
        
    }
}
