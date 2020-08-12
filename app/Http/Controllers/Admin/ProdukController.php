<?php

namespace App\Http\Controllers\Admin;

use App\Home;
use App\About;
use App\Contact;
use App\Testimoni;

use App\Produk;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProdukRequest;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    // Public Function Dashboard //
    public function dashboard(){
        return view ('admin.contentAdmin.dashboard', [
            'product'=>Produk::count(),
            'contact'=>Contact::count(),
            'testimoni'=>Testimoni::count(),
            'category'=>Category::count()
        ]);
    }
    // End: Public Function Dashboard //

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $produks = Produk::orderBy('created_at', 'ASC')->get();
        return view('admin.contentAdmin.products.index',['produk' => $produks, 'category' => Category::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $kategoris = Category::all();
        // return view('admin.contentAdmin.products.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdukRequest $request)
    {
        $data = $request->all();
        $data['foto'] = $request->file('foto')->store('asset/produk','public');
        Produk::create($data);
        return redirect()->route('produk.index')->with('pesan',"Data berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
        // $produk = Produk::find($produk);
        // return view( compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        //
        // $kategoris = Category::all();
        // $produks = Produk::find($produk);
         //tidak perlu menembak id karena sudah sepaket dengan yang telah dilempar pada route produk.edit
        // return view('admin.contentAdmin.products.index', compact('produks', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        //
        $validatedData = $request->validate([
            'nama'=> 'required|min:3|max:100',
            'category_id'=>'required',
            'harga'=> 'required',
            'deskripsi'=> '',
            'foto'=> 'required' // 'max:2048'
        ]);

        $produkId = $produk->find($produk->id);
        $data = $request->all();
        if ($request->foto) {
            Storage::delete('public/'.$produkId->foto);
            $data['foto'] = $request->file('foto')->store('asset/produk','public');
        }

        $produkId->update($data);
        $produkId->save();
        return redirect()->route('produk.index')->with('pesan',"Update data {$validatedData['nama']} Berhasil");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        //
        Storage::delete('public/'. $produk->foto);
        $produk->delete();
        return redirect()->route('produk.index')->with('pesan', "Product $produk->nama berhasil dihapus");
    }
}
