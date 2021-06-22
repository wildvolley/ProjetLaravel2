@extends('adminlayouts.app')

@section('title')
    Liste des clients
@endsection

@section('contenu')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Liste des clients</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href={{URL('/admin')}}>Tableau de bord</a></a></li>
            <li class="breadcrumb-item active">Clients</li>
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
            <h3 class="card-title">Table de tous les clients</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped ">
              <thead>
              <tr>
                <th>#ID client</th>
                <th>Nom Client</th>
                <th>Courriel</th>
                <th>Compte</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td>Trident</td>
                <td>Internet Explorer 4.0</td>
                <td>Win 95+</td>
                <td><a href="#" class="btn btn-sm btn-outline-success" title="État du compte">Actif</a></td>
                <td>
                  <a href="#" class="btn btn-sm btn-outline-success" title="Détails"><i class="nav-icon fas fa-info"></i></a>
                  <a href="#" class="btn btn-sm btn-outline-primary" title="Modifier"><i class="nav-icon fas fa-edit"></i></a>
                  <a href="#" class="btn btn-sm btn-outline-danger" title="Supprimer"><i class="nav-icon fas fa-trash" aria-hidden="true"></i></a>
                </td>
              </tr>
              <tr>
                <td>Trident</td>
                <td>Internet
                  Explorer 5.0
                </td>
                <td>Win 95+</td>
                <td><a href="#" class="btn btn-sm btn-outline-success" title="État du compte">Actif</a></td>
                <td>
                  <a href="#" class="btn btn-sm btn-outline-success" title="Détails"><i class="nav-icon fas fa-info"></i></a>
                  <a href="#" class="btn btn-sm btn-outline-primary" title="Modifier"><i class="nav-icon fas fa-edit"></i></a>
                  <a href="#" class="btn btn-sm btn-outline-danger" title="Supprimer"><i class="nav-icon fas fa-trash" aria-hidden="true"></i></a>
                </td>
              </tr>
              <tr>
                <td>Trident</td>
                <td>Internet
                  Explorer 5.5
                </td>
                <td>Win 95+</td>
                <td><a href="#" class="btn btn-sm btn-outline-success" title="État du compte">Actif</a></td>
                <td>
                  <a href="#" class="btn btn-sm btn-outline-success" title="Détails"><i class="nav-icon fas fa-info"></i></a>
                  <a href="#" class="btn btn-sm btn-outline-primary" title="Modifier"><i class="nav-icon fas fa-edit"></i></a>
                  <a href="#" class="btn btn-sm btn-outline-danger" title="Supprimer"><i class="nav-icon fas fa-trash" aria-hidden="true"></i></a>
                </td>
              </tr>
              <tr>
                <td>Trident</td>
                <td>Internet
                  Explorer 6
                </td>
                <td>Win 98+</td>
                <td><a href="#" class="btn btn-sm btn-outline-success" title="État du compte">Actif</a></td>
                <td>
                  <a href="#" class="btn btn-sm btn-outline-success" title="Détails"><i class="nav-icon fas fa-info"></i></a>
                  <a href="#" class="btn btn-sm btn-outline-primary" title="Modifier"><i class="nav-icon fas fa-edit"></i></a>
                  <a href="#" class="btn btn-sm btn-outline-danger" title="Supprimer"><i class="nav-icon fas fa-trash" aria-hidden="true"></i></a>
                </td>
              </tr>
              <tr>
                <td>Trident</td>
                <td>Internet Explorer 7</td>
                <td>Win XP SP2+</td>
                <td><a href="#" class="btn btn-sm btn-outline-success" title="État du compte">Actif</a></td>
                <td>
                  <a href="#" class="btn btn-sm btn-outline-success" title="Détails"><i class="nav-icon fas fa-info"></i></a>
                  <a href="#" class="btn btn-sm btn-outline-primary" title="Modifier"><i class="nav-icon fas fa-edit"></i></a>
                  <a href="#" class="btn btn-sm btn-outline-danger" title="Supprimer"><i class="nav-icon fas fa-trash" aria-hidden="true"></i></a>
                </td>
              </tr>
              <tr>
                <td>Trident</td>
                <td>AOL browser (AOL desktop)</td>
                <td>Win XP</td>
                <td><a href="#" class="btn btn-sm btn-outline-success" title="État du compte">Actif</a></td>
                <td>
                  <a href="#" class="btn btn-sm btn-outline-success" title="Détails"><i class="nav-icon fas fa-info"></i></a>
                  <a href="#" class="btn btn-sm btn-outline-primary" title="Modifier"><i class="nav-icon fas fa-edit"></i></a>
                  <a href="#" class="btn btn-sm btn-outline-danger" title="Supprimer"><i class="nav-icon fas fa-trash" aria-hidden="true"></i></a>
                </td>
              </tr>
              <tr>
                <td>Gecko</td>
                <td>Firefox 1.0</td>
                <td>Win 98+ / OSX.2+</td>
                <td><a href="#" class="btn btn-sm btn-outline-success" title="État du compte">Actif</a></td>
                <td>
                  <a href="#" class="btn btn-sm btn-outline-success" title="Détails"><i class="nav-icon fas fa-info"></i></a>
                  <a href="#" class="btn btn-sm btn-outline-primary" title="Modifier"><i class="nav-icon fas fa-edit"></i></a>
                  <a href="#" class="btn btn-sm btn-outline-danger" title="Supprimer"><i class="nav-icon fas fa-trash" aria-hidden="true"></i></a>
                </td>
              </tr>
              <tr>
                <td>Gecko</td>
                <td>Firefox 1.5</td>
                <td>Win 98+ / OSX.2+</td>
                <td><a href="#" class="btn btn-sm btn-outline-success" title="État du compte">Actif</a></td>
                <td>
                  <a href="#" class="btn btn-sm btn-outline-success" title="Détails"><i class="nav-icon fas fa-info"></i></a>
                  <a href="#" class="btn btn-sm btn-outline-primary" title="Modifier"><i class="nav-icon fas fa-edit"></i></a>
                  <a href="#" class="btn btn-sm btn-outline-danger" title="Supprimer"><i class="nav-icon fas fa-trash" aria-hidden="true"></i></a>
                </td>
              </tr>
              <tr>
                <td>Gecko</td>
                <td>Firefox 2.0</td>
                <td>Win 98+ / OSX.2+</td>
                <td><a href="#" class="btn btn-sm btn-outline-success" title="État du compte">Actif</a></td>
                <td>
                  <a href="#" class="btn btn-sm btn-outline-success" title="Détails"><i class="nav-icon fas fa-info"></i></a>
                  <a href="#" class="btn btn-sm btn-outline-primary" title="Modifier"><i class="nav-icon fas fa-edit"></i></a>
                  <a href="#" class="btn btn-sm btn-outline-danger" title="Supprimer"><i class="nav-icon fas fa-trash" aria-hidden="true"></i></a>
                </td>
              </tr>
              <tr>
                <td>Gecko</td>
                <td>Firefox 3.0</td>
                <td>Win 2k+ / OSX.3+</td>
                <td><a href="#" class="btn btn-sm btn-outline-success" title="État du compte">Actif</a></td>
                <td>
                  <a href="#" class="btn btn-sm btn-outline-success" title="Détails"><i class="nav-icon fas fa-info"></i></a>
                  <a href="#" class="btn btn-sm btn-outline-primary" title="Modifier"><i class="nav-icon fas fa-edit"></i></a>
                  <a href="#" class="btn btn-sm btn-outline-danger" title="Supprimer"><i class="nav-icon fas fa-trash" aria-hidden="true"></i></a>
                </td>
              </tr>
              <tr>
                <td>Gecko</td>
                <td>Camino 1.0</td>
                <td>OSX.2+</td>
                <td><a href="#" class="btn btn-sm btn-outline-success" title="État du compte">Actif</a></td>
                <td>
                  <a href="#" class="btn btn-sm btn-outline-success" title="Détails"><i class="nav-icon fas fa-info"></i></a>
                  <a href="#" class="btn btn-sm btn-outline-primary" title="Modifier"><i class="nav-icon fas fa-edit"></i></a>
                  <a href="#" class="btn btn-sm btn-outline-danger" title="Supprimer"><i class="nav-icon fas fa-trash" aria-hidden="true"></i></a>
                </td>
              </tr>
              <tr>
                <td>Gecko</td>
                <td>Camino 1.5</td>
                <td>OSX.3+</td>
                <td><a href="#" class="btn btn-sm btn-outline-danger" title="État du compte">Inactif</a></td>
                <td>
                  <a href="#" class="btn btn-sm btn-outline-success" title="Détails"><i class="nav-icon fas fa-info"></i></a>
                  <a href="#" class="btn btn-sm btn-outline-primary" title="Modifier"><i class="nav-icon fas fa-edit"></i></a>
                  <a href="#" class="btn btn-sm btn-outline-danger" title="Supprimer"><i class="nav-icon fas fa-trash" aria-hidden="true"></i></a>
                </td>
              </tr>
        
              </tbody>
              <tfoot>
              <tr>
                <th>#ID client</th>
                <th>Nom Client</th>
                <th>Courriel</th>
                <th>Compte</th>
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


