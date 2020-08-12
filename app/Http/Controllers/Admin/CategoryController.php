<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.contentAdmin.categories.index', ['category'=>Category::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.contentAdmin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $ctrequest)
    {

        $validatedData = $ctrequest->validate([
            'nm_category'=>'required',
            'desc'=> ''
        ]);
        Category::create($validatedData);
        return redirect('/admin/category')->with('pesan', "Category $ctrequest->nm_category Berhasil di tambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
        // Ini model binding
        // return view('admin.contentAdmin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        return view('admin.contentAdmin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $ctrequest, Category $category)
    {
        //
        $validatedData = $ctrequest->validate([
            'nm_category'=>'required',
            'desc'=> ''
        ]);

        $category->update($validatedData);
        return redirect('/admin/category/')->with('pesan', "Category $category->nm_category Berhasil di ubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        $category->delete();
        return redirect('/admin/category')->with('pesan', "Category $category->nm_category berhasil dihapus");
    }
}
