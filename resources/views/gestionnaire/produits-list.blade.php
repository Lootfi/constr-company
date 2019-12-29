@extends('layouts.layout')

@section('content')
    <div class="container">
        <table id="dataTable2" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Designation</th>
                    <th>Prix Unitaire</th>
                    <th>Quantité</th>
                    <th>Modifier</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produits as $produit)
                <tr>
                    <td>{{$produit['designation']}}</td>
                    <td>{{$produit['prix_unitaire']}}</td>
                    <td>
                        @if ($produit['quantité'])
                            {{$produit['quantité'] . ' ' . $produit['unite_mesure']}}
                        @else
                            <i class="fas fa-times"></i>
                        @endif
                    </td>
                    <td>

                        <a href="#"><button class="btn btn-outline-primary btn-sm">Page</button></a>
                            <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="{{'#modal'.$produit['code']}}">
                                    Modifier
                            </button>

                            <form style="display:inline" method="POST" action="{{ route('produits.destroy',$produit['code']) }}"> @method('DELETE') @csrf <button type="submit" class="btn btn-outline-danger btn-sm">Supprimer</button></form>
                    </td>
                </tr>






                
    <div class="modal" id="{{'modal'.$produit['code']}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Modifier Produit</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  
                        <form action="{{route('produits.update',$produit['code'])}}" method="post">
                                @csrf
                                @method('PUT')


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
                                            <input id="prix_unitaire" type="number" min="1" class="form-control @error('prix_unitaire') is-invalid @enderror" name="prix_unitaire" value="{{ $produit['prix_unitaire'] }}" required autocomplete="prix_unitaire" autofocus>
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
                                            <input id="quantité" type="number" min="0" class="form-control @error('quantité') is-invalid @enderror" name="quantité" value="{{ $produit['quantité'] }}" required autocomplete="quantité">
                        
                                            @error('quantité')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                </div>  
                                
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Modifier</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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

@section('page-script')
    <script>    
        $('.modal').on('shown.bs.modal', function () {
            $('.modify').trigger('focus')
        })
    </script>
@endsection