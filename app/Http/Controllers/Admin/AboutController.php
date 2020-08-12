<?php

namespace App\Http\Controllers\Admin;

use App\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $about = About::all();
        return view('admin.contentAdmin.abouts.index', compact('about'));
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
        // dd($request->all());
        $validates = $request->validate([
            'deskripsi_ab' => '',
            'foto_ab' => 'file|image',
        ]);
        $validate = $request->all();
        // dd($validate);
        $validates['foto_ab'] = $request->file('foto_ab')->store('asset/about', 'public');
        About::create($validates);
        return redirect()->route('about.index')->with('pesan',"Data berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $about)
    {
        //
        $validates = $request->validate([
            'deskripsi_ab' => '',
            'foto_ab' => 'file|image',
        ]);

        $coba = About::findOrFail($about);
        // dd($coba);
        $aboutId = $coba->find($coba->id);
        // dd($homeId);
        $data = $request->all();
        if ($request->foto_ab) {
            Storage::delete('public/'.$aboutId->foto_ab);
            $data['foto_ab'] = $request->file('foto_ab')->store('asset/about','public');
        }

        $aboutId->update($data);
        // dd($home);
        return redirect()->route('about.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        //
        // $aboutId = About::where('id',$about)->first();
        // dd($homeId);
        Storage::delete('public/'. $about->foto_ab);
        $about->delete();
        return redirect()->route('about.index')->with('pesan', "Data berhasil dihapus");
    }
}
