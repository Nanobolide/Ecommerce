<nav class="sidebar sidebar-offcanvas col-lg-2" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="index.html">
        <i class="ti-home menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
        <i class="ti-clipboard menu-icon"></i>
        <span class="menu-title">Ajouter</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="form-elements">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="{{URL::to('/ajoutercategorie')}}">Ajouter Catégorie</a></li>
          <li class="nav-item"><a class="nav-link" href="{{URL::to('/ajouterproduit')}}">Ajouter Produits</a></li>
          <li class="nav-item"><a class="nav-link" href="{{URL::to('/ajouterslider')}}">Ajouter Sliders</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
        <i class="ti-layout menu-icon"></i>
        <span class="menu-title">Affichages</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="tables">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{URL::to('/categorie')}}">Catégories</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{URL::to('/produit')}}">Produit</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{URL::to('/slider')}}">Slider</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{URL::to('/commande')}}">commande</a></li>
        </ul>
      </div>
    </li> 
  </ul>
</nav>