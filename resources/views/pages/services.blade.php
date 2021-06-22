@extends('layouts.app')
@section('title')
Services
@endsection

@section('contenu')
    <h3>Liste des produits</h3>

    @if(Session::has('updateStatus'))       
        <div class="alert alert-success">   
        
            {{Session::get('updateStatus')}} 
            {{--Session::put('updateStatus', null)--}} 
        </div>  
    @endif

    @if(Session::has('deleteStatus'))       
        <div class="alert alert-success">   
        
            {{Session::get('deleteStatus')}} 
            {{--Session::put('DeleteStatus', null)--}} 
        </div>  
    @endif
     
   

        @foreach ($produits as $produit)
        
              <div class="well">
                <h4><a href="/show/{{$produit->id}}">{{$produit->product_name}}</a></h4>
                <p class="card-text">{{$produit->product_description}}</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href="/show/{{$produit->id}}"  class="btn btn-sm btn-outline-primary">Détails</a>
                    <a href="/editer_produit/{{$produit->id}}" class="btn btn-sm btn-outline-success">Éditer</a>
                    <a href="/supprimer_produit/{{$produit->id}}"  class="btn btn-sm btn-outline-danger">Supprimer</a>
                  </div>
                  <div class="text-muted">{{$produit->product_price}}</div>
                </div>
              </div><br><hr/>
          
        
            
        @endforeach
        
   <br/>

            {{$produits->links()}}
    

@endsection
