@extends('adminlayouts.app')

@section('title')
    Ajout Sliders
@endsection

@section('contenu')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1> Ajout Sliders</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href={{URL('/admin')}}>Tableau de bord</a></li>
            <li class="breadcrumb-item active">Ajout-slider</li>
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
              <h3 class="card-title">Ajout <small>de nouveaux sliders</small></h3>
            </div>

            <!-- /.card-header -->


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










            <!-- form start -->
            <form   action="{{url('/insertion_slider')}}" method="post" role="form" id="quickForm" enctype="multipart/form-data">
              {{csrf_field()}}
            {{--  {!!Form::open(['action'=>'App\Http\Controllers\PagesController@ajoutSlider', 'method'=>'POST', 'enctype' => 'multipart/form-data', 'role'=>'form', 'id'=>'quickForm'])!!}
              {{csrf_field()}}  
        --}}
                <div class="card-body">
                <div class="form-group">
                  <label for="description1">Description 1 slider</label>
                  <input type="text" name="description1" class="form-control" id="description1" placeholder="Entrer la première description" required>
           {{--          {{Form::label('description1', 'Description 1 slider')}}
                {{Form::text('description1', '', ['placeholder'=>'Entrer la première description....', 'class'=>'form-control', 'required' => 'required'] )}}
      --}}      
                </div>
                <div class="form-group">
                    <label for="description2">Description 2 slider</label>
                    <input type="text" name="description2" class="form-control" id="description2" placeholder="Entrer la seconde description" required>
        {{--          {{Form::label('description2', 'Description 2 slider')}}
                {{Form::text('description2', '', ['placeholder'=>'Entrer la seconde description....', 'class'=>'form-control', 'required' => 'required'] )}}
      --}}                
                </div>
                

                <div class="form-group">
                    <label for="imageslider">Ajout image</label>
           {{--         {{Form::label('image', 'Ajout image')}} --}}
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="imageslider" id="imageslider">
                        <label class="custom-file-label" for="imageslider">Choisir une image...</label>
            {{--        {{Form::file('image', ['class'=>'custom-file-input', 'required' => 'required'])}}
                        {{Form::label('image', 'Choisir une image...', ['class'=>'custom-file-label', 'required' => 'required'])}}
            --}}          
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" for="imageslider" >Joindre</span>
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
  });  */

  $('#quickForm').validate({
    rules: {
      description1: {
        required: true,
        maxlength:500
    
      },
      description2: {
        required: true,
        maxlength:500
      },
      
      
    },
    messages: {
      description1: {
        required: "Veuillez entrer une description",
        maxlength:"La description ne peut contenir plus de 500 caratères."
      },
      description2: {
        required: "Veuillez entrer une description",
        maxlength:"La description ne peut contenir plus de 500 caratères."
        
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