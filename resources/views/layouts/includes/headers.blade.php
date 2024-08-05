{{-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#!">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">All Products</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                        <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex">
                <button class="btn btn-outline-dark" type="submit">
                    <i class="bi-cart-fill me-1"></i>
                    Cart
                    <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                </button>
            </form>
        </div>
    </div>
</nav>--}}

        {{-- <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="index.html"><span>HomeAway</span></a></h1>

      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="{{ route('acceuil') }}">Acceuil</a></li>
          <li><a class="nav-link scrollto" href="#about">A propos</a></li>

          <li class="dropdown"><a href="{{ route('chambres') }}"><span>Chambres</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                 </ul>
              </li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                 </ul>
              </li>
             </ul>
          </li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>

          @guest
              <li class="nav-item dropdown" style="list-style: none;">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"   style=" margin-left:15px;padding-right:25px; border-radius:15px; color:rgb(255, 255, 255); background-color: #1acc8d ;">Compte</a>
                <ul class="dropdown-menu" style="border-radius: 10px" aria-labelledby="navbarDropdown">
                          <li class="dropdown"><a href="#"><span>Locataire</span> <i class="bi bi-chevron-right"></i></a>
                            <ul style="border-radius: 10px">
                              <li><a href="{{ route('user.register') }}">Crée mon compte</a></li>
                              <li><a href="{{ route('user.login') }}">Me Connecter</a></li>
                            </ul>
                          </li>
                          <li class="dropdown"><a href="#"><span>Propriétaire</span> <i class="bi bi-chevron-right"></i></a>
                            <ul style="border-radius: 10px">
                                <li><a href="{{ route('proprietaire.register') }}">Inscrivez-vous</a></li>
                                <li><a href="{{ route('proprietaire.login') }}">Connectez-vous</a></li>
                            </ul>
                          </li>
                </ul>
              </li>
          @endguest

          @auth
          <a href="{{ route('user.logout') }}" style="background-color: #1acc8d ;padding-right:25px;border-radius:15px; color:white" class="btn btn-danger ms-3 ">Déconnexion</a>
          @endauth


        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

    </div>
  </header> --}}




















    <!-- ======= Header ======= -->
    <section id="topbar" class="topbar d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
          <div class="contact-info d-flex align-items-center">
            <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">aventrehouse@gmail.com</a></i>
            <i class="bi bi-phone d-flex align-items-center ms-4"><span>+229 970 000 97</span></i>
          </div>
          <div class="social-links d-none d-md-flex align-items-center">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
          </div>
        </div>
      </section><!-- End Top Bar -->

      <header id="header" class="header d-flex align-items-center">

        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
          <a href="index.html" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <img src="{{ asset('assets/img/img_fonf/HomeAway_.png') }}" alt="">
            <h1>HomeAway</h1>
          </a>
          <nav id="navbar" class="navbar">
            {{-- <!--  {{ route('chambres') }}--> --}}
            <ul>
              <li><a href="{{ route('acceuil') }}">Acceuil</a></li>
              {{-- <li><a href="#about">About</a></li> --}}
              <li><a href="{{ route('chambres') }}">Réserver</a></li>
              {{-- <li><a href="#contact">Contact</a></li> --}}
              @guest
              <div style="margin-left: 20px;"><a style="border-bottom:2px solid blue ; color: blue" href="{{ route('logement') }}">Mettez vos logements ici</a></div>
              <div style="margin-left: 20px" class="d-flex">
                    <a style=" margin-right:10px; border:2px solid rgba(19, 19, 211, 0.953) ;background-color:rgba(19, 19, 211, 0.953); border-radius:5px ; color: #ffffff" href="{{ route('user.register') }}">Créer un compte</a>
                    <a style=" border:2px solid rgba(19, 19, 211, 0.953) ;background-color:rgba(19, 19, 211, 0.953); border-radius:5px ; color: #ffffff" href="{{ route('user.login') }}">Connectez-vous</a>
              </div>
              @endguest

              @auth
              <div class="d-flex" style="margin-left: 20px">
              {{-- <div style="margin-left: 20px" ></div> --}}


              <li class="dropdown">
                <a style="" href="#">
                    <span style="margin-top:5px; margin-right:10px;border: 2px solid blue; background-color:blue; border-radius:7px; color:white; height:30px">{{ auth()->user()->name }}</span>
                    @if (auth()->user()->photo)
                    <img src="{{ asset('images/' .auth()->user()->photo) }}" alt="Profile" style="border-radius: 50% ;border: 2px solid blue; width:55px;height:55px" class="rounded-circle">
                    @else
                    <img src="{{ asset('assets/img/profil_null.jpg') }}" alt="profil" style="border-radius: 50% ;border: 2px solid blue; width:35px;height:35px">
                    @endif

                </a>
                <ul>

                  {{-- <li><a href="#">Drop Down 1</a></li> --}}
                  <li><a href="{{ route('reservationLocataire.index') }}">Voir mes réservations</a></li>
                  <li><a href="{{ route('ProfilLocataire') }}">Mon Profil</a></li>
                  <hr>
                  <li><a href="{{ route('user.logout') }}">Se déconnexion</a></li>
                </ul>
              </li>
              </div>
              @endauth


            </ul>

          </nav><!-- .navbar -->

          <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
          <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
      </header><!-- End Header -->
      <!-- End Header -->
