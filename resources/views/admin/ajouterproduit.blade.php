
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



          {!!Form::open(['action' => 'ProductController@sauverproduit', 'method' => 'POST', 'class' =>'form-horizontal', 'enctype'=>'multipart/form-data'])!!}
          {{ csrf_field() }}

              <div class="form-group">

                {{Form::label('','Nom du Produit')}}
                {{Form::text('product_name','',['class' => 'form-control','id'=> 'cname'])}}
               
              </div>
              
              <div class="form-group">

                {{Form::label('','Prix du Produit')}}
                {{Form::number('product_price','',['class' => 'form-control','id'=> 'cname'])}}
               
              </div>

              <div class="form-group">
                {{Form::label('','Catégorie du produit')}}
                  {{ Form::select('product_category', $categories, null,
                 ['placeholder' => 'Select category', 'class' => 'form-control'])
                 }}
                 {{-- <select name="" id="" class  = 'form-control'>
                  @foreach ($categories as $categorie)
                      <option value="">{{$categorie->category_name}}</option>
                  @endforeach
                 </select> --}}
              </div>  
              <div class="form-group">
                {{Form::label('', 'Description du Produit')}}
                {{Form::textarea('product_description', '', ['id'=> 'editor','placeholder' => 'Description du produit', 'class' => 'form-control'])}}
            </div>

              <div class="form-group">

                {{Form::label('','Image du Produit')}}
                {{Form::file('product_image',['class' => 'form-control'])}}
               
              </div>
              {{Form::submit('Ajouter Produit', ['class' => 'btn btn-primary'])}}

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