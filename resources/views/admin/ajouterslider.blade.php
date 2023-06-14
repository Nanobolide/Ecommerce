
@extends('client.layouts.appadmin')

@section('title')
    Ajouter Produit
@endsection 
 
@section('contenu') 
   <div class="main-panel">
      <div class="content-wrapper">
        <div class="row grid-margin">

       
   {{-- </div>
  <div class="col-lg-12"> --}}
    
  
    <div class="col-lg-10">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Ajouter Produit</h4>

                @if(Session::has('status'))
                <div class="alert alert-success">
                  {{Session::get('status')}}
                  </div>
              @endif

              @if(count($errors)>0)
                    <div class="alert alert-danger">
                      <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                      </ul>
                    </div>
                  
              @endif
          {!!Form::open(['action' => 'SliderController@sauverslider', 'method' => 'POST', 'class' =>'form-horizontal', 'enctype' => 'multipart/form-data'])!!}
          {{ csrf_field() }}

              <div class="form-group">

                {{Form::label('','Nom du slider')}}
                {{Form::text('name_slider','',['class' => 'form-control','id'=> 'cname'])}}
               
              </div>
             

               
              <div class="form-group">
                {{Form::label('', 'Description one')}}
                {{Form::textarea('description', '', ['id'=> 'editor','placeholder' => 'Description du slider', 'class' => 'form-control'])}}
            </div>

              <div class="form-group">

                {{Form::label('','Image du sldier')}}
                {{Form::file('slider_image',['class' => 'form-control'])}}
               
              </div>
              {{Form::submit('Ajouter Sldier', ['class' => 'btn btn-primary'])}}

              {!!Form::close()!!}
        </div>
        
      </div>
    </div>
  </div>
</div>
</div>

@endsection

@section('scripts'){{--
  <script src="backend/js/form-validation.js"></script>
  <script src="backend/js/bt-maxLength.js"></script>--}}
@endsection