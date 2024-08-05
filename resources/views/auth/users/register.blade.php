@extends('layouts.website-layout')

@section('titre', 'Créer mon compte')



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


{{-- <section class="h-100" style="background-image: url({{ asset('assets/img/hero-bg-abstract.jpg') }})">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">


                <div class="app-auth-branding mb-4 text-center"><a class="app-logo" href="index.html"><img class="logo-icon me-2" style="border-radius: 50%" src="{{ asset('assets/img/logo.png') }}" alt="logo"></a></div>
                <h2 class="auth-heading text-center mb-4">Créer mon compte</h2>
                        <p>Réjoindre en tant que locataire ou voyageur</p>


                        @if(Session::get('success'))
                        <div class="alert alert-success py-3">{{Session::get('success')}}</div>
                        @endif

                        <div class="auth-form-container text-start mx-auto">
                            <form class="auth-form auth-signup-form" method="POST" action="{{ route('handleUserRegister') }}">
                                @method('post')
                                @csrf

                                <div class="email mb-3">
                                    <input id="name" name="name" value="{{ old('name') }}" type="text" class="form-control signup-name" placeholder="Nom&Prénom" required="required">
                                    @error('name')
                                    <div style="color: red" class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="email mb-3">
                                    <input id="email" name="email" type="email" value="{{ old('email') }}" class="form-control signup-email" placeholder="Adresse email"  required="required">
                                    @error('email')
                                    <div style="color: red" class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="password mb-3">
                                    <input id="password" name="password" type="password" class="form-control signup-password" placeholder="Mot de passe" required="required">
                                    @error('password')
                                    <div style="color: red" class="text-danger ">{{$message}}</div>
                                    @enderror
                                </div>


                                <div class="extra mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="RememberPassword">
                                         I agree to Portal's <a href="#" class="app-link">Terms of Service</a> and <a href="#" class="app-link">Privacy Policy</a>.
                                        </label>
                                    </div>
                                </div><!--//extra-->

                                <div class="text-center">
                                    <button type="submit" style="background-color:#175157; border:none ; color: white" class="btn btn-primary w-100 theme-btn mx-auto btn-block fa-lg gradient-custom-2 mb-3 ">Créer mon compte</button>
                                </div>
                            </form><!--//auth-form-->

                            <div class="auth-option text-center pt-5">Avez-vous déjà un compte? <a  style="color: #10373a; font-weight:bold;" class="text-link" href="{{ route('user.login') }}" >Connectez-vous</a></div>
                        </div><!--//auth-form-container-->




                    </div>
                </div>
              </div>
            </div>
          </div>
</section> --}}

<main>
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
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Créer un compte</h5>
                    <p class="text-center small">Réjoindre en tant que locataire ou voyageur <br> Entrer vos informations personnelles pour accedez à votre compte</p>
                  </div>

                  @if(Session::get('success'))
                  <div class="alert alert-success py-3">{{Session::get('success')}}</div>
                  @endif

                  <form class="auth-form auth-signup-form" method="POST" action="{{ route('handleUserRegister') }}" novalidate>
                    @method('post')
                    @csrf

                    <div class="col-12">
                      <label for="name" class="form-label"> Nom & Prénom</label>
                      <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required="required">
                      @error('name')
                      <div style="color: red" class="text-danger">{{$message}}</div>
                      @enderror
                    </div>

                    <div class="col-12">
                      <label for="email" class="form-label"> Email</label>
                      <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required="required">
                      @error('email')
                      <div style="color: red" class="text-danger">{{$message}}</div>
                      @enderror
                    </div>


                    <div class="col-12">
                      <label for="password" class="form-label">Mot de passe</label>
                      <input type="password" name="password" class="form-control" id="password" required="required">
                      @error('password')
                      <div style="color: red" class="text-danger ">{{$message}}</div>
                      @enderror
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                        <div class="invalid-feedback">You must agree before submitting.</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn w-100 fw-bold" style="background-color: blue;color:white" type="submit">Créer un compte</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Avez-vous déjà un compte ? <a href="{{ route('user.login') }}" >Connectez-vous</a></p>
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
