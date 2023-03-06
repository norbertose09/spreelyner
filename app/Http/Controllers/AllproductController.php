<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\Category;
use App\Models\Allproduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AllproductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('pages.admin.allproduct.create', [
        'categories' => Category::all()
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $FormField = $request->validate([
            'category' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'size' => 'required',
            'color' => 'required',
            'quantity' => 'required'
        ]);
        if($request->hasFile('image')){
            $FormField['image'] = $request->file('image')->store('image', 'public');
         }
         $store = Allproduct::create($FormField);
         if($store){
            return redirect('/admin/allproducts/manage');
         }
    }

    public function manage(){
        $noofprod = Allproduct::count();

        return view('pages.admin.allproduct.manage', [
            'allproducts' => Allproduct::all()
        ],
    compact('noofprod')
);
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
    public function edit(Allproduct $id)
    {
        return view('pages.admin.allproduct.edit',[
            'allproductedit' => $id
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Allproduct $id)
    {
        $id->delete();
        return redirect('/admin/allproducts/manage');
    }

    public function categoryspec(Category $id){
        $prod = DB::table('allproducts')
        ->select('*')
        ->where('category', $id->name)
        ->get();

       return view('pages.category.main', [
        'categoryspecs' => $id,
        'prods' => $prod
       ]);

    }


    public function showDetails(Allproduct $id){
        return view('pages.details', [
            'products' => $id
        ]);
    }


}

