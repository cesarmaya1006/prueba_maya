<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class intranetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        $clientes = Cliente::get();
        return view('intranet.dashboard',compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function ganador(Request $request)
    {
        $clientes = Cliente::get();
        $ultimo = $clientes->last();
        $idGanador = rand(1,$ultimo->id);

        $cambio['ganador'] = 1;
        Cliente::findOrFail($idGanador)->update($cambio);
        return redirect('dashboard')->with('mensaje', 'Ganador Elegido');

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
