<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class GestionnaireController extends Controller
{
    // protected $redirectTo = '/';

    public function indexClient()
    {
        return view('gestionnaire.add-client')->with('success', null);
    }

    public function indexProduit()
    {
        return view('gestionnaire.add-produit');
    }

    public function addClient(Request $request)
    {
        // dd($request->all());
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));

        return redirect()->route('add-client')->with('success', true);
    }

    public function addProduit()
    { }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'ville' => ['required', 'string', 'max:255'],
            'num_tel' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'ville' => $data['ville'],
            'num_tel' => $data['num_tel'],
            'role' => $data['role']
        ]);
    }
}
