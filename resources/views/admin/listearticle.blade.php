@extends('adminlayouts.app')

@section('title')
    Liste des articles
@endsection

@section('contenu')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Liste des articles</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href={{URL('/admin')}}>Tableau de bord</a></a></li>
            <li class="breadcrumb-item active">Articles</li>
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
            <h3 class="card-title">Table de tous les articles</h3>
          </div>

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



          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped ">
              <thead>
              <tr>
                <th>#REF Article</th>
                <th>Nom article</th>
                <th>Catégorie</th>
                <th>Image</th>
                <th>Prix HT</th>
                <th>Description</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tbody>
              
              
             
                @foreach ( $produits as $produit )

              <tr>
                <td>{{$produit->REF_PRODUIT}}</td>
                <td>{{$produit->NOM_PRODUIT}}</td>
                <td>{{$produit->ID_CATEGORIE}}</td>
                <td><img src="/storage/images_produits/{{$produit->IMAGE}}" style="height:50px; weight:50px"></td>  <!-- php artisan storage:link -->
                <td>{{'$  '.$produit->PRIX_HT_PRODUIT}}</td>
                <td>{{$produit->DESCRIPTION}}</td>
                <td>
                  @if($produit->status == 1)
                    <a href="{{url('desactive_article/'.$produit->ID_PRODUIT)}}" class="btn btn-sm btn-outline-success">Actif</a>
                  @else
                    <a href="{{url('active_article/'.$produit->ID_PRODUIT)}}" class="btn btn-sm btn-outline-danger">Inactif</a> 
                  @endif
                  
                  <a href="{{url('editer_article/'.$produit->ID_PRODUIT)}}" class="btn btn-sm btn-outline-primary" title="Modifier"><i class="nav-icon fas fa-edit"></i></a>
                  <a href="#" class="btn btn-sm btn-outline-danger" title="Supprimer"
                  data-toggle="modal" 
                data-target="#modal{{$produit->ID_PRODUIT}}"><i class="nav-icon fas fa-trash" aria-hidden="true"></i></a>
                </td>
              </tr>
              


<!-------------------------- Modal de confirmation de suppression----->
  <div class="modal fade" id="modal{{$produit->ID_PRODUIT}}" >
    <div class="modal-dialog">
      <div class="modal-content bg-danger">
        <div class="modal-header">
          <h4 class="modal-title">Confirmation de suppression </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Voulez-vous supprimer l'article <b>{{$produit->NOM_PRODUIT}}&hellip;</b>?</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Annuler</button>
          <a href="{{url('supprimer_article/'.$produit->ID_PRODUIT)}}" class="btn btn-outline-light swalDefaultSuccess"> Supprimer</a>
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
                <th>#REF Article</th>
                <th>Nom article</th>
                <th>Catégorie</th>
                <th>image</th>
                <th>Prix HT</th>
                <th>Description</th>
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


