@extends('layouts.website-layout')

@section('titre', 'Créer mon compte')


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




{{--
<section class="h-100 gradient-form" style="backgound-size:cover;background-repeat: no-repeat; background-image: url('{{ asset('assets/img/imga.jpg') }}')">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-10">
          <div class="card rounded-3 text-black">
            <div class="row g-0">
              <div class="col-lg-8">
                <div class="card-body p-md-5 mx-md-4">


                        <div class="app-auth-branding mb-4 text-center"><a class="app-logo" href="index.html"><img class="logo-icon me-2" style=" border-radius: 50%" src="{{ asset('assets/img/logo.png') }}" alt="logo"></a></div>
                        <h2 class="auth-heading text-center mb-4 fw-bold">ESPACE D'INSCRIPTION</h2>


                        @if(Session::get('success'))
                        <div class="alert alert-success py-3">{{Session::get('success')}}</div>
                        @endif

                        <div class="auth-form-container text-start mx-auto">
                            <form class="auth-form auth-signup-form" method="POST" action="{{ route('proprietaire.handleRegister') }}">
                                @method('post')
                                @csrf

                                <div class="email mb-3">
                                    <input id="name" name="name" value="{{ old('name') }}" type="text" class="form-control signup-name" placeholder="Nom & Prénom du Proprietaire" required="required">
                                    @error('name')
                                    <div style="color: red" class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="email mb-3">
                                    <input id="email" name="email" type="email" value="{{ old('email') }}" class="form-control signup-email" placeholder="email-proprietaire@gmail.com"  required="required">
                                    @error('email')
                                    <div style="color: red" class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="password mb-3">
                                    <input id="password" name="password" type="password" class="form-control signup-password" placeholder="Mot de passe du proprietaire" required="required">
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
                                    <button type="submit" style=" border:none; background-color:#008374 ;  color: white" class="btn btn-primary w-100 theme-btn mx-auto btn-block fa-lg gradient-custom-2 mb-3 ">CREER VOTRE COMPTE</button>
                                </div>
                            </form><!--//auth-form-->

                            <div class="auth-option text-center pt-5">Avez-vous déjà un compte? <a  style="color: #10373a; font-weight:bold;" class="text-link" href="{{ route('proprietaire.login') }}" >Connectez-vous</a></div>
                        </div><!--//auth-form-container-->



                </div>
              </div>
              <div style="background-color:#008374 ; " class="col-lg-4 d-flex align-items-center gradient-custom-2">
                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                  <h4 class="mb-4"style="color: white">PROPRIETAIRE</h4>
                  Regoindre en tant que proprietaire</p>
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
<section class="background-radial-gradient overflow-hidden" style="background-size:cover;background-image: url('{{ asset('assets/img/img_fonf/1.jpg') }}')">
    <style>
      .background-radial-gradient {
        background-color: hsl(0, 0%, 100%);
        background-image: radial-gradient(650px circle at 0% 0%,
            hsl(0, 0%, 100%) 15%,
            hsl(0, 0%, 100%) 35%,
            hsl(0, 0%, 100%) 75%,
            hsl(0, 0%, 100%) 80%,
            transparent 100%),
          radial-gradient(1250px circle at 100% 100%,
            hsl(0, 0%, 100%) 15%,
            hsl(0, 0%, 100%) 35%,
            hsl(0, 0%, 100%) 75%,
            hsl(0, 0%, 100%) 80%,
            transparent 100%);
      }

      #radius-shape-1 {
        height: 220px;
        width: 220px;
        top: -60px;
        left: -130px;
        background: radial-gradient(rgba(232, 231, 231, 0), rgba(255, 255, 255, 0));
        overflow: hidden;
      }

      #radius-shape-2 {
        border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
        bottom: -60px;
        right: -110px;
        width: 300px;
        height: 300px;
        background: radial-gradient(#17515700, #17515500);
        overflow: hidden;
      }

      .bg-glass {
        background-color: hsla(0, 0%, 100%, 0.826) !important;
        backdrop-filter: saturate(200%) blur(25px);
      }
    </style>
    {{-- <h3>Mettez votre logement sur <span style="color: #17de92" >HomeAway</span></h3> --}}

    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
      <div class="row gx-lg-5 align-items-center mb-5">
        <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
          <h1 class="my-5 display-5 fw-bold ls-tight" style="color: black">
             Inscrivez-vous sur <br />
            <span style="color: blue">HomeAway</span>
          </h1>
          <h4>Accedez à votre Espace Propriétaire</h4>
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

            <form class="auth-form auth-signup-form" method="POST" action="{{ route('proprietaire.handleRegister') }}">
                @method('post')
                @csrf

                  <div class="app-auth-branding mb-4 text-center"><a class="app-logo"><img class="logo-icon me-2" style="border-radius: 50%; width:80px;height:80px" src="{{ asset('assets/img/img_fonf/HomeAway_20240630_162126_0000-removebg-preview.png') }}" alt="logo"></a></div>


                 <!-- Name input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="name">Nom et Prénom</label>
                    <input type="text" id="name" value="{{ old('name') }}"  name="name" class="form-control" placeholder="Nom & Prénom" required="required">
                    @error('name')
                    <div style="color: red" class="text-danger">{{$message}}</div>
                    @enderror
                  </div>

                <!-- Email input -->
                <div data-mdb-input-init class="form-outline mb-4">
                  <label class="form-label" for="email">Adresse Email</label>
                  <input type="email" id="email" name="email"  value="{{ old('email') }}" class="form-control" placeholder="exemple@gmail.com" required="required">
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

                <div class="extra mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="RememberPassword">
                         J'accepte les <a href="#" class="app-link">Conditions générales d'utilisation</a> de <a href="#" class="app-link">HomeAway</a>.
                        </label>
                    </div>
                </div>


                <!-- Submit button -->
                <button type="submit" data-mdb-button-init data-mdb-ripple-init style="background-color: blue;border:none;color:white" class="btn fw-bold btn-block mb-4">
                  Créez votre compte
                </button>

                <div class="auth-option text-center pt-5 mb-5">Avez-vous déjà un compte? <a  style="color: blue; font-weight:bold;" class="text-link" href="{{ route('proprietaire.login') }}" >Connectez-vous</a></div>


                {{-- <!-- Register buttons -->
                <div class="text-center">
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
