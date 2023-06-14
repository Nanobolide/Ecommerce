

@extends('client.layouts.appadmin')

@section('title')
   Afficher Catégorie
@endsection 
 {{Form::hidden('', $increment=1)}}
@section('contenu')
<div class="main-panel">
    <div class="content-wrapper">



      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Data table</h4>
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
                        <th>Image</th>
                        <th>Nom du Slider</th>
                        <th>Description du slider</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($sliders as $slider)
                    <tr>
                      <td>{{$increment}}</td>
                      <td><img src="/storage/slider_images/{{$slider->slider_image}}"></td>
                      <td>{{$slider->name_slider}}</td>
                      <td>{{$slider->description}}</td>
                      <td>

                        @if($slider->status == 1)
                          <label class="badge badge-success">Activé</label>
                        @else
                          <label class="badge badge-info">Desactivé</label>
                        @endif

                  </td>
                  <td>

                    <button class="btn btn-outline-primary"  onclick =" window.location='{{url('/edit_slider/'.$slider->id)}}'">Modifier</button>

                    <button class="btn btn-outline-danger"><a href="{{url('/supprimer_slider/'.$slider->id)}}" id="delete">Delete</a></button>
                     
                    @if($slider->status == 1)
                                
                      <button class="btn btn-outline-warning"  onclick =" window.location='{{url('/desactiver_slider/'.$slider->id)}}'">Desactivé</button>

                    @else
               
                      <button class="btn btn-outline-primary"  onclick =" window.location='{{url('/activer_slider/'.$slider->id)}}'">Activé</button>

                    @endif

                      {{Form::hidden('', $increment=$increment + 1)}}
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