@extends('layouts.layout')

@section('content')
    <div class="container">
        <table id="dataTable1" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                <tr>
                    <td>{{$client['nom']}}</td>
                    <td>{{$client['prenom']}}</td>
                    <td>{{$client['email']}}</td>
                    <td>
                        <a href="#"><button class="btn btn-outline-primary btn-sm">Profile</button></a>
                        <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="{{'#modal'.$client['id']}}">Modifier</button>
                        <form style="display:inline" method="POST" action="{{ route('clients.destroy',$client['id']) }}"> @method('DELETE') @csrf <button type="submit" class="btn btn-outline-danger btn-sm">Supprimer</button></form>
                    </td>
                </tr>

                <div class="modal" id="{{'modal'.$client['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Modifier Client</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                        
                            <form method="POST" action="{{ route('clients.update',$client['id']) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('nom') }}</label>
            
                                    <div class="col-md-6">
                                        <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ $client['nom'] }}" required autocomplete="nom" autofocus>
            
                                        @error('nom')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
            
            
            
            
            
                                <div class="form-group row">
                                    <label for="prenom" class="col-md-4 col-form-label text-md-right">{{ __('prenom') }}</label>
            
                                    <div class="col-md-6">
                                        <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ $client['prenom'] }}" required autocomplete="prenom" autofocus>
            
                                        @error('prenom')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
            
                                <div class="form-group row">
                                    <label for="ville" class="col-md-4 col-form-label text-md-right">{{ __('ville') }}</label>
            
                                    <div class="col-md-6">
                                        <input id="ville" type="text" class="form-control @error('name') is-invalid @enderror" name="ville" value="{{ $client['ville'] }}" required autocomplete="name" autofocus>
            
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
            
            
                                <div class="form-group row">
                                    <label for="num_tel" class="col-md-4 col-form-label text-md-right">{{ __('num_tel') }}</label>
            
                                    <div class="col-md-6">
                                        <input id="num_tel" type="text" class="form-control @error('num_tel') is-invalid @enderror" name="num_tel" value="{{ $client['num_tel'] }}" required autocomplete="num_tel" autofocus>
            
                                        @error('num_tel')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
            

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
            
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $client['email'] }}" required autocomplete="email">
            
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
            
                                <div class="form-group row" style="display:none;">
                                    <label for="user-role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
            
                                    <div class="col-md-6">
                                        <select class="custom-select" name="role" id="role">
                                            <option value="Client">Client</option>
                                            <option value="Administrateur">Administrateur</option>
                                            <option value="Fournisseur">Fournisseur</option>
                                            <option value="Gestionnaire">Gestionnaire</option>
                                        </select>
                                    </div>
                                </div>
            
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Modifier Client') }}
                                        </button>
                                    </div>
                                </div>
                        
                            </form>
                        
                        </div>                   
                      </div>
                    </div>


                @endforeach
            </tbody>
        </table>
    </div>
@endsection