@extends('layouts.website-layout')

@section('content')
<div class="container-fluid mt-5 mb-5">
    <div class="row">
        @foreach ($mes_chambres as $chambre)
        <div class="col-md-4">
                <div class="card">
                    @if ($chambre->image_path)
                    <img src="{{ asset('storage/' .$chambre->image_path) }}" class="property-image"  style="height: 250px" alt="Property Image">
                   @else
                   <img src="" style="background-image: url('https://ui-avatars.com/api/?backgroung=000&color=fff&name={{ $chambre->name }})') ;"  class="property-image" alt="Property Image">
                   @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $chambre->name }}</h5>
                        <p class="card-text">{{$chambre->ville}}, {{ $chambre->adresse }}</p>
                        <p class="card-text">10 Exceptionnel · 5 expériences vécues</p>
                        <p class="card-text">Situé à {{$chambre->ville}}, à seulement 1,2 km du goudron, la {{ $chambre->name }} d'extrémité de 40 m2,</p>
                        <a href="#" class="btn btn-primary">Réserver cet appartement</a>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('assets/img/chambres/img.jpg') }}" class="card-img-top" alt="Waterway Villa">
                <div class="card-body">
                    <h5 class="card-title">Waterway Villa! 1950sqft, End Unit, Ground Floor, Huge Pool!</h5>
                    <p class="card-text">Myrtle Beach, États-Unis</p>
                    <p class="card-text">10 Exceptionnel · 5 expériences vécues</p>
                    <p class="card-text">Situé à Myrtle Beach, à seulement 1,2 km du parcours de golf Barefoot Resort Norman, le Waterway Villa! Unité d'extrémité de 1950 m2, rez-de-chaussée,...</p>
                    <a href="#" class="btn btn-primary">Réserver cet appartement</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('assets/img/chambres/img.jpg') }}" class="card-img-top" alt="The Beach Is Back">
                <div class="card-body">
                    <h5 class="card-title">The Beach Is Back</h5>
                    <p class="card-text">North Myrtle Beach, Myrtle Beach</p>
                    <p class="card-text">10 Exceptionnel · 7 expériences vécues</p>
                    <p class="card-text">Situé à Myrtle Beach, à quelques pas de la plage de Cherry Grove et à 13 km du théâtre Alabama, l'établissement The Beach Is Back il dispose d'une plag...</p>
                    <a href="#" class="btn btn-primary">Réserver cet appartement</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('assets/img/chambres/img.jpg') }}" class="card-img-top" alt="Oceanview Paradise at the Beach">
                <div class="card-body">
                    <h5 class="card-title">Oceanview Paradise at the Beach</h5>
                    <p class="card-text">Downtown Myrtle Beach, Myrtle Beach</p>
                    <p class="card-text">9.0 Fabuleux · 5 expériences vécues</p>
                    <p class="card-text">Situé à 30 mètres du centre de Myrtle Beach, l'Oceanview Paradise at the Beach propose une plage privée et une piscine extérieure.</p>
                    <a href="#" class="btn btn-primary">Réserver cet appartement</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
