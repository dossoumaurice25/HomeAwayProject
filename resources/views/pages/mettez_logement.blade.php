@extends('layouts.website-layout')

@section('titre' , 'Acceuil')

@section('style')

<style>
   section,h1,h2 {
            font-family: Arial, sans-serif;
        }
        .bg-custom {
            background-color: #ffffff;
        }
        .text-primary-color {
            color: #003366;
        }
        .text-secondary-color {
            color: #6c757d;
        }


        .card-icon {
            font-size: 2em;
            margin-bottom: 10px;
        }
        .card-header {
            font-size: 1.25em;
            font-weight: bold;
        }
        .card {
            /* border: none; */
            /* background-color: rgba(255, 255, 255, 0.308); */
            border-radius: 10px;
        }
        .card-body{
          background-color: rgba(255, 255, 255, 0)
        }
</style>
@endsection

@section('content')

  {{-- <div class="section-header mt-5">
    <h2>Rejoignez Notre Communauté de Propriétaires et Maximisez Vos Revenus sur <span style="color: #17de92">HomeAway</span></h2>
     <p>Vous devez forcement être un propriétaire avant de créer un compte ou connecter à un compte existante</p>
  </div> --}}

  <section class="bg-custom">
    <div class="container">
        <h1 class="text-center text-primary-color mt-5">ENREGISTREZ VOTRE DOMICILE SUR HOMEWAY</h1>
        <p class="text-center text-secondary-color mb-5">Obtenez les réservations que vous avez manquées en vous enregistrant gratuitement sur HomeAway aujourd'hui !</p>
        <div class="row">
            <div class="col-md-12">

              <div class="card mb-4"  style="border: none;  box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.429);">
                      <div class="row">
                        <div class="col-6">
                          <div class="card-body text-left">
                            <h2 class="card-title text-primary-color">LOGEMENT</h2>
                            <p class="card-text">Établissements à une seule unité tels qu'une maison, un appartement ou un logement en copropriété</p>
                            <a href="{{ route('proprietaire.register') }}" class="btn" style="background-color: blue;color:white">Enregistrer mon LOGEMENT</a>
                          </div>
                        </div>
                        <div class="col-6" style="border-top-left-radius:80px;border-bottom-left-radius:80px;;border-bottom-right-radius:10px;;border-top-right-radius:10px;background-image: url('{{ asset('assets/img/img.jpg') }}')">

                        </div>
                      </div>

              </div>

            </div>
        </div>
    </div>
    </section>


  <div class="container" style="width: 100%" >
    {{-- <h1 class="text-center" style="color:blue">Avec HomeAway , c'est facile de se lancer </h1> --}}
    <img src="{{asset('assets/img/hed1.png')}}" alt="Fixed image" class="img-fluid " style="max-width:100%">
  </div>









  <div class="container mt-5">
    <h2 class="text-center mb-4">Il existe un multitude de raisons de s'enregistrer sur Agoda.</h2>
    <div class="row">
        <div  class="col-md-6 col-lg-4 mb-3 ">
            <div class="card bg-light-blue p-3 alert alert-primary">
                <div class="card-body">
                    <div class="card-icon text-primary">
                        <i class="fas fa-hand-holding-usd"></i>
                    </div>
                    <div class="card-header mb-1">Obtenir rapidement des réservations</div>
                    <p class="card-text mb-5">Nos données montrent que la plupart des nouveaux inscrits obtiennent une réservation dans les trois mois après avoir rejoint notre communauté.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-3">
            <div class="card bg-light-green p-3  alert alert-success">
                <div class="card-body">
                    <div class="card-icon text-success">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="card-header">Démarquez-vous de la concurrence</div>
                    <p class="card-text">Les nouveaux inscrits bénéficient d'un boost de visibilité. Faites en sorte que votre établissement obtienne le plus d'attention possible grâce aux options que nous vous proposons pour vous aider à accroître votre exposition.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-3 ">
            <div class="card bg-light-yellow p-3 alert alert-warning">
                <div class="card-body">
                    <div class="card-icon text-warning">
                        <i class="fas fa-hands-helping"></i>
                    </div>
                    <div class="card-header mb-1">Aide</div>
                    <p class="card-text mb-4">Vous pouvez obtenir de l'aide via la documentation en ligne, le widget d'aide sur YCS, Host Manage, ainsi que par e-mail ou en envoyant vos questions via le système de discussion instantanée.</p>
                </div>
            </div>
        </div>


        <div class="row">
          <div class="col-md-6 col-lg-6 mb-3 ">
            <div style="margin-right: 10px" class="card bg-light-pink p-3 alert alert-danger">
                <div class="card-body">
                    <div class="card-icon text-danger" >
                        <i  class="fas fa-users"></i>
                    </div>
                    <div class="card-header mb-2">Atteindre un public international</div>
                    <p class="card-text mb-4" >Votre établissement sera visible pour plus de 9 millions d'utilisateurs d'Agoda dans le monde entier.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 mb-3 ">
            <div style="margin-left: 0px" class="card bg-light-purple p-3 alert alert-dark">
                <div class="card-body">
                    <div class="card-icon text-purple">
                        <i class="fas fa-building"></i>
                    </div>
                    <div class="card-header">Toutes les catégories d'établissements peuvent être enregistrées</div>
                    <p class="card-text">Inscrivez un hôtel, un appartement, une maison et d'autres types d'établissement gratuitement sur Agoda.</p>
                </div>
            </div>
        </div>
        </div>

    </div>
</div>










  <section  class="portfolio sections-bg">
    <div class="container" data-aos="fade-up">


     <h3 class="fw-bold">Mettez votre logement sur <span style="color: blue" >HomeAway</span> avec une protection complète</h3>
     <p>Vous possédez une chambre ou une guesthouse? Notre plateforme de location est
        votre alliée pour optimiser vos réservations et gérer vos biens en toute simplicité.
        Inscrivez-vous dès aujourd'hui pour accéder à un large réseau de locataires potentiels,
        des outils de gestion efficaces et une assistance dédiée. Profitez d'une visibilité accrue,
        de la sécurité de nos vérifications et d'un support disponible 24/7. Connectez-vous
        maintenant pour découvrir comment notre plateforme peut transformer votre expérience de
        location et augmenter vos revenus sans effort supplémentaire!</p>


      {{-- <div class="container" >
        <div class="row link-container" style=" padding:20px; margin:20px; text-align:center">
            <div class="col-12 col-md-6 mb-2 mb-md-0 " >
                <a href="{{ route('proprietaire.register') }}" style="border-radius: 50px; background-color:blue; border:none" class="btn fw-bold btn-primary btn-block">Ceéer mon compte</a>
            </div>
            <div class="col-12 col-md-6" >
                <a href="{{ route('proprietaire.login') }}" style="border-radius: 50px; background-color:blue; border:none" class="btn fw-bold btn-primary btn-block">Me connecter</a>
            </div>

        </div>
      </div> --}}


      <div class="container-fluid d-flex justify-content-between align-items-center">
        <div class="header-logo">
          <img src="{{ asset('assets/img/img_fonf/HomeAway_20240630_162126_0000-removebg-preview.png') }}" alt="">
          <h5 class="fw-bold mt-2" style="color: blue">HomeAway</h5>
            <span class="dot dot-red"></span>
            <span class="dot dot-green"></span>
            <span class="dot dot-yellow"></span>
            <span class="dot dot-blue"></span>
            <span class="dot dot-purple"></span>
        </div>
        <div class="d-flex">
            <a href="{{ route('proprietaire.login') }}" style="border:  1px solid blue; color:blue;border-radius:20px" class="btn mr-2">Connectez-vous pour gérer votre établissement</a>
            <a href="{{ route('proprietaire.register') }}" style="background-color:blue;color:white;border-radius:20px" class="btn ">Inscrivez votre logement</a>
        </div>
    </div>


    <style>
      .header-logo {
          display: flex;
          align-items: center;
      }

      .header-logo img {
          height: 30px;
      }

      .header-logo .dot {
          height: 10px;
          width: 10px;
          border-radius: 50%;
          display: inline-block;
          margin-left: 5px;
      }

      .dot-red { background-color: #ff5252; }
      .dot-green { background-color: #8bc34a; }
      .dot-yellow { background-color: #ffeb3b; }
      .dot-blue { background-color: #03a9f4; }
      .dot-purple { background-color: #9c27b0; }

      .btn-outline-custom {
          border-radius: 20px;
      }

      .btn-primary-custom {
          border-radius: 20px;
          background-color: #4285f4;
          border-color: #4285f4;
      }

  </style>






    </div>
  </section>

@endsection
