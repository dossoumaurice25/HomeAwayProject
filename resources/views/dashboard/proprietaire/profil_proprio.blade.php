
@extends('layouts.proprietaire-dashboard-layout')


@section('content')

<div class="pagetitle">
    <h1>Profil</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Tableau de bord</a></li>
        <li class="breadcrumb-item">Pages</li>
        <li class="breadcrumb-item active">Profil</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

<section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            <a href="{{ asset('images/' .auth('proprietaire')->user()->photo) }}"><img src="{{ asset('images/' .auth('proprietaire')->user()->photo) }}" alt="Profile" class="rounded-circle">
            </a>
            <h2>{{auth('proprietaire')->user()->name}}</h2>
            <h3>{{ auth('proprietaire')->user()->profession }}</h3>
            <div class="social-links mt-2">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Apercu</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Mis à jour Profile</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Paramètres</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Changer le mot de passe</button>
              </li>

            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <h5 class="card-title">A propos de vous</h5>
                <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Fuga sequi sed ea saepe at unde.</p>

                <h5 class="card-title">Détails Profils</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Nom & Prénomkk</div>
                  <div class="col-lg-9 col-md-8">{{auth('proprietaire')->user()->name}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Profession</div>
                  <div class="col-lg-9 col-md-8">{{ auth('proprietaire')->user()->profession }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Pays</div>
                  <div class="col-lg-9 col-md-8">{{ auth('proprietaire')->user()->pays }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Adresse</div>
                  <div class="col-lg-9 col-md-8">{{ auth('proprietaire')->user()->adresse }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Téléphone</div>
                  <div class="col-lg-9 col-md-8">(+229) {{ auth('proprietaire')->user()->telephone }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8">{{auth('proprietaire')->user()->email}}</div>
                </div>

              </div>
















              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">



                <!-- Profile Edit Form -->
                <form action="{{ route('proprietaire.updateProfile') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                  <div class="row mb-3">
                    <label for="photo" class="col-md-4 col-lg-3 col-form-label">Photo de profil</label>
                    <div class="col-md-8 col-lg-9">
                        <input type="file" class="form-control" id="photo" name="photo">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="name" class="col-md-4 col-lg-3 col-form-label">Nom & Prénom</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="name" type="text" class="form-control" id="name" value="{{auth('proprietaire')->user()->name}}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="bio" class="col-md-4 col-lg-3 col-form-label">A propos de vous</label>
                    <div class="col-md-8 col-lg-9">
                        <textarea class="form-control" id="bio" name="bio">{{ auth('proprietaire')->user()->bio }}</textarea>                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="profession" class="col-md-4 col-lg-3 col-form-label">Profession</label>
                    <div class="col-md-8 col-lg-9">
                        <input type="text" class="form-control" id="profession" name="profession" value="{{ auth('proprietaire')->user()->profession }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="pays" class="col-md-4 col-lg-3 col-form-label">Pays</label>
                    <div class="col-md-8 col-lg-9">
                        <input type="text" class="form-control" id="pays" name="pays" value="{{ auth('proprietaire')->user()->pays }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="adresse" class="col-md-4 col-lg-3 col-form-label">Adresse</label>
                    <div class="col-md-8 col-lg-9">
                        <input type="text" class="form-control" id="adresse" name="adresse" value="{{ auth('proprietaire')->user()->adresse }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="telephone" class="col-md-4 col-lg-3 col-form-label">Télephone</label>
                    <div class="col-md-8 col-lg-9">
                        <input type="text" class="form-control" id="telephone" name="telephone" value="{{ auth('proprietaire')->user()->telephone }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="email" type="email" class="form-control" id="email" value="{{auth('proprietaire')->user()->email}}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="carte_id" class="col-md-4 col-lg-3 col-form-label">Pièce d'identité</label>
                    <div class="col-md-8 col-lg-9">
                        <input type="file" class="form-control" id="carte_id" name="carte_id">
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Enrégistrer les modifications</button>
                  </div>
                </form><!-- End Profile Edit Form -->

              </div>







              <div class="tab-pane fade pt-3" id="profile-settings">

                <!-- Settings Form -->
                <form>

                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Notifications emails</label>
                    <div class="col-md-8 col-lg-9">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="changesMade" checked>
                        <label class="form-check-label" for="changesMade">
                          Changes made to your account
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="newProducts" checked>
                        <label class="form-check-label" for="newProducts">
                          Information on new products and services
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="proOffers">
                        <label class="form-check-label" for="proOffers">
                          Marketing and promo offers
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                        <label class="form-check-label" for="securityNotify">
                          Security alerts
                        </label>
                      </div>
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                  </div>
                </form><!-- End settings Form -->

              </div>

              <div class="tab-pane fade pt-3" id="profile-change-password">
                <!-- Change Password Form -->
                <form>

                  <div class="row mb-3">
                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="password" type="password" class="form-control" id="currentPassword">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="newpassword" type="password" class="form-control" id="newPassword">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Change Password</button>
                  </div>
                </form><!-- End Change Password Form -->

              </div>

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>


@endsection
