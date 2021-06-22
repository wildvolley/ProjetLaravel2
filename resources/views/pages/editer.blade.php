@extends('layouts.app')

@section('title')
    Editer
@endsection

@section('contenu')

    <h4> Mise à jour du produit</h4>
    <hr/>

    @if(Session::has('succes'))
        <div class="alert alert-success">   
            
            {{Session::get('succes')}} 
            {{Session::put('succes', null)}} 
        </div>  
    @endif

{{--<form action="{{url('/ajout_produit')}}" method="post" class="form-horizontal">
   
         {{csrf_field()}}

        <div class="form-group">
            <label for="product_name" >Produit</label>
            <input type="text" name="product_name" class="form-control" id="" required>
        </div>
        <div class="form-group">
            <label for="product_price" >Prix</label>
            <input type="number" name="product_price" class="form-control" id="" required>
        </div>
        <div class="form-group">
            <label for="product_description" >Description</label>
            <textarea name="product_description" class="form-control" id="" required></textarea>
        </div><br/>

        <input type="submit" value="Ajouter le produit" class="btn btn-primary">
     

    </form> --}} 

    
        {!!Form::open(['action'=>'App\Http\Controllers\PagesController@modifierProduit', 'method'=>'POST', 'enctype' => 'multipart/form-data', 'class'=>'form-horizontal'])!!}
             {{csrf_field()}}

             {{Form::hidden('id', $produit->id )}}
            <div class="form-group">
                {{Form::label('product_name', 'Produit')}}
                {{Form::text('product_name', $produit->product_name, ['placeholder'=>'Entrez le nom du produit', 'class'=>'form-control', 'required' => 'required'] )}}
            </div>
            <div class="form-group">
                {{Form::label('product_price', 'Prix')}}
                {{Form::number('product_price', $produit->product_price, ['placeholder'=>'Entrez le prix du produit', 'class'=>'form-control', 'required' => 'required'] )}}
            </div>
            <div class="form-group">
                {{Form::label('product_description', 'Description')}}
                {{Form::textarea('product_description', $produit->product_description, ['placeholder'=>'Entrez la description prix du produit', 'class'=>'form-control', 'required' => 'required'] )}}
            </div><br/>
    
            {!! Form::submit('Modifier', ['class' => 'btn btn-primary']) !!}
        {!!Form::close()!!}
       


@endsection