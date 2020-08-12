<?php

namespace App\Http\Controllers\Admin;

use App\Home;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $home = Home::all();
        return view('admin.contentAdmin.homes.index', compact('home'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validates = $request->validate([
            'title' => 'required',
            'img_title' => 'file|image',
        ]);
        $validate = $request->all();
        // dd($validate);
        $validates['img_title'] = $request->file('img_title')->store('asset/img_jumbo', 'public');
        Home::create($validates);
        return redirect()->route('view-home.index')->with('pesan',"Data berhasil ditambahkan");
    }

    public function update(Request $request, $home)
    {
        // dd($request->all());
        $validates = $request->validate([
            'title' => 'required',
            'img_title' => 'file|image',
        ]);

        $coba = Home::findOrFail($home);
        // dd($coba);
        $homeId = $coba->find($coba->id);
        // dd($homeId);
        $data = $request->all();
        if ($request->img_title) {
            Storage::delete('public/'.$homeId->img_title);
            $data['img_title'] = $request->file('img_title')->store('asset/img_jumbo','public');
        }

        $homeId->update($data);
        // dd($home);
        return redirect()->route('view-home.index');
    }

    public function destroy($home)
    {

        $homeId = Home::where('id',$home)->first();
        // dd($homeId);
        Storage::delete('public/'. $homeId->img_title);
        $homeId->delete();
        return redirect()->route('view-home.index')->with('pesan', "Data berhasil dihapus");
    }
}
