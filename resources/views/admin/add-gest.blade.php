@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">{{ __('Register') }}</div>
            <div class="card-body">
            <form method="POST" action="{{ route('add-gest') }}">
                @csrf

                <div class="form-group row">
                    <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('nom') }}</label>

                    <div class="col-md-6">
                        <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('name') }}" required autocomplete="nom" autofocus>

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
                        <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus>

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
                        <input id="ville" type="text" class="form-control @error('name') is-invalid @enderror" name="ville" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                        <input id="num_tel" type="text" class="form-control @error('num_tel') is-invalid @enderror" name="num_tel" value="{{ old('num_tel') }}" required autocomplete="num_tel" autofocus>

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
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="user-role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                    <div class="col-md-6">
                        <select class="custom-select" name="role" id="role">
                            <option value="Administrateur">Administrateur</option>
                            <option value="Client">Client</option>
                            <option value="Fournisseur">Fournisseur</option>
                            <option value="Gestionnaire">Gestionnaire</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection