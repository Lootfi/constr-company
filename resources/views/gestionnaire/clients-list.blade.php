@extends('layouts.layout')

@section('content')
    <div class="container">
        <table id="dataTable1" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Modifier</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                <tr>
                    <td>{{$client['nom']}}</td>
                    <td>{{$client['prenom']}}</td>
                    <td>{{$client['email']}}</td>
                    <td>
                        <a href="clients/{{$client['id']}}/edit"><button type="button" class="btn btn-primary">Modifier</button></a>
                        <form style="display:inline" method="POST" action="{{ route('clients.destroy',$client['id']) }}"> @method('DELETE') @csrf <button type="submit" class="btn btn-danger">Supprimer</button></form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection