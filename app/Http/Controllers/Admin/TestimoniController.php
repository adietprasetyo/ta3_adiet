<?php

namespace App\Http\Controllers\Admin;

use App\Testimoni;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $testimoni = Testimoni::all();
        return view('admin.contentAdmin.testimoni.index', compact('testimoni'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validates = $request->validate([
            'nm_tester' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'testimoni' => 'required'
        ]);
        $validate = $request->all();
        Testimoni::create($validates);
        return redirect()->route('testimoni.index')->with('pesan',"Testimoni berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Testimoni  $testimoni
     * @return \Illuminate\Http\Response
     */
    public function show(Testimoni $testimoni)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Testimoni  $testimoni
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimoni $testimoni)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Testimoni  $testimoni
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimoni $testimoni)
    {
        //

        $validatedData = $request->validate([
            'nm_tester' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'testimoni' => 'required'
        ]);

        $testimoni->update($validatedData);
        return redirect('/admin/testimoni/')->with('pesan', "Testimoni $testimoni->nm_tester Berhasil di ubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Testimoni  $testimoni
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimoni $testimoni)
    {
        //
        $testimoni->delete();
        return redirect()->route('testimoni.index')->with('pesan', "Testimoni berhasil dihapus");
    }
}
