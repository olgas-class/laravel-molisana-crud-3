<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pasta;
use Illuminate\Http\Request;

class PastaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listaPasta = Pasta::all();
        return view('pastas.index', compact('listaPasta'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pastas.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $pasta = new Pasta();
        $pasta->fill($data);
        $pasta->save();

        return redirect()->route("pastas.show", ["pasta" => $pasta->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pasta $pasta)
    {
        //
        return view('pastas.show', compact('pasta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pasta $pasta)
    {
        return view('pastas.edit' , compact('pasta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pasta $pasta)
    {
        $data = $request->all();
        $pasta->update($data);
        //reindirizza all'index
        return redirect()->route('pastas.index');
        // return redirect()->route('pastas.show', ["pasta" => $pasta->id] );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pasta $pasta)
    {
        $pasta->delete();
        return redirect()->route('pastas.index');
    }
}
