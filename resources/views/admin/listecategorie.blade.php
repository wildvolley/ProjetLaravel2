@extends('adminlayouts.app')

@section('title')
    Liste des categorie
@endsection

@section('contenu')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Liste des categories</h1>


        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href={{URL('/admin')}}>Tableau de bord</a></a></li>
            <li class="breadcrumb-item active">Catégories</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="row">
      <div class="col-12">
    

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Table de toutes les catégories</h3>
<!-------------- Message d'etats de modification---------------->
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
<!-------------- fin Message d'etats de modification---------------->          
          
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped ">
              <thead>
              <tr>
                <th>Numéro de catégorie</th>
                <th>Nom de catégorie</th>
                <th>Actions</th>
              </tr>
              </thead>

              <tbody>

          @foreach ( $categories as $categorie )
          <tr>
            <td>{{$categorie->ID_CATEGORIE}}</td>
            <td>{{$categorie->NOM_CATEGORIE}}</td>
            <td>
              <a href="#" class="btn btn-sm btn-outline-success">Active</a>
              <a href="{{url('editer_categorie/'.$categorie->ID_CATEGORIE)}}" class="btn btn-sm btn-outline-primary"><i class="nav-icon fas fa-edit"></i></a>
              
              <a href=""  class="btn btn-sm btn-outline-danger" data-toggle="modal" 
                data-target="#modal{{$categorie->ID_CATEGORIE}}"><i class="nav-icon fas fa-trash" aria-hidden="true"></i></a>
            </td>
          </tr>


          <!----- Modal de confirmation de suppression----->
  <div class="modal fade" id="modal{{$categorie->ID_CATEGORIE}}" >
    <div class="modal-dialog">
      <div class="modal-content bg-danger">
        <div class="modal-header">
          <h4 class="modal-title">Confirmation de suppression </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Voulez-vous supprimer la catégorie <b>{{$categorie->NOM_CATEGORIE}}&hellip;</b>?</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Annuler</button>
          <a href="{{url('supprimer_categorie/'.$categorie->ID_CATEGORIE)}}" class="btn btn-outline-light swalDefaultSuccess"> Supprimer</a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!----- Modal ----->




          @endforeach

              </tbody>
              <tfoot>
              <tr>
                <th>Numéro de catégorie</th>
                <th>Nom de catégorie</th>
                <th>Actions</th>
              </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>

  
@endsection

@section('script')
<script src="{{asset('backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('backend/dist/js/demo.js')}}"></script>

<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
  

    
@endsection


