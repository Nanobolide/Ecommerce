
@extends('client.layouts.appadmin')

@section('title')
    Modifier Categorie
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
          <h4 class="card-title">Editer Categorie</h4>

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

          {!!Form::open(['action' => ['CategoryController@modifiercategorie', $categorie->id], 'method' => 'POST', 'class' =>'form-horizontal'])!!}
          {{ csrf_field() }}

              <div class="form-group">

                {{Form::hidden('id', $categorie->id)}}
                {{Form::label('','Nom du Categorie')}}
                {{Form::text('category_name', $categorie->category_name,['class' => 'form-control','id'=> 'cname'])}}
               
              </div>
             
              {{Form::submit('Modifier', ['class' => 'btn btn-primary'])}}

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