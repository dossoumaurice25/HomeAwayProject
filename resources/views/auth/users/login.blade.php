@extends('layouts.website-layout')

@section('titre', 'Connectez-vous')

@section('style')

    <style>
    #main {
    margin-top: 60px;
    padding: 20px 30px;
    transition: all 0.3s;
    }

    @media (max-width: 1199px) {
    #main {
        padding: 20px;
    }
    }

    @media (min-width: 1200px) {
    #main{
    margin-left: 300px;
    }
    }

    @media (min-width: 1200px) {

    #main{
    margin-left: 0;
    }
    }


    /* Card */
    .card {
    margin-bottom: 30px;
    border: none;
    border-radius: 5px;
    box-shadow: 0px 0 30px rgba(1, 41, 112, 0.1);
    }

    .card-header,
    .card-footer {
    border-color: #ebeef4;
    background-color: #fff;
    color: #798eb3;
    padding: 15px;
    }

    .card-title {
    padding: 20px 0 15px 0;
    font-size: 18px;
    font-weight: 500;
    color: #012970;
    font-family: "Poppins", sans-serif;
    }

    .card-title span {
    color: #899bbd;
    font-size: 14px;
    font-weight: 400;
    }

    .card-body {
    padding: 0 20px 20px 20px;
    }

    .card-img-overlay {
    background-color: rgba(255, 255, 255, 0.6);
    }

    </style>

@endsection

@section('content')


<main >
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="{{ asset('assets/img/img_fonf/HomeAway_20240630_162126_0000-removebg-preview.png') }}" alt="" style="width: 100px; height:100px">
                  <h5 class="card-title text-center pb-0 fs-4 fw-bold">HomeAway</h5>
                </a>
              </div>

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Connectez-vous à votre compte</h5>
                    <p class="text-center small">Se connecter en tant que locataire <br> Entrer votre email & mot de passe </p>
                  </div>

                  @if(Session::get('error'))
                  <div class="alert alert-danger py-3">{{Session::get('error')}}</div>
                  @endif

                  @if(Session::get('success'))
                  <div class="alert alert-success py-3">{{Session::get('success')}}</div>
                  @endif


                  <form class="row g-3 needs-validation" method="POST" action="{{ route('handleUserLogin') }}" novalidate>
                    @method('post')
                    @csrf

                    <div class="col-12">
                      <label for="email" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        <input type="email" name="email" id="email" class="form-control"  required="required">
                        @error('email')
                        <div style="color: red" class="text-danger">{{$message}}</div>
                        @enderror
                       </div>
                    </div>

                    <div class="col-12">
                      <label for="password" class="form-label">Mot de passe</label>
                      <input type="password" name="password" id="password" class="form-control"  required="required">
                      @error('password')
                      <div style="color: red" class="text-danger ">{{$message}}</div>
                      @enderror
                     </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Se souvenir de moi</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn fw-bold w-100" style="background-color: blue;color:white" type="submit">Connexion</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Pas de compte ? <a href="{{ route('user.register') }}">Créer un compte</a></p>
                    </div>
                  </form>

                </div>
              </div>



            </div>
          </div>
        </div>

      </section>

    </div>
</main><!-- End #main -->


@endsection


































