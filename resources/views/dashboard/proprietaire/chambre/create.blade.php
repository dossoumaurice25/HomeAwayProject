@extends('layouts.proprietaire-dashboard-layout')

@section('content')

<div class="pagetitle">
    <h1>Gestion des Chambres</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Ajouter une chambre</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <div class="col-12">
    <div class="card recent-sales overflow-auto">

      <div class="card-body">
        <h5 class="card-title" style="font-weight: bold"> Formulaire d'ajout de chambre<span></span></h5>

                    @if(Session::get('success'))
                      <div class="alert alert-success py-3">{{Session::get('success')}}</div>
                    @endif

                    @if(Session::get('error'))
                      <div class="alert alert-danger py-3">{{Session::get('error')}}</div>
                    @endif

        <form action="{{ route('chambre.handleCreate') }}" enctype="multipart/form-data" method="POST">
            @method('post')
            @csrf
            <div class="form-group mb-0">
                <label for="image"><h5 class="card-title">Photo de la chambre</h5></label>
                <input type="file" name="image" id="image" class="form-control"  required>
            </div>

            <div class="col-12 d-flex mb-2">
                <div class="form-group mb-0 col-7 ">
                    <label for="name"><h5 class="card-title">Libellé </h5></label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Ex: Chambre" required>
                    @error('name')
                        <div class="text text-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group mb-0 col-4" style="margin-left: 80px">
                    <label for="price"><h5 class="card-title">Prix </h5></label>
                    <input type="number" name="price" id="price" class="form-control" placeholder="Ex: 20 000.00" required>
                    @error('price')
                        <div class="text text-danger">{{$message}}</div>
                    @enderror
                </div>

            </div>

            <div class="col-12 d-flex mb-2">
                <div class="form-group mb-0 col-7 ">
                    <label for="adresse"><h5 class="card-title">Adresse </h5></label>
                    <input type="text" name="adresse" id="adresse" class="form-control" placeholder="Ex: XXXXX " required>
                    @error('adresse')
                        <div class="text text-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group mb-0 col-4" style="margin-left: 80px">
                    <label for="ville"><h5 class="card-title">Ville </h5></label>
                    <input type="text" name="ville" id="ville" class="form-control" placeholder="Ex: XXXX" required>
                    @error('ville')
                        <div class=" text text-danger">{{$message}}</div>
                    @enderror
                </div>

            </div>


            <div class="form-group mb-2">
                <label for="description"><h5 class="card-title">Description de chambre </h5></label>
                <textarea name="description" class="form-control" id="description" cols="30" rows="2"></textarea>
                    @error('description')
                        <div class="text text-danger">{{$message}}</div>
                    @enderror
            </div>


                <div class="form-group mb-2 d-flex justify-content-end align-items-center" >
                    <button type="submit" class="btn btn-primary " style="background-color: #175157 ; border:none ; color:white">Enrégistrer la chambre</button>
                </div>
        </form>

      </div>

    </div>
  </div><!--


@endsection
