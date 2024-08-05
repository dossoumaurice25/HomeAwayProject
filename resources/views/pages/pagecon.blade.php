@extends('layouts.website-layout')

@section('titre' , 'Acceuil')

@section('content')
  <!-- ======= Pricing Section ======= -->
  <section id="pricing" class="pricing sections-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h2>Inscription | Connexion Locataire</h2>
        <p>Créer un compte si vous êtes un nouveau locataire | Connectez-vous si vous avez déjà un compte</p>
      </div>

      <div class="row g-4 py-lg-5" data-aos="zoom-out" data-aos-delay="100">

        <div class="col-lg-4">
          <div class="pricing-item">
            <h3>INSCRIPTION</h3>

            <ul>
              <li><i class="bi bi-check"></i> Fournir des informations personnelles</li>
              <li><i class="bi bi-check"></i> Créer votre compte en tant que locataire</li>
            </ul>
            <div class="text-center"><a href="{{ route('user.register') }}" class="buy-btn">Créer un compte</a></div>
          </div>
        </div><!-- End Pricing Item -->

        <div style="" class="col-lg-4">
          <div style="background-size: cover;background-image: url('{{ asset('assets/img/hero-bg-abstract.jpg') }}')" class="pricing-item featured">
            <h3 style="font-size: 30px"> Bienvenue sur <span style="color: #0ae388">AvantureHOUSE</span> </h3>

            <ul>
              <li> Cet espace est reservé uniquement aux locataires de nos chambres et guesthouse</li>
            </ul>
          </div>
        </div><!-- End Pricing Item -->

        <div class="col-lg-4">
          <div class="pricing-item">
            <h3> CONNEXION</h3>
            <ul>
              <li><i class="bi bi-check"></i> Identifiez-vous pour acceder à votre compte</li>
              <li><i class="bi bi-check"></i> Entrer les bonnes coordonnées de connexion</li>
            </ul>
            <div class="text-center"><a href="{{ route('user.login') }}" class="buy-btn">Se connecter</a></div>
          </div>
        </div><!-- End Pricing Item -->

      </div>

    </div>
  </section><!-- End Pricing Section -->

@endsection
