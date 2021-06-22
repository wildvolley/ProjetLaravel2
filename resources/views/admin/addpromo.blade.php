@extends('adminlayouts.app')

@section('title')
    Ajout promotion
@endsection

@section('contenu')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1> Ajout Promotion</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href={{URL('/admin')}}>Tableau de bord</a></a></li>
            <li class="breadcrumb-item active">Ajout-promotion</li>
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
              <h3 class="card-title">Ajout <small>de nouvelles promotions</small></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form   action="{{url('/insertion_promo')}}" method="post" role="form" id="quickForm">
                {{csrf_field()}}
        {{--  {!!Form::open(['action'=>'App\Http\Controllers\PagesController@ajoutPromo', 'method'=>'POST', 'enctype' => 'multipart/form-data', 'role'=>'form', 'id'=>'quickForm'])!!}
              {{csrf_field()}}  
        --}}
                <div class="card-body">
                <div class="form-group">
                  <label for="ref_promotion">Référence de la promotion</label>
                  <input type="number" name="ref_promotion" class="form-control" id="ref_promotion" placeholder="Entrer la référence" required>
         {{--    {{Form::label('ref_promotion', 'Référence de la promotion')}}
                  {{Form::number('ref_promotion', '', ['placeholder'=>'Entrer une référence pour la nouvelle promo ', 'class'=>'form-control', 'required' => 'required'] )}}
          --}}         
                </div>

                <div class="form-group">
                    <label for="nom_promotion">Nom de la promotion</label>
                    <input type="text" name="nom_promotion" class="form-control" id="nom_promotion" placeholder="Entrer le nom de la promotion" required>
             {{--    {{Form::label('nom_promotion', 'Nom de la promotion')}}
                  {{Form::text('nom_promotion', '', ['placeholder'=>'Entrer le nom de la promotion', 'class'=>'form-control', 'required' => 'required'] )}}
          --}}    
                  </div>
                
                  <div class="form-group">
                    <label for="id_produit">Référence de la promotion</label>
                    <input type="number" name="id_produit" class="form-control" id="id_produit" placeholder="Entrer le ID du produit concerné" required>
           {{--    {{Form::label('id_produit', 'Référence de la promotion')}}
                    {{Form::number('id_produit', '', ['placeholder'=>'Entrer le ID du produit concerné', 'class'=>'form-control', 'required' => 'required'] )}}
            --}}         
                  </div>
                
                <div class="form-group">
                  <label for="taux_rabais">Taux de rabais de la promotion</label>
                  <input type="number" name="taux_rabais" class="form-control" id="taux_rabais" placeholder="Entrer le taux de rabais de la promotion" required>
                 {{--    {{Form::label('taux_rabais', 'Taux de rabais de la promotion')}}
                  {{Form::text('taux_rabais', '', ['placeholder'=>'Entrer le taux de rabais de la promotion', 'class'=>'form-control', 'required' => 'required'] )}}
          --}} 
                </div>

                
                
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Ajouter</button>
                 {{--  {!! Form::submit('Ajouter', ['class' => 'btn btn-primary']) !!}  --}}
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
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  $('#quickForm').validate({
    rules: {
      ref_promotion: {
        required: true,
        minlength: 3,
        maxlength:7
    
      },
      nom_promotion: {
        required: true,
        minlength: 3
    
      },
      id_produit: {
        required: true,
        minlength: 1,
        maxlength:7
      },
      taux_rabais: {
        required: true,
        maxlength:4
    
      },
      
    },
    messages: {
      ref_promotion: {
        required: "Veuillez entrer une référence pour la promo",
        minlength: "Le doit contenir au moins 3 caractères",
        maxlength:"Le doit contenir au plus 7 caractères"
      },
      nom_promotion: {
        required: "Veuillez entrer un nom pour la promo",
        minlength: "Le doit contenir au moins 3 caractères"
      },
      id_produit: {
        required: "Veuillez entrer le ID du produit concerné par la promo",
        minlength: "Le doit contenir au moins 1 caractères",
        maxlength:"Le doit contenir au plus 7 caractères"
      },
      taux_rabais: {
        required: "Veuillez entrer un taux pour la promo",
        maxlength:"Le doit contenir au plus 4 caractères"
      }
      
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