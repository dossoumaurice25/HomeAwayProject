@extends('layouts.website-layout')

@section('titre' , 'Acceuil')

@section('style')
<style>
    .search-form {

        top: 20%;
        left: 50%;
        background-color: rgb(89, 87, 87);
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .btn-pink {
        background-color: blue;
        border-color: blue;
        color: white;
    }
    .background-image {
            width: 100%;
            height: 400px;
        }
        .btn-pink:hover{
          background-color: rgb(30, 30, 246);
          color: #fff;
        }

</style>
@endsection

@section('content')



    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero">
        <div class="container position-relative">

        <div class="row gy-5" data-aos="fade-in">
            <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">

            <h2 style="font-size: 35px">Découvrez des séjours confortables et abordables sur <span>HomeAway</span></h2>
            <p class="fw-bold">Trouvez la chambre ou la guesthouse idéale pour votre prochaine escapade.</p>
            <div class="d-flex justify-content-center justify-content-lg-start">
                <a href="#about" class="btn-get-started">Réservez Maintenant</a>
                {{-- <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a> --}}
            </div>

            </div>

            <div class="col-lg-6 order-1 order-lg-2">

                <div class="background-image" style="margin-bottom: 200px">
                    <div style="background-color: #fff" class="search-form">
                        <h3>Trouvez des hébergements confortables</h3>
                        <p style="color: black">Réchercher des logements et des chambres qui conviennent à vos critères sur <span style="color: blue">HomeAway</span>.</p>
                        <form>
                            <div class="form-group mb-3">
                                <label for="address" style="text-transform: uppercase">Adresse</label>
                                <input type="text" class="form-control" id="address" placeholder="N'importe où">
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6 ">
                                    <label for="checkin" style="text-transform: uppercase">Arrivée</label>
                                    <input type="date" class="form-control" id="checkin" placeholder="Ajouter une date">
                                </div>
                                <div class="form-group col-md-6 ">
                                    <label for="checkout"  style="text-transform: uppercase">Départ</label>
                                    <input type="date" class="form-control" id="checkout" placeholder="Ajouter une date">
                                </div>
                            </div>
                            <div class="row mb-3 ">
                                <div class="form-group col-md-6">
                                    <label for="adults" style="text-transform: uppercase">Adultes</label>
                                    <select id="adults" class="form-control">
                                        <option selected>2</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="children"  style="text-transform: uppercase">Enfants</label>
                                    <select id="children" class="form-control">
                                        <option selected>0</option>
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-pink btn-block mt-2 col-6 offset-3">Rechercher</button>
                            </div>
                        </form>
                    </div>
                </div>
            {{-- <img src="{{ asset('assets/img/hero-img.svg') }}" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100"> --}}
            </div>
        </div>
        </div>

        <div class="icon-boxes position-relative">

            {{-- <div class="row gy-0 mt-5">

            <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="icon-box">

                </div>
            </div><!--End Icon Box -->

            <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="icon-box">

                </div>
            </div><!--End Icon Box -->

            <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box">
                 </div>
            </div><!--End Icon Box -->

            <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
                <div class="icon-box">
                </div>
            </div><!--End Icon Box -->

            </div> --}}

        </div>

        </div>
    </section>
    <!-- End Hero Section -->


    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>Petits ou grands, nous avons tous les logements qu'il vous faut</h2>
        </div>

        <div class="row gy-4">
            <div class="col-lg-6">
            <img src="{{ asset('assets/img/outsite-co-R-LK3sqLiBw-unsplash.jpg') }}" class="img-fluid rounded-4 mb-4" alt="">
            <h3><a href="{{ route('chambres') }}">Guesthouse</a> <i class="bi bi-chevron-right ms-auto"></i></h3>
            <p> Séjournez dans les endroits les plus pratiqu
                es en réservant des logements dans des immeubles partagés.
                Des logements avec cuisine équipée adaptés aux familles
            </p>
           </div>

            <div class="col-lg-6">
            <div class="content ps-0 ps-lg-5">
                <div class="position-relative mt-4">
                <img src="{{ asset('assets/img/cham.jpg') }}" class="img-fluid rounded-4" alt="">
                </div>
                <h3  class="mt-4"><a  href="{{ route('chambre_a_louer') }}">Chambres</a> <i class="bi bi-chevron-right ms-auto"></i></h3>
              <p> Profitez de votre propre espace de couchage et partagez des parties communes avec d'autres personnes.
               </p>

            </div>
            </div>
        </div>

        </div>
    </section>



    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>A propos de nous</h2>
            <p>Bienvenue sur Guesthouses, votre destination privilégiée pour trouver et réserver des maisons d'hôtes exceptionnelles à travers le monde. </p>
        </div>

        <div class="row gy-4">
            <div class="col-lg-6">
            <h3>Arrivée en douceur! Nous sommes heureux de vous accueillir dans notre guesthouse, votre maison loin de chez vous.</h3>
            <img src="assets/img/about.jpg" class="img-fluid rounded-4 mb-4" alt="">
            <Rejoignez-nous> Chez HomeAway, chaque voyage mérite un hébergement qui se sent comme chez soi, avec une touche personnelle et chaleureuse. Rejoignez-nous et découvrez le confort et la convivialité des meilleures maisons d'hôtes, où que vous alliez.</p>
            </div>
            <div class="col-lg-6">
            <div class="content ps-0 ps-lg-5">
                <p class="fst-italic">
                  Notre mission est de vous offrir une expérience de séjour unique et mémorable en mettant à votre disposition une sélection rigoureuse de maisons d'hôtes confortables et accueillantes.
                </p>
                <ul>
                <li><i class="bi bi-check-circle-fill"></i>Grâce à notre plateforme intuitive, vous pouvez facilement rechercher des hébergements selon vos préférences.</li>
                <li><i class="bi bi-check-circle-fill"></i>Consulter des descriptions détaillées, des photos authentiques et des avis de voyageurs.</li>
                <li><i class="bi bi-check-circle-fill"></i>Nous nous engageons à vous fournir un service cli ent de qualité, disponible 24/7 pour répondre à toutes vos questions et vous assister dans vos réservations.</li>
                </ul>
                <p>

                </p>

                <div class="position-relative mt-4">
                <img src="assets/img/about-2.jpg" class="img-fluid rounded-4" alt="">

                </div>
            </div>
            </div>
        </div>

        </div>
    </section><!-- End About Us Section -->

    {{-- afficher les chambres --}}
    <section id="chambre" class="chambre sections-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Trouvez le logement idéal</h2>
                <p>Eliminez les désagréments liés à l'aménagement de votre chambre pendant ces années privilégiées</p>
            </div>

            <div class="chambre-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4 chambre-container">

                    @foreach ($chambres as $chambre)

                    <div class="col-xl-4 col-md-6 chambre-item filter-app">
                        <div class="chambre-wrap">
                          <a href="{{ asset('storage/' .$chambre->image_path) }}" data-gallery="portfolio-gallery-app" class="glightbox">
                            {{-- <img src="assets/img/portfolio/app-1.jpg" class="img-fluid" alt=""> --}}
                            @if ($chambre->image_path)
                            <img src="{{ asset('storage/' .$chambre->image_path) }}"  class="img-bg">
                            {{-- style="background-image: url('{{ asset('storage/' .$chambre->image_path) }}') ;" --}}
                            @else
                            <div style="background-image: url('https://ui-avatars.com/api/?backgroung=000&color=fff&name={{ $chambre->name }})') ;" class="img-bg"></div>
                            @endif

                          </a>

                          <div class="chambre-info">
                            <h4><a href="portfolio-details.html" title="More Details">{{ $chambre->name }}</a></h4>
                            <div class="d-flex justify-content-center small text-warning mb-2">
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                            </div>
                            <h4><a href="portfolio-details.html" title="More Details" > {{$chambre->price}}</a></h4>

                            <p>Lorem ipsum, dolor sit amet consectetur</p>
                            @guest
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-4" href="#">Voir plus</a></div>
                            </div>
                            @endguest
                            @auth
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ route('reservation.form' , $chambre->id) }}">Réserver</a></div>
                            </div>
                            @endauth
                          </div>
                        </div>
                      </div><!-- End Portfolio Item -->

                    @endforeach

                </div>
            </div>
        </div>
    </section>






    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio sections-bg">
        <div class="container" data-aos="fade-up">

          <div class="section-header">
            <h2>Les chambres et guesthouses les plus populaires pour les locataires</h2>
            <p>Découvrez nos hébergements les plus visités, mettant en vedette les logements les plus recherchés et trouvez votre maison loin de chez vous.</p>
          </div>

          <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">

            <div>
              <ul class="portfolio-flters">
                <li data-filter="*" class="filter-active">Tout</li>
                <li data-filter=".filter-app">Appartements</li>
                <li data-filter=".filter-product">Evènements</li>
                <li data-filter=".filter-branding">Chambres</li>
                {{-- <li data-filter=".filter-books">Books</li> --}}
              </ul><!-- End Portfolio Filters -->
            </div>

            <div class="row gy-4 portfolio-container">

              <div class="col-xl-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-wrap">
                  <a href="{{ asset('assets/img/portfolio/app-1.jpg') }}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="assets/img/portfolio/app-1.jpg" class="img-fluid" alt=""></a>
                  <div class="portfolio-info">
                    <h4><a href="portfolio-details.html" title="More Details">Appartement 1</a></h4>
                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                  </div>
                </div>
              </div><!-- End Portfolio Item -->

              <div class="col-xl-4 col-md-6 portfolio-item filter-product">
                <div class="portfolio-wrap">
                  <a href="{{ asset('assets/img/portfolio/product-1.jpg') }}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="assets/img/portfolio/product-1.jpg" class="img-fluid" alt=""></a>
                  <div class="portfolio-info">
                    <h4><a href="portfolio-details.html" title="More Details">Evènement 1</a></h4>
                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                  </div>
                </div>
              </div><!-- End Portfolio Item -->

              <div class="col-xl-4 col-md-6 portfolio-item filter-branding">
                <div class="portfolio-wrap">
                  <a href=" {{ asset('assets/img/portfolio/branding-1.jpg') }}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="assets/img/portfolio/branding-1.jpg" class="img-fluid" alt=""></a>
                  <div class="portfolio-info">
                    <h4><a href="portfolio-details.html" title="More Details">Chambre 1</a></h4>
                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                  </div>
                </div>
              </div><!-- End Portfolio Item -->

              {{-- <div class="col-xl-4 col-md-6 portfolio-item filter-books">
                <div class="portfolio-wrap">
                  <a href=" {{ asset('assets/img/portfolio/books-1.jpg') }}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="assets/img/portfolio/books-1.jpg" class="img-fluid" alt=""></a>
                  <div class="portfolio-info">
                    <h4><a href="portfolio-details.html" title="More Details">Books 1</a></h4>
                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                  </div>
                </div>
              </div><!-- End Portfolio Item --> --}}

              <div class="col-xl-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-wrap">
                  <a href=" {{ asset('assets/img/portfolio/app-2.jpg') }}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="assets/img/portfolio/app-2.jpg" class="img-fluid" alt=""></a>
                  <div class="portfolio-info">
                    <h4><a href="portfolio-details.html" title="More Details">Appartement 2</a></h4>
                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                  </div>
                </div>
              </div><!-- End Portfolio Item -->

              <div class="col-xl-4 col-md-6 portfolio-item filter-product">
                <div class="portfolio-wrap">
                  <a href=" {{ asset('assets/img/portfolio/product-2.jpg') }}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="assets/img/portfolio/product-2.jpg" class="img-fluid" alt=""></a>
                  <div class="portfolio-info">
                    <h4><a href="portfolio-details.html" title="More Details">Evènement 2</a></h4>
                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                  </div>
                </div>
              </div><!-- End Portfolio Item -->

              <div class="col-xl-4 col-md-6 portfolio-item filter-branding">
                <div class="portfolio-wrap">
                  <a href=" {{ asset('assets/img/portfolio/branding-2.jpg') }}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="assets/img/portfolio/branding-2.jpg" class="img-fluid" alt=""></a>
                  <div class="portfolio-info">
                    <h4><a href="portfolio-details.html" title="More Details">Chambre 2</a></h4>
                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                  </div>
                </div>
              </div><!-- End Portfolio Item -->

              {{-- <div class="col-xl-4 col-md-6 portfolio-item filter-books">
                <div class="portfolio-wrap">
                  <a href=" {{ asset('assets/img/portfolio/books-2.jpg') }}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="assets/img/portfolio/books-2.jpg" class="img-fluid" alt=""></a>
                  <div class="portfolio-info">
                    <h4><a href="portfolio-details.html" title="More Details">Books 2</a></h4>
                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                  </div>
                </div>
              </div><!-- End Portfolio Item --> --}}

              <div class="col-xl-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-wrap">
                  <a href="{{ asset('assets/img/portfolio/app-3.jpg') }}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="assets/img/portfolio/app-3.jpg" class="img-fluid" alt=""></a>
                  <div class="portfolio-info">
                    <h4><a href="portfolio-details.html" title="More Details">Appartement 3</a></h4>
                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                  </div>
                </div>
              </div><!-- End Portfolio Item -->

              <div class="col-xl-4 col-md-6 portfolio-item filter-product">
                <div class="portfolio-wrap">
                  <a href="{{ asset('assets/img/portfolio/product-3.jpg') }}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="assets/img/portfolio/product-3.jpg" class="img-fluid" alt=""></a>
                  <div class="portfolio-info">
                    <h4><a href="portfolio-details.html" title="More Details">Evènement 3</a></h4>
                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                  </div>
                </div>
              </div><!-- End Portfolio Item -->

              <div class="col-xl-4 col-md-6 portfolio-item filter-branding">
                <div class="portfolio-wrap">
                  <a href="{{ asset('assets/img/portfolio/branding-3.jpg') }}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="assets/img/portfolio/branding-3.jpg" class="img-fluid" alt=""></a>
                  <div class="portfolio-info">
                    <h4><a href="portfolio-details.html" title="More Details">Chambre 3</a></h4>
                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                  </div>
                </div>
              </div><!-- End Portfolio Item -->

              {{-- <div class="col-xl-4 col-md-6 portfolio-item filter-books">
                <div class="portfolio-wrap">
                  <a href="{{ asset('assets/img/portfolio/books-3.jpg') }}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="assets/img/portfolio/books-3.jpg" class="img-fluid" alt=""></a>
                  <div class="portfolio-info">
                    <h4><a href="portfolio-details.html" title="More Details">Books 3</a></h4>
                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                  </div>
                </div>
              </div><!-- End Portfolio Item --> --}}

            </div><!-- End Portfolio Container -->

          </div>

        </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
        <div class="container" data-aos="fade-up">

          <div class="section-header">
            <h2>Découvrez ce que disent nos locataires</h2>
            <p>Fournir des logements à des millions de personnes partout ou que vous soyez</p>
          </div>

          <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">

              <div class="swiper-slide">
                <div class="testimonial-wrap">
                  <div class="testimonial-item">
                    <div class="d-flex align-items-center">
                      <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img flex-shrink-0" alt="">
                      <div>
                        <h3>Saul Goodman</h3>
                        <h4>Locataire</h4>
                        <div class="stars">
                          <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                      </div>
                    </div>
                    <p>
                      <i class="bi bi-quote quote-icon-left"></i>
                      Je suis vraiment impressionné par la rapidité et la facilité de réservation sur votre plateforme ! J'ai trouvé exactement ce que je cherchais et j'ai pu réserver en quelques clics. <i class="bi bi-quote quote-icon-right"></i>
                    </p>
                  </div>
                </div>
              </div><!-- End testimonial item -->

              <div class="swiper-slide">
                <div class="testimonial-wrap">
                  <div class="testimonial-item">
                    <div class="d-flex align-items-center">
                      <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img flex-shrink-0" alt="">
                      <div>
                        <h3>Sara</h3>
                        <h4>Propriétaire</h4>
                        <div class="stars">
                          <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                      </div>
                    </div>
                    <p>
                      <i class="bi bi-quote quote-icon-left"></i>
                      Je viens de passer un séjour incroyable grâce à votre plateforme ! La réservation était facile, les informations étaient précises et le propriétaire était très accueillant. Je recommande vivement votre site à tous mes amis ! <i class="bi bi-quote quote-icon-right"></i>
                    </p>
                  </div>
                </div>
              </div><!-- End testimonial item -->

              <div class="swiper-slide">
                <div class="testimonial-wrap">
                  <div class="testimonial-item">
                    <div class="d-flex align-items-center">
                      <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img flex-shrink-0" alt="">
                      <div>
                        <h3>Jena Karlis</h3>
                        <h4>Propriétaire</h4>
                        <div class="stars">
                          <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                      </div>
                    </div>
                    <p>
                      <i class="bi bi-quote quote-icon-left"></i>
                     J'ai été agréablement surpris par la variété de choix de locations sur votre plateforme. J'ai trouvé un appartemnt de vacances convenable à un prix raisonnable et j'ai pu réserver en ligne sans problème. <i class="bi bi-quote quote-icon-right"></i>
                    </p>
                  </div>
                </div>
              </div><!-- End testimonial item -->

              <div class="swiper-slide">
                <div class="testimonial-wrap">
                  <div class="testimonial-item">
                    <div class="d-flex align-items-center">
                      <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img flex-shrink-0" alt="">
                      <div>
                        <h3>Matt Brandon</h3>
                        <h4>Locataire</h4>
                        <div class="stars">
                          <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                      </div>
                    </div>
                    <p>
                      <i class="bi bi-quote quote-icon-left"></i>
                      Je suis très satisfait de mon expérience sur votre plateforme ! La réservation était sécurisée. Je recommande votre site à tous ceux qui cherchent une location de vacances fiable et de qualité." <i class="bi bi-quote quote-icon-right"></i>
                    </p>
                  </div>
                </div>
              </div><!-- End testimonial item -->

              <div class="swiper-slide">
                <div class="testimonial-wrap">
                  <div class="testimonial-item">
                    <div class="d-flex align-items-center">
                      <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img flex-shrink-0" alt="">
                      <div>
                        <h3>John Larson</h3>
                        <h4>Propriétaire</h4>
                        <div class="stars">
                          <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                      </div>
                    </div>
                    <p>
                      <i class="bi bi-quote quote-icon-left"></i>
                      J'ai apprécié la facilité de navigation sur votre plateforme et la grande variété de locations proposées. Cependant, j'aurais aimé avoir plus d'informations sur les équipements et les services proposés par les propriétaires.

                      <i class="bi bi-quote quote-icon-right"></i>
                    </p>
                  </div>
                </div>
              </div><!-- End testimonial item -->

            </div>
            <div class="swiper-pagination"></div>
          </div>

        </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq">
            <div class="container" data-aos="fade-up">

            <div class="row gy-4">

                <div class="col-lg-4">
                <div class="content px-xl-5">
                    <h3>Des réponses à vos <strong>Questions</strong></h3>
                    <p>
                    "Nous sommes ravis que vous ayez choisi notre plateforme pour votre prochaine réservation! Si vous avez des questions ou des préoccupations, n'hésitez pas à nous contacter.</p>
                </div>
                </div>

                <div class="col-lg-8">

                <div class="accordion accordion-flush" id="faqlist" data-aos="fade-up" data-aos-delay="100">

                    <div class="accordion-item">
                    <h3 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                        <span class="num">1.</span>
                        Comment puis-je réserver une maison d'hôtes sur HomeAway ?
                        </button>
                    </h3>
                    <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                        <div class="accordion-body">
                            Pour réserver, utilisez notre moteur de recherche pour trouver une maison d'hôtes qui correspond à vos préférences, sélectionnez vos dates de séjour et suivez les étapes de réservation en ligne.
                            Vous recevrez une confirmation par email une fois la réservation finalisée.
                        </div>
                    </div>
                    </div><!-- # Faq item-->

                    <div class="accordion-item">
                    <h3 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                        <span class="num">2.</span>
                        Quels modes de paiement acceptez-vous ?
                        </button>
                    </h3>
                    <!--
                    <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                        <div class="accordion-body">
                            Nous acceptons les paiements par MTN Money et MOOV Money ainsi que par PayPal. Toutes les transactions sont sécurisées.
                        </div>
                    </div>
                    </div>  # Faq item-->


                    <div class="accordion-item">
                    <h3 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                        <span class="num">3.</span>
                        Les maisons d'hôtes sont-elles sécurisées ?
                        </button>
                    </h3>
                    <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                        <div class="accordion-body">
                            La sécurité de nos clients est notre priorité. Toutes les maisons d'hôtes sur HomeAway
                            sont vérifiées pour s'assurer qu'elles respectent nos standards de sécurité et de qualité.
                        </div>
                    </div>
                    </div><!-- # Faq item-->

                    <div class="accordion-item">
                    <h3 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-4">
                        <span class="num">4.</span>
                        Comment puis-je créer un compte sur HomeAway ?
                        </button>
                    </h3>
                    <div id="faq-content-4" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                        <div class="accordion-body">
                            Cliquez sur "Compte" en haut de la page d'accueil et suivez les instructions pour créer un compte avec votre adresse email et un mot de passe.
                        </div>
                    </div>
                    </div><!-- # Faq item-->

                    <div class="accordion-item">
                    <h3 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-5">
                        <span class="num">5.</span>
                        Que faire si j'ai un problème pendant mon séjour ?
                        </button>
                    </h3>
                    <div id="faq-content-5" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                        <div class="accordion-body">
                            Si vous rencontrez un problème pendant votre séjour, contactez d'abord le propriétaire ou le gestionnaire de la maison d'hôtes. Si le problème persiste, notre service client est disponible 24/7 pour vous assister.
                        </div>
                    </div>
                    </div><!-- # Faq item-->

                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-5">
                            <span class="num">6.</span>
                            Proposez-vous des offres spéciales ou des promotions ?
                            </button>
                        </h3>
                        <div id="faq-content-5" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                            <div class="accordion-body">
                            Oui, nous proposons régulièrement des offres spéciales et des promotions. Inscrivez-vous à notre newsletter pour rester informé des dernières offres.
                            </div>
                        </div>
                        </div><!-- # Faq item-->

                </div>

                </div>
            </div>

            </div>
    </section><!-- End Frequently Asked Questions Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

          <div class="section-header">
            <h2>Contact</h2>
            <p>N'hésitez pas à nous contacter si vous avez besoin d'une assistance personnelle pendant votre séjour, nous sommes là pour vous aider!</p>
          </div>

          <div class="row gx-lg-0 gy-4">

            <div class="col-lg-4">

              <div class="info-container d-flex flex-column align-items-center justify-content-center">
                <div class="info-item d-flex">
                  <i class="bi bi-geo-alt flex-shrink-0"></i>
                  <div>
                    <h4>Location:</h4>
                    <p>Cotonou, Bénin</p>
                  </div>
                </div><!-- End Info Item -->

                <div class="info-item d-flex">
                  <i class="bi bi-envelope flex-shrink-0"></i>
                  <div>
                    <h4>Email:</h4>
                    <p>homeaway@gmail.com</p>
                  </div>
                </div><!-- End Info Item -->

                <div class="info-item d-flex">
                  <i class="bi bi-phone flex-shrink-0"></i>
                  <div>
                    <h4>Téléphone:</h4>
                    <p>+22954266922</p>
                  </div>
                </div><!-- End Info Item -->

                <div class="info-item d-flex">
                  <i class="bi bi-clock flex-shrink-0"></i>
                  <div>
                    <h4>Heures d'ouverture:</h4>
                    <p>Lun-Dim: 24H/24H</p>
                  </div>
                </div><!-- End Info Item -->
              </div>

            </div>

            <div class="col-lg-8">
              <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                <div class="row">
                  <div class="col-md-6 form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Vôtre nom" required>
                  </div>
                  <div class="col-md-6 form-group mt-3 mt-md-0">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Vôtre email" required>
                  </div>
                </div>
                <div class="form-group mt-3">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Objet" required>
                </div>
                <div class="form-group mt-3">
                  <textarea class="form-control" name="message" rows="7" placeholder="Message" required></textarea>
                </div>
                <div class="my-3">
                  <div class="loading">Chargement</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Votre message a été envoyé. Merci!</div>
                </div>
                <div class="text-center"><button type="submit">Envoyé un message</button></div>
              </form>
            </div><!-- End Contact Form -->

          </div>

        </div>
    </section><!-- End Contact Section -->

    <style>
        .img-bg{
            background-size: cover;
            background-repeat: no-repeat;
            width:100%;
            height:250px;
            background-position: center;
        }
    </style>

@endsection
