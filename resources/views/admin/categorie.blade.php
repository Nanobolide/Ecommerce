

@extends('client.layouts.appadmin')

@section('title')
   Afficher Catégorie
@endsection 
  {{Form::hidden('',$increment=1)}}


@section('contenu')
<div class="main-panel">
    <div class="content-wrapper">



      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Catégories</h4>
          @if(Session::has('status'))
              <div class="alert alert-success">
                  {{Session::get('status')}}
              </div>
          @endif
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="order-listing" class="table">
                  <thead>
                    <tr>
                        <th>Order #</th>
                        <th>Nom de la Catégorie</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($categories as $category)
                           <tr>
                        <td>{{$increment}}</td>
                        <td>{{$category->category_name}}</td>
                         
                         
                        <td>
                          <button class="btn btn-outline-primary" onclick="window.location='{{url('/edit_categorie/'.$category->id)}}'">Modifier</button>
                          <button class="btn btn-outline-danger"><a href="{{url('/supprimercategorie/'.$category->id)}}" id="delete">Delete</a></button>
                        </td>
                        {{Form::hidden('', $increment=$increment+1)}}
                      @endforeach
                   
 
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