

@extends('client.layouts.appadmin')

@section('title')
    Comamndes
@endsection 
 
@section('contenu')
<div class="main-panel">
    <div class="content-wrapper">



      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Les Commandes</h4>
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="order-listing" class="table">
                  <thead>
                    <tr>
                        <th>Order #</th>
                        <th>Nom du client</th>
                        <th>Adresse</th>
                        <th>Panier</th>
                        <th>Payment</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td>1</td>
                        <td>2012/08/03</td>
                        <td>Edinburgh</td>
                        <td>$1500</td>
                        <td>
                          <label class="badge badge-info">On hold</label>
                        </td>
                        <td>
                          <button class="btn btn-outline-primary">Voir</button>
                          <button class="btn btn-outline-danger">Supprimer</button>
                        </td>
 
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      
    </div>
     
  </div>

  @endsection

  
  @section('scripts')
        <script src="backend/js/vendor.bundle.base.js"></script>
        <script src="backend/js/vendor.bundle.addons.js"></script>
        <!-- endinject -->
        <!-- inject:js -->
        <script src="backend/js/off-canvas.js"></script>
        <script src="backend/js/hoverable-collapse.js"></script>
        <script src="backend/js/template.js"></script>
        <script src="backend/js/settings.js"></script>
        <script src="backend/js/todolist.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <script src="backend/js/data-table.js"></script>
  @endsection