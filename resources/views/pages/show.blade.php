@extends('layouts.app')
@section('title')
Détails du produit
@endsection

@section('contenu')
    <h1>Details du produit</h1>
    <hr/>
    <p class="card-text">{{$produit->product_name}}</p>
    <p class="card-text">{{$produit->product_description}}</p>
    <p class="card-text">{{$produit->product_price}} $</p>
    <hr/>
    <h4>{{$produit->created_at}}</h4>

       

@endsection
