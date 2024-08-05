@extends('layouts.website-layout')

@section('style')

            <link href="{{ asset('assets/css/dashboardperso.css') }}" rel="stylesheet">
            <style>
                .label{
                    font-weight: 700;
                    color: rgb(52, 52, 131);
                }
            </style>

@endsection

@section('content')

<div class="card mt-5" style="border: 2px solid rgb(245, 245, 245); background-color:white;box-shadow: 2px 10px 10px 1px rgba(0, 0, 0, 0.185)">
    <div class="card-body">
      <h1 class="label mt-3">Profil</h1>

      <!-- Bordered Tabs -->
      <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-home" type="button" role="tab" aria-controls="home" aria-selected="true">Informations personnelles</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Remplir son profil</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#bordered-contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Mot de passe oublié </button>
        </li>
      </ul>
      <div class="tab-content pt-2" id="borderedTabContent">
        <div class="tab-pane fade show active" id="bordered-home" role="tabpanel" aria-labelledby="home-tab">

            <div class="tab-pane fade show active profile-overview col-10 offset-1" id="profile-overview">

                <div class="row">
                    <div class="col-4">
                        @if (auth()->user()->photo)
                        <div class="row mt-5 mb-3" style="width: 100%;height: 350px;border: 2px solid blue;border-radius:20px; background-image: url('{{ asset('images/' .auth()->user()->photo) }}');background-size:cover" >
                        </div>
                        @else
                        <div class="row mt-5 mb-3" style="width: 100%;height: 350px;border: 2px solid blue;border-radius:20px; background-image: url('{{ asset('assets/img/profil_null.jpg') }}');background-size:cover" >
                        @endif
                    </div>
                    <div class="col-8">
                        <h5 class="card-title label"> Bio</h5>
                        <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Fuga sequi sed ea saepe at unde.</p>

                        <h5 class="card-title label">Profil</h5>
                        <div class="row mb-3">
                        <div class="col-lg-3 col-md-4 label ">Nom & Prénom</div>
                        <div class="col-lg-9 col-md-8">{{auth()->user()->name}}</div>
                        </div>

                        <div class="row mb-3">
                        <div class="col-lg-3 col-md-4 label">Profession</div>
                        <div class="col-lg-9 col-md-8">{{ auth()->user()->profession }}</div>
                        </div>

                        <div class="row mb-3">
                        <div class="col-lg-3 col-md-4 label">Pays</div>
                        <div class="col-lg-9 col-md-8">{{ auth()->user()->pays }}</div>
                        </div>

                        <div class="row mb-3">
                        <div class="col-lg-3 col-md-4 label">Adresse</div>
                        <div class="col-lg-9 col-md-8">{{ auth()->user()->adresse }}</div>
                        </div>

                        <div class="row mb-3">
                        <div class="col-lg-3 col-md-4 label">Téléphone</div>
                        <div class="col-lg-9 col-md-8">(+229) {{ auth()->user()->telephone }}</div>
                        </div>

                        <div class="row mb-3">
                        <div class="col-lg-3 col-md-4 label">Email</div>
                        <div class="col-lg-9 col-md-8">{{auth()->user()->email}}</div>
                        </div>

                    </div>
                </div>





            </div>


        </div>

        <div class="tab-pane fade" id="bordered-profile" role="tabpanel" aria-labelledby="profile-tab">


              <!-- Profile Edit Form -->
                <form action="{{ route('updateProfilLocataire') }}" method="POST" class="col-8 offset-2  mt-5" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                  <div class="row mb-3">
                    <label for="photo" class="col-md-4 col-lg-3 col-form-label label">Photo de profil</label>
                    <div class="col-md-8 col-lg-9">
                        <input type="file" class="form-control" id="photo" name="photo">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="name" class="col-md-4 col-lg-3 col-form-label label">Nom & Prénom</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="name" type="text" class="form-control" id="name" value="{{auth()->user()->name}}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="bio" class="col-md-4 col-lg-3 col-form-label label">Bio</label>
                    <div class="col-md-8 col-lg-9">
                        <textarea class="form-control" id="bio" name="bio">{{ auth()->user()->bio }}</textarea>                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="profession" class="col-md-4 col-lg-3 col-form-label label">Profession</label>
                    <div class="col-md-8 col-lg-9">
                        <input type="text" class="form-control" id="profession" name="profession" value="{{ auth()->user()->profession }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="pays" class="col-md-4 col-lg-3 col-form-label label">Pays</label>
                    <div class="col-md-8 col-lg-9">
                        <input type="text" class="form-control" id="pays" name="pays" value="{{ auth()->user()->pays }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="adresse" class="col-md-4 col-lg-3 col-form-label label">Adresse</label>
                    <div class="col-md-8 col-lg-9">
                        <input type="text" class="form-control" id="adresse" name="adresse" value="{{ auth()->user()->adresse }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="telephone" class="col-md-4 col-lg-3 col-form-label label">Télephone</label>
                    <div class="col-md-8 col-lg-9">
                        <input type="text" class="form-control" id="telephone" name="telephone" value="{{ auth()->user()->telephone }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="email" class="col-md-4 col-lg-3 col-form-label label">Email</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="email" type="email" class="form-control" id="email" value="{{auth()->user()->email}}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="carte_id" class="col-md-4 col-lg-3 col-form-label label">Pièce d'identité</label>
                    <div class="col-md-8 col-lg-9">
                        <input type="file" class="form-control" id="carte_id" name="carte_id">
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Enrégistrer les modifications</button>
                  </div>
                </form><!-- End Profile Edit Form -->


        </div>
        <div class="tab-pane fade" id="bordered-contact" role="tabpanel" aria-labelledby="contact-tab">
          Saepe animi et soluta ad odit soluta sunt. Nihil quos omnis animi debitis cumque. Accusantium quibusdam perspiciatis qui qui omnis magnam. Officiis accusamus impedit molestias nostrum veniam. Qui amet ipsum iure. Dignissimos fuga tempore dolor.
        </div>
      </div><!-- End Bordered Tabs -->

    </div>
  </div>

@endsection
