<?php

namespace App\Http\Controllers;

use App\Home;
use App\About;
use App\Produk;
use App\Contact;
use App\Category;
use App\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Repo\ContactRepository;

class PagesController extends Controller
{
    //
    public function home(){
        $home = Home::orderByDesc('id')->paginate(1);
        // dd($home);
        $about = About::orderByDesc('id')->paginate(1);
        $produk = Produk::all();
        $category = Category::all();
        $testimoni = Testimoni::all();
        $contact = Contact::all();
        $foto = Produk::all();
        return view('masterUser', compact('home', 'about','produk','category', 'contact', 'testimoni','foto'));
    }
    public function category($id){
        $home = Home::orderByDesc('id')->paginate(1);
        // dd($home);
        $about = About::orderByDesc('id')->paginate(1);
        $produk = Produk::all();
        $category = Category::all();
        $testimoni = Testimoni::all();
        $contact = Contact::all();
        $foto = Produk::where('category_id', $id)->paginate(3);
        return view('masterUser', compact('home', 'about','produk','category', 'contact', 'testimoni','foto', 'id'));
    }

    protected $repo;

    public function  __construct(){
        $this->repo =  new ContactRepository;
    }

    public function create()
    {
        //
        return view('masterUser');
    }

    public function store(Request $request)
    {
        //
        $this->repo->storeContact($request);
        return redirect('/');
    }
}
