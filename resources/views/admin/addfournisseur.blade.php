@extends('adminlayouts.app')

@section('title')
    Ajout Fournisseur
@endsection

@section('contenu')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Ajout-fournisseur</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href={{URL('/admin')}}>Tableau de bord</a></a></li>
            <li class="breadcrumb-item active">Ajout-fournisseur</li>
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
              <h3 class="card-title">Ajout <small>de nouveaux fournisseurs</small></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form   action="{{url('/insertion_fournisseur')}}" method="post" role="form" id="quickForm">
                {{csrf_field()}}
            
             {{--  {!!Form::open(['action'=>'App\Http\Controllers\PagesController@ajoutFournisseur', 'method'=>'POST', 'enctype' => 'multipart/form-data', 'role'=>'form', 'id'=>'quickForm'])!!}
              {{csrf_field()}}  
        --}}
                <div class="card-body">
                <div class="form-group">
                  <label for="nom_fournisseur">Nom du fournisseur</label>
                  <input type="text" name="nom_fournisseur" class="form-control" id="nom_fournisseur" placeholder="Entrer le nom du nouveau fournisseur">
        {{--    {{Form::label('nom_fournisseur', 'Nom du fournisseur')}}
                  {{Form::text('nom_fournisseur', '', ['placeholder'=>'Entrer le nom du nouveau fournisseur', 'class'=>'form-control', 'required' => 'required'] )}}
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
      nom_fournisseur: {
        required: true,
        minlength:3
    
      },
      
    },
    messages: {
      nom_fournisseur: {
        required: "Veuillez entrer le nom du nouveau fournisseur",
        minlength:"Le doit contenir au moins 3 caractères"
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