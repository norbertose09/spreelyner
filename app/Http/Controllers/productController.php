<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Allproduct;
use Illuminate\Http\Request;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.index', [
            'categories2' => Category::all(),
            'products' => Allproduct::latest()->filter(request(['search']))->get()

        ]);
    }

    //create category
    public function category(){
         return view('pages.admin.category.category');
    }

    public function manage(){
        $noofcat = category::count();
        return view('pages.admin.category.manage', [
            'categories' => Category::all()
        ],
        compact('noofcat')
    );
    }

public function storeCategory(Request $request){
        $FormField = $request->validate([
            'name' => 'required'

        ]);
        if($request->hasFile('image')){
            $FormField['image'] = $request->file('image')->store('image', 'public');
         }
        $create = Category::create($FormField);
        //  return redirect('/admin/manage');
    if($create){
        return redirect('/admin/category');

    }

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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $id){
        return view('pages.admin.category.edit', [
            'categoryedit' => $id
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $id)
    {
        $FormField2 = $request->validate([
            'name' => 'required'
        ]);
        if($request->hasFile('image')){
            $FormField['image'] = $request->file('image')->store('image', 'public');
         }
         $id->update($FormField2);
         return redirect('/admin/category');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $id)
    {
        $id->delete();
        return redirect('/admin/category');
    }
}
