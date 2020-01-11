@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                {{$client->id . '/ '. $client->nom .' '. $client->prenom}}
            </div>
            <div class="card-body">
            </div>
        </div>
            
    </div>
@endsection

@section('page-script')
    
@endsection