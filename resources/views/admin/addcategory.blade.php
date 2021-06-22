@extends('adminlayouts.app')

@section('title')
    Ajout catégorie
@endsection

@section('contenu')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Ajout-catégorie</h1>


        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href={{URL('/admin')}}>Tableau de bord</a></a></li>
            <li class="breadcrumb-item active">Ajout-catégorie</li>
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
              <h3 class="card-title">Ajout <small>de nouvelles catégories</small></h3>
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
            <form   action="{{url('/insertion_categorie')}}" method="post" role="form" id="quickForm">
              {{csrf_field()}}
        {{--  {!!Form::open(['action'=>'App\Http\Controllers\PagesController@ajoutCategorie', 'method'=>'POST', 'enctype' => 'multipart/form-data', 'role'=>'form', 'id'=>'quickForm'])!!}
              {{csrf_field()}}  
        --}}

                <div class="card-body">
                <div class="form-group">
                  <label for="nom_categorie">Catégorie</label>
                  <input type="text" name="nom_categorie" class="form-control" id="categorie" placeholder="Entrer la nouvelle catégorie">
        
        {{--    {{Form::label('categorie', 'Catégorie')}}
                  {{Form::text('categorie', '', ['placeholder'=>'Entrer la nouvelle catégorie', 'class'=>'form-control', 'required' => 'required'] )}}
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
 
  $('#quickForm').validate({
    rules: {
      nom_categorie: {
        required: true,
        minlength:5
    
      },
      
    },
    messages: {
      nom_categorie: {
        required: "Veuillez entrer une catégorie",
        minlength:"Au moins 5 caractères"
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