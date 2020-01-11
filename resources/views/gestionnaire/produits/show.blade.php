@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Product {{$produit->code}}</div>
        <div class="card-body">

            <img width="300" src="/storage/product_images/{{$produit->image}}" alt="{{$produit->imageSize}}" />
        </div>
    </div>
</div>
<script>
@endsection