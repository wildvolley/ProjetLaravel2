@extends('adminlayouts.app')

@section('title')
    Ajout Article
@endsection

@section('contenu')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1> Ajout Articles</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href={{URL('/admin')}}>Tableau de bord</a></a></li>
            <li class="breadcrumb-item active">Ajout-article</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- jquery validation -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Ajout <small>de nouveaux articles</small></h3>
            </div>

<!----------------------------- Messages de succès---->
             @if(Session::has('succes'))
             <div class="alert alert-success">   
                 
                 {{Session::get('succes')}} 
                 {{Session::put('succes', null)}} 
             </div>  
         @endif
<!--------------- Validation des champs obligatoires---->
         @if(count($errors)>0)
             <div class="alert alert-danger">   
                 <ul>
                     @foreach ($errors->all() as $erreur)
                     <li>{{$erreur}}</li>
                     @endforeach
                 </ul>
             </div> 
         @endif
<!--------------- Fin  Validation des champs obligatoires---->










            <!-- /.card-header -->
            <!-- form start -->
            <form   action="{{url('/insertion_article')}}" method="post" role="form" id="quickForm"  enctype ="multipart/form-data">
              {{csrf_field()}}
            {{--  {!!Form::open(['action'=>'App\Http\Controllers\PagesController@ajoutArticle', 'method'=>'POST', 'enctype' => 'multipart/form-data', 'role'=>'form', 'id'=>'quickForm'])!!}
              {{csrf_field()}}  --}}
                
                <div class="card-body">
         {{--        <div class="form-group">
                  <label for="id_categorie">Catégorie d'article</label>
                  <input type="number" name="id_categorie" class="form-control" id="id_categorie" placeholder="Choisir un ID : 1-Informatique 2-Electomenager 3-Sport" >
                
             {{Form::label('id_categorie', 'Catégorie d\'article')}}
                  {{Form::number('id_categorie', '', ['placeholder'=>'Choisir un ID : 1-Informatique 2-Electomenager 3-Sport', 'class'=>'form-control', 'required' => 'required'] )}}
               
                </div>
        --}}
               

                <div class="form-group">
                  <label class="label">Catégories d'article</label>
                  <div class="select">
                      <select name="id_categorie" class="form-control">
                          @foreach($categories as $categorie)
                              <option value="{{ $categorie->NOM_CATEGORIE }}">{{ $categorie->NOM_CATEGORIE }}</option>
                          @endforeach
                      </select>
                  </div>
              </div>


                <div class="form-group">
                   <label for="nom_produit">Nom de l'article</label>
                    <input type="text" name="nom_produit" class="form-control" id="nom_produit" placeholder="Entrer le nom du produit">
          
          {{--      {{Form::label('nom_produit', 'Nom de l\'article')}}
                    {{Form::text('nom_produit', '', ['placeholder'=>'Entrer le nom du produit', 'class'=>'form-control', 'required' => 'required'] )}}
              --}}
                </div>
                <div class="form-group">
                  <label for="ref_produit">Référence de l'article</label>
                  <input type="text" name="ref_produit" class="form-control" id="ref_produit" placeholder="Entrer la référence du produit" required>
                  
          {{--    {{Form::label('ref_produit', 'Référence de l\'article')}}
                  {{Form::text('ref_produit', '', ['placeholder'=>'Entrer la référence du produit', 'class'=>'form-control', 'required' => 'required'] )}}  
          --}}


                </div>
                <div class="form-group">
                  <label for="prix_ht_produit">Prix hors taxes de  l'article</label>
                  <input type="number" name="prix_ht_produit" class="form-control" id="prix_ht_produit" placeholder="Entrer le prix hors taxes du produit" required>
                  
        {{--          {{Form::label('prix_ht_produit', 'Prix hors taxes de  l\'article')}}
                  {{Form::number('prix_ht_produit', '', ['placeholder'=>'Entrer le prix hors taxes du produit', 'class'=>'form-control', 'required' => 'required'] )}}  
        --}}          
                
                </div>
              <div class="form-group">
                <label for="description">Description de l'article</label>
                <textarea name="description" class="form-control" id="description"  required> Entrer les détails concernant le produit....</textarea>
      {{--          {{Form::label('description', 'Description de l\'article')}}
                {{Form::textarea('description', '', ['placeholder'=>'Entrer les détails concernant le produit....', 'class'=>'form-control', 'required' => 'required'] )}}
      --}}        
              </div>
              
                <div class="form-group">
                    <label for="image">Ajout image</label>
            {{--         {{Form::label('image', 'Ajout image')}} --}}
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="imagearticle" >
                         <label class="custom-file-label" for="image">Choisir une image...</label>

            {{--            {{Form::file('image', ['class'=>'custom-file-input', 'required' => 'required'])}}
                        {{Form::label('image', 'Choisir une image...', ['class'=>'custom-file-label', 'required' => 'required'])}}
            --}}          
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" for="image" >Joindre</span>
                      </div>
                    </div>
                </div>

                
                
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Ajouter</button>
        {{--        {!! Form::submit('Ajouter', ['class' => 'btn btn-primary']) !!}  --}}
                
              </div>
            </form>
        {{--    {!!Form::close()!!}    --}}
          </div>
          <!-- /.card -->
          </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">

        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
    
@endsection

@section('script')

    <!-- jQuery -->
<script src="{{asset('backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- jquery-validation -->
<script src="{{asset('backend/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('backend/plugins/jquery-validation/additional-methods.min.js')}}"></script>

<!-- AdminLTE for demo purposes -->

<script type="text/javascript">
$(document).ready(function () {
 /* $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });*/
  $('#quickForm').validate({
    rules: {
      id_categorie: {
        required: true,
        maxlength: 1
    
      },
      nom_produit: {
        required: true,
        minlength: 3,
        maxlength: 25
      },
      ref_produit: {
        required: true,
        minlength: 3,
        maxlength:7
      },

      prix_ht_produit: {
        required: true,
      },

      description: {
        required: true,
        maxlength:500,
        minlength:5
      },
      
      
    },
    messages: {
      id_categorie: {
        required: "Veuillez entrer un identifiant de catégorie",
        maxlength:"Doit avoir 1 seul chiffre"
      },
      nom_produit: {
        required: "Veuillez entrer un nom pour le nouveau produit",
        minlength: "Le doit contenir au moins 3 caractères"
      },
      ref_produit: {
        required: "Veuillez entrer une référence pour le nouveau produit",
        minlength: "Le doit contenir au moins 3 caractères",
        maxlength:"Le doit contenir au plus 7 caractères"
      },
      prix_ht_produit: {
        required: "Veuillez entrer un prix HT produit pour le nouveau produit"
      },
      description: {
        required: "Veuillez entrer une description pour le nouveau produit",
        minlength: "Le doit contenir au moins 5 caractères",
        maxlength:"Le doit contenir au plus 500 caractères"
      },
      
      
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
    
@endsection