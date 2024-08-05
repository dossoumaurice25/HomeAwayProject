@extends('layouts.website-layout')

@section('titre', 'Réservation')

@section('style')
<style>
    h4{
        color: blue;
        font-weight: bold
    }
    strong{
    }
</style>
@endsection

@section('content')


 <section style="background-size:cover">

    <div  class="container mb-5  mt-5 pt-5 pb-5">
        <div class="row">
            <div class="col-md-8" style="box-shadow: 0px 10px 1px rgba(232, 232, 232, 0.429);">
                <div class="row">
                    <div class="col-md-8">
                        <img src="{{ Storage::url($chambre->image_path) }}" alt="{{ $chambre->name }}" style="border-top-left-radius:10px;border-bottom-left-radius:10px" class="img-fluid h-100">
                    </div>
                    <div class="col-md-4">
                        <img src="{{ asset('assets/img/img_fonf/bedroom-6778193_1280.jpg') }}" alt="" style="border-top-right-radius:10px;" class="img-fluid mb-1 mt-1 h-50">
                        <img src="{{ asset('assets/img/chambres/douche.jpg') }}" style="border-bottom-right-radius:10px" class="img-fluid h-50">
                    </div>
                </div>
                <div class="col-12"  style="background-color: rgba(255, 255, 255, 0.776);border-radius:5px; padding-bottom:50px;padding-top:50px;padding-right:20px;padding-left:20px">

                     <div class="mt-1">
                        <h4 class="fw-bold" style="color: blue">Localisation :</h4>
                        <div id="map" style="height: 150px;" > <iframe style="border:0; width: 100%;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe></div>
                        <p>Située au cœur de la ville de {{ $chambre->ville }} plus precisement à {{ $chambre->adresse }}, notre chambre offre un accès facile aux principales attractions touristiques, aux restaurants et aux boutiques. Que vous soyez en voyage d'affaires ou en vacances, notre emplacement idéal vous permet de profiter pleinement de votre séjour.</p>
                    </div>

                    <h4 class="fw-bold mt-3" style="color: blue"><u>Description de la chambre :</u></h4>
                    <p>Bienvenue dans {{ $chambre->name }}, un havre de paix concu pour offrir confort et tranquillité.
                        Cette chambre spacieuse et limuneuse est parfaitement adaptée aux voyageurs seuls, couples ou petits groupes en
                        quête d'un séjour agréable.
                    </p>
                    <h4 class="fw-bold" style="color: blue"><u>Caractéristiques de la chambre :</u></h4>
                    <ul>
                        <li>Superficie : 25m<sup>2</sup>, offrant un espace généreux pour se détendre et se reposer.</li>
                        <li>Lit : un lit queen-size avec un matelas de qualités supérieure et des draps en coton pours un sommeil réparateur.</li>
                        <li>Décoration : Un designmoderne avec des touches de charme traditionnel, créant une atmosphère chaleureuse et acceuillante.</li>
                        <li>Salle de bain : Une salle de bain privée équipée d'une douche, de serviettes moelleuses et d'articles de toillettes gratuits.</li>
                    </ul>
                    <div class="row">
                        <div class="col-6 rating mb-3">
                            <i style="color: blue" class="bi bi-heart-fill"></i>
                            <span>Coup de cœur voyageurs</span>
                        </div>
                        <div class="col-6 rating mb-3">
                            <i style="color: blue" class="bi bi-star-fill"></i>
                            <i style="color: blue" class="bi bi-star-fill"></i>
                            <i style="color: blue" class="bi bi-star-fill"></i>
                            <i style="color: blue" class="bi bi-star-fill"></i>
                            <i style="color: blue" class="bi bi-star-half"></i>
                            <span>4,94</span>
                        </div>

                    </div>

                </div>
            </div>


            <div class="col-md-4" style="background-color: rgba(255, 255, 255, 0.776);border-radius:5px; padding-bottom:50px;padding-top:50px;box-shadow: 10px 10px 1px rgba(242, 242, 242, 0.455);">
                    @if(Session::get('success'))
                    <div class="alert alert-success py-3">{{Session::get('success')}}</div>
                    @endif

                    @if(Session::get('error'))
                    <div class="alert alert-danger py-3">{{Session::get('error')}}</div>
                    @endif
                    <h1 style="color: blue" class="mb-2 fw-bold text-center">Réservez cette chambre</h1>
                    <p class="text-center" style="color: rgb(129, 129, 129)">Réservez votre séjour en quelques étapes simples</p>

                    <form action="{{ route('reservation.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="chambre_id" value="{{ $chambre->id }}">

                        <hr class="mb-3" style="color: rgba(168, 168, 168, 0.842)" >

                        <div class="form-group mb-2">
                            <label class="fw-bold" for="name">Nom et Prénom</label>
                            <input type="text" name="name" id="name" class=" form-control border-2" placeholder="Nom et Prénom" required>
                        </div>

                        <div class="form-group mb-2">
                            <label class="fw-bold" for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control border-2" placeholder="Email" required>
                        </div>

                        <div class="form-group mb-2">
                            <label class="fw-bold" for="date">Date de Début</label>
                            <input type="date" name="date_debut" id="date_debut" class="form-control border-2" required>
                        </div>

                        <div class="form-group mb-2">
                            <label class="fw-bold" for="date">Date de Fin</label>
                            <input type="date" name="date_fin" id="date_fin" class="form-control border-2" required>
                        </div>

                        <div class="form-group mb-2" style="position: relative">
                            <label class="fw-bold" for="number">Numéro de téléphone</label>
                            <input type="number" name="number" id="number" class="form-control border-2" style="width: 100%;padding-left: 40px;"  placeholder="Numéro de téléphone" required>
                            <img id="prefix-image" src="" alt="Prefix Image" style="
                                            position: absolute;
                                            left: 7px;
                                            top: 70%;
                                            transform: translateY(-50%);
                                            display: none;
                                            width: 28px;
                                            height: 28px;
                                            border-radius: 5px;">
                        </div>

                        <div class="form-group mb-2">
                            <label class="fw-bold" for="number">Prix total</label>
                            <input type="number" name="prix_total" id="prix_total" value="{{ $chambre->price }}" class="form-control border-2" placeholder="Prix total" required>
                        </div>

                        <button type="submit" style="height: 40px;width:150px ; background-color:blue" class="btn btn-primary mt-2">Réserver</button>

                    </form>

                    <p class="alert alert-success mt-3">Aucun montant ne vous sera débité pour la réservation pour le moment</p>

                    <h4 class="fw-bold mt-4" style="color: blue"><u>Equipements :</u></h4>
                    <ul>
                        <li>Climatisation pour une température parfaite en toute saison.</li>
                        <li>Télévision à écran plat avec chaînes.</li>
                        <li>Connexion Wi-Fi haut débit gratuite pour rester connecté.</li>
                        <li>Bureau de travail ergonomique.</li>
                    </ul>
                    <h4 class="fw-bold" style="color: blue"><u>Vue :</u></h4>
                    <p>Une vue imprenable sur le jardin ou la ville, offrant un cadre agréable pour se détendre.</p>


            </div>
        </div>
        <div class="row mt-5" style="background-color: rgba(255, 255, 255, 0.776);border-radius:5px; padding-bottom:50px;padding-top:50px">


            <div class="card " style="background-color: white; border:none;box-shadow: 10px 10px 15px rgba(195, 194, 194, 0.429)">
                <h1 class="text-center">Politique de Réservation</h1>
                <div class="col-12 bg-danger" style="width: 100%; height:5px"></div>
                <div class="row">
                    <div class="col-md-4 mt-3">
                        <h4>Conditions de Réservation</h4>
                        <p><strong style="color: rgb(188, 8, 8)">Confirmation :</strong> Toutes les réservations sont confirmées par e-mail après réception des informations complètes et du paiement anticipé, si applicable.</p>
                        <p><strong style="color: rgb(188, 8, 8)">Paiement :</strong> Un acompte de 30% du montant total de la réservation est requis pour garantir votre réservation. Le solde est dû à l'arrivée.</p>
                    </div>
                    <div class="col-md-4 mt-3">
                        <h4>Annulation et Modification</h4>
                        <p><strong style="color: rgb(188, 8, 8)">Annulation :</strong> Les annulations effectuées au moins 7 jours avant la date d'arrivée prévue sont entièrement remboursables. Passé ce délai, l'acompte de 30% ne sera pas remboursé.</p>
                        <p><strong style="color: rgb(188, 8, 8)">Modification :</strong> Vous pouvez modifier votre réservation jusqu'à 48 heures avant la date d'arrivée sans frais supplémentaires, sous réserve de disponibilité.</p>
                    </div>
                    <div class="col-md-4 mt-3">
                        <h4>Arrivée et Départ</h4>
                        <p><strong style="color: rgb(188, 8, 8)">Check-in :</strong> Les chambres sont disponibles à partir de 14h00 le jour de votre arrivée. Si vous arrivez plus tôt, nous ferons de notre mieux pour vous accueillir ou garder vos bagages.</p>
                        <p><strong style="color: rgb(188, 8, 8)">Check-out :</strong> Les chambres doivent être libérées avant 12h00 le jour de votre départ. Un départ tardif peut être possible, sous réserve de disponibilité et moyennant des frais supplémentaires.</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mt-3">
                        <h4>Arrivée et Départ</h4>
                        <p><strong style="color: rgb(188, 8, 8)">Check-in :</strong> Les chambres sont disponibles à partir de 14h00 le jour de votre arrivée. Si vous arrivez plus tôt, nous ferons de notre mieux pour vous accueillir ou garder vos bagages.</p>
                        <p><strong style="color: rgb(188, 8, 8)">Check-out :</strong> Les chambres doivent être libérées avant 12h00 le jour de votre départ. Un départ tardif peut être possible, sous réserve de disponibilité et moyennant des frais supplémentaires.</p>
                    </div>
                    <div class="col-md-4 mt-3">
                        <h4>Non-présentation</h4>
                        <p>En cas de non-présentation, l'acompte de 30% sera retenu et la chambre sera relouée après 24 heures.</p>
                    </div>
                    <div class="col-md-4 mt-3">
                        <h4>Règlement Intérieur</h4>
                        <p><strong style="color: rgb(188, 8, 8)">Fumer :</strong> Il est interdit de fumer dans les chambres. Des zones fumeurs sont disponibles à l'extérieur de l'établissement.</p>
                        <p><strong style="color: rgb(188, 8, 8)">Nuisances Sonores :</strong> Veuillez respecter le calme et la tranquillité des autres clients en évitant les nuisances sonores, surtout après 22h00.</p>
                    </div>
                </div>
            </div>

            <div class=" row mt-5">
                <h2 class="text-center ">Avis des Clients</h2>
                <div class="col-12 bg-danger mb-4" style="width: 100%; height:5px"></div>
                <div class="col-md-6">
                    <div class="card alert alert-primary" style="padding: 10px 10px 10px 10px">
                        <div class="d-flex" style="height: 50px; ">
                           <img src="{{ asset('assets/img/profil_null.jpg') }}" alt="profil" style="border-radius: 50% ; width:45px;height:45px">
                           <p class="mt-2 text-end fw-bold" style="color: rgb(0, 26, 255);font-size:25px;margin-left:20px">Marie</p>
                        </div>
                        <blockquote class="blockquote">
                            <p class="mb-0">"Superbe chambre, très confortable et bien équipée. Nous avons passé un excellent séjour !" </p>
                        </blockquote>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card alert alert-success" style="padding: 10px 10px 10px 10px">
                        <div class="d-flex" style="height: 50px">
                            <img src="{{ asset('assets/img/profil_null.jpg') }}" alt="profil" style="border-radius: 50% ; width:45px;height:45px">
                            <p class="mt-2 text-end fw-bold" style="color: rgb(0, 55, 255); font-size:25px;margin-left:20px"> Jean</p>
                         </div>
                        <blockquote class="blockquote">
                            <p class="mb-0">"Excellent service et emplacement parfait. Je recommande vivement !"</p>
                        </blockquote>
                    </div>
                </div>
            </div>

            <div class=" col-md-12 mt-3" style="background-color: white; border:none;box-shadow: 10px 10px 15px rgba(195, 194, 194, 0.429)">
                <h2 class="text-center">Contact </h2>
                <div class="col-12 bg-danger mb-4" style="width: 100%; height:5px"></div>
                <div class="card p-3 border-0">
                    <div class="d-flex mb-2">
                        <strong class="me-auto">Propriétaire :</strong>
                        <span class="ms-auto text-danger fw-bold">{{ $chambre->proprietaire->name }}</span>
                    </div>
                    <div class="d-flex mb-2">
                        <strong class="me-auto">Adresse e-mail :</strong>
                        <span class="ms-auto">{{ $chambre->proprietaire->email }}</span>
                    </div>
                    <div class="d-flex mb-2">
                        <strong class="me-auto">Adresse :</strong>
                        <span class="ms-auto">Cotonou, Bénin</span>
                    </div>
                </div>
            </div>


         <section id="faq" class="faq">
            <div class="container" data-aos="fade-up">

            <div class="row gy-4">

                <div class="col-lg-4">
                <div class="content px-xl-5">
                    <h3>Des réponses à vos <strong>Questions</strong></h3>
                    <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                    </p>
                </div>
                </div>

                <div class="col-lg-8">

                <div class="accordion accordion-flush" id="faqlist" data-aos="fade-up" data-aos-delay="100">

                    <div class="accordion-item">
                    <h3 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                        <span class="num">1.</span>
                        Comment puis-je annuler ma réservation ?
                        </button>
                    </h3>
                    <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                        <div class="accordion-body">
                            Vous pouvez annuler votre réservation en nous contactant directement par téléphone ou par e-mail. Veuillez consulter notre politique d'annulation pour plus de détails.
                        </div>
                    </div>
                    </div><!-- # Faq item-->

                    <div class="accordion-item">
                    <h3 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                        <span class="num">2.</span>
                        Y a-t-il un parking disponible ?                        </button>
                    </h3>
                    <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                        <div class="accordion-body">
                            Oui, nous offrons un parking gratuit pour nos clients.
                        </div>
                    </div>
                    </div><!-- # Faq item-->

                    <div class="accordion-item">
                    <h3 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                        <span class="num">3.</span>
                        Les animaux de compagnie sont-ils autorisés ?                        </button>
                    </h3>
                    <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                        <div class="accordion-body">
                            Malheureusement, les animaux de compagnie ne sont pas autorisés dans notre établissement.
                        </div>
                    </div>
                    </div><!-- # Faq item-->

                    <!-- Ajouter d'autres questions et réponses fréquentes -->

                </div>

                </div>
            </div>

            </div>
    </section>



        </div>
    </div>

 </section>




<script>
    document.getElementById('number').addEventListener('input', function() {
        const input = this.value;
        const prefixImage = document.getElementById('prefix-image');
        prefixImage.style.display = 'none'; // Hide the image initially

        if (/^(42|46|50|51|52|53|54|56|57|59|61|62|66|67|69|90|91|96|97)/.test(input)) {
            prefixImage.src = '{{ asset('assets/img/img_fonf/Mtn-logo-svg.svg.png') }}'; // Change this to your yellow image path
            prefixImage.style.display = 'block';
        } else if (/^(55|58|60|63|64|65|68|94|95|98|99)/.test(input)) {
            prefixImage.src = '{{ asset('assets/img/img_fonf/Moov_Africa_logo.png') }}'; // Change this to your blue image path
            prefixImage.style.display = 'block';
        } else if (/^(40|41|43|44)/.test(input)) {
            prefixImage.src = '{{ asset('assets/img/img_fonf/celtiis.jpg') }}'; // Change this to your red image path
            prefixImage.style.display = 'block';
        } else {
            prefixImage.style.display = 'none';
        }
    });
</script>
@endsection
