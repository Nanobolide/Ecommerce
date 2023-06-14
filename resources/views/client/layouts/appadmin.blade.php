<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title')</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('backend/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('backend/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('backend/css/vendor.bundle.addons.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('backend/images/logo_2H_tech.png')}}" />
</head>

<body>
    
  <div class="container-fluid row">
    <!-- partial:partials/_navbar.html -->
    
    {{-- Menu 1 --}}
    @include('client.include.navbar1')
    {{-- fin menu1 --}}

   <div class="container-fluid page-body-wrapper">
    {{-- Menu 2 --}}
    @include('client.include.navbar2')
    {{-- Menu 2 --}}

        @yield('contenu')

      
      
      </div>
      <!-- page-body-wrapper ends -->
    </div>

    @yield('scripts')
  <!-- plugins:js -->
  <script src="{{asset('backend/js/vendor.bundle.base.js')}}"></script>
  <script src="{{asset('backend/js/vendor.bundle.addons.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{asset('backend/js/off-canvas.js')}}"></script>
  <script src="{{asset('backend/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('backend/js/template.js')}}"></script>
  <script src="{{asset('backend/js/settings.js')}}"></script>
  <script src="{{asset('backend/js/todolist.js')}}"></script>
  <script src="{{asset('backend/js/bootbox.min.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  
<script src="{{asset('backend/js/form-validation.js')}}"></script>
<script src="{{asset('backend/js/bt-maxLength.js')}}"></script>

<script src="{{asset('backend/js/dashboard.js')}}"></script>




<script>
  $(document).on("click", "#delete", function(e){
  e.preventDefault();
  var link = $(this).attr("href");
  bootbox.confirm("Voulez-vous supprimer cet element ?", function(confirmed){
    if (confirmed){
        window.location.href = link;
      };
    });
  });
</script>


  
  <!-- End custom js for this page-->

    
    </body>

    </html>
    