<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\ImageUploadService;

class ProduitController extends Controller
{
    protected $imageUploader;

    public function __construct(ImageUploadService $imageUploader)
    {
        $this->imageUploader = $imageUploader;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $produits = Product::all()->toArray();
        return view('gestionnaire.produits.list')->with('produits', $produits);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gestionnaire.produits.add')->with('success', null);
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
            'quantité' => ['required', 'integer', 'min:0'],
            'image' => ['image', 'nullable', 'max:1999']
        ])->validate();
        $img = $this->imageUploader->store($request, 'product_images')->all();
        Product::create([
            'designation' => $data['designation'],
            'prix_unitaire' => $data['prix_unitaire'],
            'unite_mesure' => $data['unite_mesure'],
            'quantité' => $data['quantité'],
            'image' => $img['imgName'],
            'imageSize' => $img['imgSize']
        ]);
        return redirect()->route('produits.index')->with('success', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($code)
    {
        $produit = Product::find($code);
        return view('gestionnaire.produits.show')->with('produit', $produit);
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
        return view('gestionnaire.produit.edit')->with('produit', $produit);
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

        $img = $this->imageUploader->store($request, 'product_images')->all();
        $prod->image = $img['imgName'];
        $prod->imageSize = $img['imgSize'];

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
