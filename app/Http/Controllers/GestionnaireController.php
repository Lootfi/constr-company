<?php

namespace App\Http\Controllers;

use App\Events\ProductAdded;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class GestionnaireController extends Controller
{
    // protected $redirectTo = '/';

    // public function indexClient()
    // {
    //     return view('gestionnaire.add-client')->with('success', null);
    // }

    // public function indexListClients($id = null, $edit = null)
    // {
    //     if (!$id) {
    //         $clients = User::all(['id', 'nom', 'prenom', 'email', 'role'])->where('role', 'Client')->toArray();
    //         return view('gestionnaire.clients-list')->with('clients', $clients);
    //     } else {
    //         return $id;
    //     }
    // }

    public function indexFournisseur()
    {
        return view('gestionnaire.add-fournisseur')->with('success', null);
    }


    // public function addClient(Request $request)
    // {
    //     $this->validator($request->all())->validate();
    //     event(new Registered($user = $this->createUser($request->all())));

    //     return redirect()->route('add-client')->with('success', true);
    // }

    public function addFournisseur(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->createUser($request->all())));

        return redirect()->route('add-fournisseur')->with('success', true);
    }

    // public function addProduit(Request $request)
    // {

    //     // $this->createProduct($request->all());
    //     Validator::make($request->all(), [
    //         'designation' => ['required', 'string', 'unique:products', 'max:100'],
    //         'prix_unitaire' => ['required', 'numeric',],
    //         'unite_mesure' => ['required', 'string'],
    //         'disponible' => ['required', 'bool']
    //     ])->validate();
    //     $this->createProduct($request->all());
    //     return redirect()->route('add-produit')->with('success', true);
    // }




    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'nom' => ['required', 'string', 'max:255'],
    //         'prenom' => ['required', 'string', 'max:255'],
    //         'ville' => ['required', 'string', 'max:255'],
    //         'num_tel' => ['required', 'string', 'unique:users', 'min:9', 'max:10', 'starts_with:05,06,07'],
    //         'role' => ['required', 'string'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed']
    //     ]);
    // }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    // protected function createUser(array $data)
    // {
    //     return User::create([
    //         'nom' => $data['nom'],
    //         'prenom' => $data['prenom'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //         'ville' => $data['ville'],
    //         'num_tel' => $data['num_tel'],
    //         'role' => $data['role']
    //     ]);
    // }

    // protected function createProduct(array $data)
    // {
    //     return Product::create([
    //         'designation' => $data['designation'],
    //         'prix_unitaire' => $data['prix_unitaire'],
    //         'unite_mesure' => $data['unite_mesure'],
    //         'disponible' => $data['disponible'],
    //     ]);
    // }
}
