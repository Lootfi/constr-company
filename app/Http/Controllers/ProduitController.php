<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $produits = Product::all()->toArray();
        return view('gestionnaire.produits-list')->with('produits', $produits);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gestionnaire.add-produit')->with('success', null);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->all();
        Validator::make($data, [
            'designation' => ['required', 'string', 'unique:products', 'max:100'],
            'prix_unitaire' => ['required', 'numeric', 'min:0.1'],
            'unite_mesure' => ['required', 'string'],
            'quantité' => ['required', 'integer', 'min:0']
        ])->validate();
        Product::create([
            'designation' => $data['designation'],
            'prix_unitaire' => $data['prix_unitaire'],
            'unite_mesure' => $data['unite_mesure'],
            'quantité' => $data['quantité']
        ]);
        return redirect()->route('produits.create')->with('success', true);
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
    public function edit($code)
    {
        $produit = Product::where('code', $code)->get()->toArray()[0];
        return view('gestionnaire.edit-produit')->with('produit', $produit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $code
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $code)
    {
        $prod = Product::find($code);
        $prod->designation = $request['designation'];
        $prod->prix_unitaire = $request['prix_unitaire'];
        $prod->unite_mesure = $request['unite_mesure'];
        $prod->quantité = $request['quantité'];
        $prod->save();
        return redirect('/produits');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($code)
    {
        Product::find($code)->delete();

        return redirect('/produits');
    }
}
