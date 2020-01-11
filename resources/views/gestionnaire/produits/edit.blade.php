@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Edit Product</div>
        <div class="card-body">
            <form action="{{route('produits.update',$produit['code'])}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label for="designation" class="col-md-4 col-form-label text-md-right">{{ __('designation') }}</label>

                <div class="col-md-6">
                    <input id="designation" type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" value="{{ $produit['designation'] }}" required autocomplete="designation" autofocus>

                    @error('designation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            
            <div class="form-group row">
                    <label for="prix_unitaire" class="col-md-4 col-form-label text-md-right">{{ __('prix_unitaire') }}</label>

                    <div class="col-md-6">
                        <input id="prix_unitaire" type="number" class="form-control @error('prix_unitaire') is-invalid @enderror" name="prix_unitaire" value="{{ $produit['prix_unitaire'] }}" required autocomplete="prix_unitaire" autofocus>

                        @error('prix_unitaire')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
            </div>

            <div class="form-group row">
                    <label for="unite_mesure" class="col-md-4 col-form-label text-md-right">{{ __('unite de mesure') }}</label>

                    <div class="col-md-6">
                        <select class="custom-select" name="unite_mesure" id="unite_mesure">
                            <option value="mètre" {{$produit['unite_mesure'] == 'mètre' ? 'selected' : '' }}>Mètre</option>
                            <option value="kilogram" {{$produit['unite_mesure'] == 'kilogram' ? 'selected' : '' }}>Kg</option>
                            <option value="litre" {{$produit['unite_mesure'] == 'litre' ? 'selected' : '' }}>Litre</option>
                        </select>
                    </div>
            </div>


            <div class="form-group row">
                    <label for="quantité" class="col-md-4 col-form-label text-md-right">{{ __('quantité') }}</label>
    
                    <div class="col-md-6">
                        <input id="quantité" type="number" class="form-control @error('quantité') is-invalid @enderror" name="quantité" value="{{ $produit['quantité'] }}" required autocomplete="quantité">
    
                        @error('quantité')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
            </div>


            <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Modifier Produit') }}
                        </button>
                    </div>
            </div>



            </form>
        </div>
    </div>
</div>
<script>
@endsection