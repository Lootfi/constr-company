@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Add Product</div>
        <div class="card-body">
            <form method="post" action="{{ route('produits.store')}}">
            @csrf

            <div class="form-group row">
                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                <div class="col-md-6">
                    <div class="custom-file">
                        <input id="image" type="file" accept="image/png, image/jpeg" aria-describedby="inputGroupFileAddon01" class="custom-file-input form-control @error('image') is-invalid @enderror" name="image" autocomplete="image" >
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                      </div>
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>


            <div class="form-group row">
                <label for="designation" class="col-md-4 col-form-label text-md-right">{{ __('designation') }}</label>

                <div class="col-md-6">
                    <input id="designation" type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" value="{{ old('designation') }}" required autocomplete="designation" autofocus>

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
                        <input id="prix_unitaire" type="number" class="form-control @error('prix_unitaire') is-invalid @enderror" name="prix_unitaire" value="{{ old('prix_unitaire') }}" required autocomplete="prix_unitaire">

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
                            <option value="mètre">Mètre</option>
                            <option value="kilogram">Kg</option>
                            <option value="litre">Litre</option>
                        </select>
                    </div>
            </div>

            <div class="form-group row">
                    <label for="quantité" class="col-md-4 col-form-label text-md-right">{{ __('quantité') }}</label>
    
                    <div class="col-md-6">
                        <input id="quantité" type="number" min="0" class="form-control @error('quantité') is-invalid @enderror" name="quantité" value="{{ old('quantité') }}" autocomplete="quantité">
    
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
                            {{ __('Ajouter Produit') }}
                        </button>
                    </div>
            </div>



            </form>
        </div>
    </div>
</div>
@endsection