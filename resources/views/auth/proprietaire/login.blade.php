
@extends('layouts.website-layout')

@section('titre', 'Connectez-vous')


@section('style')
<style>

          .gradient-custom-2 {
      /* fallback for old browsers */
      background: #fccb90;

      /* Chrome 10-25, Safari 5.1-6 */
      background: -webkit-linear-gradient(to right, #175155, #175155, #175155, #175155);

      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background: linear-gradient(to right, #175155, #175155, #175155, #175155);
      }



          #rr{
              margin-top:80px;
          }


</style>
{{-- style="background-image: url('assets/img/6.jpg')" --}}
@endsection

@section('content')








{{-- <section class="h-100 gradient-form" style="backgound-size:cover;background-repeat: no-repeat; background-image: url('{{ asset('assets/img/breadcrumbs-bg.jpg') }}')">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-10">
          <div class="card rounded-3 text-black">
            <div class="row g-0">

              <div class="col-lg-8">

                <div class="card-body p-md-5 mx-md-4">

                        <div class="app-auth-branding mb-4 text-center"><a class="app-logo"><img class="logo-icon me-2" style="border-radius: 50%" src="{{ asset('assets/img/logo.png') }}" alt="logo"></a></div>
                        <h2 style="" class="auth-heading text-center mb-5 fw-bold">ESPACE DE CONNEXION</h2>

                        @if(Session::get('success'))
                        <div class="alert alert-success py-3">{{Session::get('success')}}</div>
                        @endif

                       @if(Session::get('error'))
                       <div class="alert alert-danger py-3">{{Session::get('error')}}</div>
                      @endif

                        <div class="auth-form-container text-start">

                            <form class="auth-form login-form" method="POST" action="{{ route('proprietaire.handleLogin') }}">
                                @method('post')
                                @csrf

                                <div class="email mb-3">
                                    <input id="email" name="email" type="email" class="form-control signin-email" placeholder="exemple@gmail.com" required="required">
                                    @error('email')
                                    <div style="color: red" class="text-danger">{{$message}}</div>
                                    @enderror
                                </div><!--//form-group-->

                                <div class="password mb-3">
                                    <input id="password" name="password" type="password" class="form-control signin-password" placeholder="Mot de passe" required="required">
                                    @error('password')
                                    <div style="color: red" class="text-danger ">{{$message}}</div>
                                    @enderror

                                    <div class="extra mt-3 row justify-content-between">
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input  class="form-check-input" type="checkbox" value="" id="RememberPassword">
                                                <label class="form-check-label" for="RememberPassword">
                                                Remember me
                                                </label>
                                            </div>
                                        </div><!--//col-6-->
                                        <div class="col-6">
                                            <div class="forgot-password text-end">
                                                <a href="reset-password.html" style="color: #10373a; font-weight:bold;">Mot de passe oublié?</a>
                                            </div>
                                        </div><!--//col-6-->
                                    </div><!--//extra-->
                                </div><!--//form-group-->

                                <div class="text-center">
                                    <button type="submit" style=" background-color:#008374;color: white; border:none" class="btn btn-primary w-100 theme-btn mx-auto btn-block fa-lg gradient-custom-2 mb-3">Connexion</button>

                                </div>
                            </form>

                            <div class="auth-option text-center pt-5">Pas de compte? Créer un compte  <a  style="color: #10373a; font-weight:bold;" class="text-link" href="{{ route('proprietaire.register') }}" >ici</a>.</div>
                        </div><!--//auth-form-container-->



                </div>

              </div>
              <div style="background-color:#008374 ; " class="col-lg-4 d-flex align-items-center gradient-custom-2">
                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                  <h4 class="mb-4" >PROPRIETAIRE</h4>
                  <p> Se connecter en tant que proprietaire</p>
                  <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
</section> --}}



<!-- Section: Design Block -->
<section class="background-radial-gradient overflow-hidden"  style="background-size:cover;background-image: url('{{ asset('assets/img/img_fonf/1.jpg') }}')">
  <style>
    .background-radial-gradient {

    }



    .bg-glass {
      background-color: hsla(0, 0%, 100%, 0.745) !important;
      backdrop-filter: saturate(200%) blur(25px);
    }
  </style>
  {{-- <h3>Mettez votre logement sur <span style="color: #17de92" >HomeAway</span></h3> --}}

  <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5" >
    <div class="row gx-lg-5 align-items-center mb-5">
      <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
        <h1 class="my-5 display-5 fw-bold ls-tight" style="color: black">
           Bienvenue sur <br />
          <span style="color: blue">HomeAway</span>
        </h1>
        <h4>Connectez-vous à l'Espace Propriétaire</h4>
        <p class="mb-4 opacity-70" style="color: hsl(240, 1%, 34%)">
          Lorem ipsum dolor, sit amet consectetur adipisicing elit.
          Temporibus, expedita iusto veniam atque, magni tempora mollitia
          dolorum consequatur nulla, neque debitis eos reprehenderit quasi
          ab ipsum nisi dolorem modi. Quos?
        </p>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

        <div class="card bg-glass">
          <div class="card-body px-4 py-5 px-md-5">


            @if(Session::get('success'))
            <div class="alert alert-success py-3">{{Session::get('success')}}</div>
            @endif

           @if(Session::get('error'))
           <div class="alert alert-danger py-3">{{Session::get('error')}}</div>
          @endif

            <form class="auth-form login-form" method="POST" action="{{ route('proprietaire.handleLogin') }}">
                @method('post')
                @csrf

                <div class="app-auth-branding mb-4 text-center"><a class="app-logo"><img class="logo-icon me-2" style="border-radius: 50%; width:80px;height:80px" src="{{ asset('assets/img/img_fonf/HomeAway_20240630_162126_0000-removebg-preview.png') }}" alt="logo"></a></div>

              {{-- <!-- 2 column grid layout with text inputs for the first and last names -->
              <div class="row">
                <div class="col-md-6 mb-4">
                  <div data-mdb-input-init class="form-outline">
                    <input type="text" id="form3Example1" class="form-control" />
                    <label class="form-label" for="form3Example1">First name</label>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div data-mdb-input-init class="form-outline">
                    <input type="text" id="form3Example2" class="form-control" />
                    <label class="form-label" for="form3Example2">Last name</label>
                  </div>
                </div>
              </div> --}}

              <!-- Email input -->
              <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="email">Adresse Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="exemple@gmail.com" required="required">
                @error('email')
                <div style="color: red" class="text-danger">{{$message}}</div>
                @enderror
              </div>

              <!-- Password input -->
              <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="password">Mot de passe</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Mot de passe" required="required">
                @error('password')
                <div style="color: red" class="text-danger ">{{$message}}</div>
                @enderror
              </div>

              <!-- Checkbox -->
              <div class="form-check d-flex justify-content-start mb-4">
                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
                <label class="form-check-label" for="form2Example33" >
                  Se souvenir de moi
                </label>
                <div style="margin-left:10px ">
                    <a href="reset-password.html" style="color: blue; " >Mot de passe oublié?</a>
                </div>
              </div>


              <!-- Submit button -->
              <button type="submit" data-mdb-button-init data-mdb-ripple-init style="background-color: blue;border:none ; color:white" class="btn fw-bold btn-block mb-4">
                Connectez-vous
              </button>

              <div class="auth-option text-center pt-5 mb-5">Pas de compte? <a  style="color: blue; font-weight:bold;" class="text-link"  href="{{ route('proprietaire.register') }}" >Inscrivez-vous</a></div>


              <!-- Register buttons -->
              {{-- <div class="text-center">
                <p>ou connectez-vous avec:</p>
                 <button  type="button" data-mdb-button-init data-mdb-ripple-init style="color: blue" class="btn btn-link btn-floating mx-1">
                  <i class="bi bi-google"></i>
                </button>

                <button  type="button" data-mdb-button-init data-mdb-ripple-init style="color: blue" class="btn btn-link btn-floating mx-1">
                  <i class="bi bi-twitter"></i>
                </button>
                <p>En utilisant ce site Web, vous acceptez les <span style="color: #008374">Conditions générales d'utilisation</span> et de <span style="color: #008374">Déclaration sur la protection des données</span> de HomeAway</p>
              </div> --}}
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->





  @endsection
