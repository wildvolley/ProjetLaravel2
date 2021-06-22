@extends('layouts.app1')

@section('title')
    Mon panier
@endsection

@section('contenu')


<div class="hero-wrap hero-bread" style="background-image: url('frontend/images/bg_1.jpg');">
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <p class="breadcrumbs"><span class="mr-2"><a href={{URL::to('/')}}>Accueil</a></span> <span>Panier</span></p>
        <h1 class="mb-0 bread">Mon panier</h1>
      </div>
    </div>
  </div>
</div>

<section class="ftco-section ftco-cart">
  <div class="container">
    <div class="row">
      <div class="col-md-12 ftco-animate">
        <div class="cart-list">
          <table class="table">
            <thead class="thead-primary">
              <tr class="text-center">
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>Nom article</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Total</th>
              </tr>
            </thead>
      
      <tbody>
        @if (Session::has('cart'))

        @foreach ($produits as $produit)

        <tr class="text-center">
          <td class="product-remove"><a href="{{url('enlever_du_panier/'.$produit['id_produit'])}}"><span class="ion-ios-close"></span></a></td>
          
          <td class="image-prod"><div class="img" style="background-image:url(/storage/images_produits/{{$produit['image']}});"></div></td>
          
          <td class="product-name">
            <h3>{{$produit['nom_produit']}}</h3>
            <p>Far far away, behind the word mountains</p>
          </td>
          
          <td class="price">${{$produit['prix_produit']}}</td>
          <form  action="{{url('modifier_quantite/'.$produit['id_produit'])}}" method="POST">
          {{ csrf_field() }}
            <td class="quantity">
            <div class="input-group mb-3">
               <input type="number" name="quantity" class="quantity form-control input-number" value={{$produit['qte']}} min="1" max="100">
            </div>
            <button type="submit" class="btn btn-primary py-3 px-4">Valider</button>
          </form>
          </td>
          
          <td class="total">${{$produit['prix_produit']*$produit['qte']}}</td>
        </tr><!-- END TR-->
            
        @endforeach


        @else
      <h4> Panier vide, <a class="dropdown-item" href={{URL::to('/shop')}}><b>Magasinez</b></a> 
      @endif
        
      </tbody>
          
          </table>
        </div>
      </div>
    </div>
    <div class="row justify-content-end">
      <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
        <div class="cart-total mb-3">
          <h3>Coupon cadeau</h3>
          <p>Entrez votre code de réduction</p>
          <form action="#" class="info">
            <div class="form-group">
              <label for="">Coupon cadeau</label>
              <input type="text" class="form-control text-left px-3" placeholder="">
            </div>
          </form>
        </div>
        <p><a href="checkout.html" class="btn btn-primary py-3 px-4">Appliquer Coupon</a></p>
      </div>
      <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
        <div class="cart-total mb-3">
          <h3>Estimate shipping and tax</h3>
          <p>Enter your destination to get a shipping estimate</p>
          <form action="#" class="info">
            <div class="form-group">
              <label for="">Pays</label>
              <input type="text" class="form-control text-left px-3" placeholder="">
            </div>
            <div class="form-group">
              <label for="country">État/Province</label>
              <input type="text" class="form-control text-left px-3" placeholder="">
            </div>
            <div class="form-group">
              <label for="country">Zip/Code Postal </label>
              <input type="text" class="form-control text-left px-3" placeholder="">
            </div>
          </form>
        </div>
        <p><a href="checkout.html" class="btn btn-primary py-3 px-4">Estimation</a></p>
      </div>
      <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
        <div class="cart-total mb-3">
          <h3>Calcul panier</h3>
          <p class="d-flex">
            <span>Sous-Total</span>
            <span>${{Session::has('cart') ? Session::get('cart')->totalPrix : 0 }}</span>
          </p>
          <p class="d-flex">
            <span>Livraison</span>
            <span>$0.00</span>
          </p>
          <p class="d-flex">
            <span>Taxes</span>
            <span>${{(Session::has('cart') ? Session::get('cart')->totalPrix : 0)*0.15 }}</span>
          </p>
          <p class="d-flex">
            <span>Rabais</span>
            <span>$0.00</span>
          </p>
          <hr>
          <p class="d-flex total-price">
            <span>Total</span>
            <span>${{(Session::has('cart') ? Session::get('cart')->totalPrix : 0)*1.15 }}</span>
          </p>
        </div>
        <p><a href={{URL('/paiement')}} class="btn btn-primary py-3 px-4">Aller au paiement</a></p>
      </div>
    </div>
  </div>
</section>

                        
    <!-- Shopping Cart Section End -->
@endsection

@section('script')
<script>
  $(document).ready(function(){

  var quantity=0;
     $('.quantity-right-plus').click(function(e){
          
          // Stop acting like a button
          e.preventDefault();
          // Get the field name
          var quantity = parseInt($('#quantity').val());
          
          // If is not undefined
              
              $('#quantity').val(quantity + 1);

            
              // Increment
          
      });

       $('.quantity-left-minus').click(function(e){
          // Stop acting like a button
          e.preventDefault();
          // Get the field name
          var quantity = parseInt($('#quantity').val());
          
          // If is not undefined
        
              // Increment
              if(quantity>0){
              $('#quantity').val(quantity - 1);
              }
      });
      
  });
</script>
    
@endsection