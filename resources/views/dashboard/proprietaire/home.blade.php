@extends('layouts.proprietaire-dashboard-layout')

@section('content')


<div class="pagetitle">
    <h1>Tableau de bord</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Acceuil</a></li>
        <li class="breadcrumb-item active">Tableau de bord</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">

            {{-- CHambres --}}
            <div class="col-xxl-3 col-md-3">
                <div class="card info-card sales-card">

                  <div class="card-body">
                    <h5 class="card-title">Total des chambres</h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-layout-text-window-reverse"></i>
                      </div>
                      <div class="ps-3">
                        <h6>{{ $nombreDeChambres }}</h6>
                      </div>
                    </div>
                  </div>

                </div>
            </div>

          <!-- Réservations Card -->
          <div class="col-xxl-3 col-md-3">
            <div class="card info-card sales-card">

              <div class="card-body">
                <h5 class="card-title">Réservations</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i style="color: orange" class="bx bxs-user-detail"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $nombreReservation }}</h6>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Réservations Card -->

          <!-- Revenue Card -->
          <div class="col-xxl-3 col-md-3">
            <div class="card info-card revenue-card">

              <div class="card-body">
                <h5 class="card-title">Revenus générés </h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bx bxs-dollar-circle"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $revenuGeneres }} F</h6>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Revenue Card -->

          <!-- Clients Card -->
          <div class="col-xxl-3 col-xl-3">

            <div class="card info-card customers-card">

              <div class="card-body">
                <h5 class="card-title">Chambres réservées </h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $nombreDeChambresReservees }}</h6>
                  </div>
                </div>

              </div>
            </div>
          </div><!-- End Clients Card -->

          <!-- Rapports -->
          <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Rapport</h5>

                        <!-- Bar Chart -->
                        <canvas id="barChart" style="max-height: 400px;"></canvas>
                        <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            new Chart(document.querySelector('#barChart'), {
                            type: 'bar',
                            data: {
                                labels: ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet','Août','Septembre','Octobre','Novembre','Décembre'],
                                datasets: [{
                                label: 'Revenus Générés (F CFA)',
                                data: [{{ $revenuGeneres*0.005 }}, {{ $revenuGeneres*0.005 }}, {{ $revenuGeneres*0.005 }}, {{ $revenuGeneres*0.005 }}, {{ $revenuGeneres*0.005 }}, {{ $revenuGeneres*0.005 }}, {{ $revenuGeneres }}, {{ $revenuGeneres*0.005 }}, {{ $revenuGeneres*0.005 }}, {{ $revenuGeneres*0.005 }}, {{ $revenuGeneres*0.005 }}, {{ $revenuGeneres*0.005 }}, ],
                                backgroundColor: [
                                    'blue',
                                    'blue',
                                    'blue',
                                    'blue',
                                    'blue',
                                    'blue',
                                    'blue',
                                    'blue',
                                    'blue',
                                    'blue',
                                    'blue',
                                    'blue',
                                ],
                                borderColor: [
                                    'blue',
                                    'blue',
                                    'blue',
                                    'blue',
                                    'blue',
                                    'blue',
                                    'blue',
                                    'blue',
                                    'blue',
                                    'blue',
                                    'blue',
                                    'blue',
                                ],
                                borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                y: {
                                    beginAtZero: true
                                }
                                }
                            }
                            });
                        });
                        </script>
                        <!-- End Bar CHart -->

                    </div>
                    </div>
                </div>


                <div class="col-lg-6">
                    <div class="card top-selling overflow-auto">


                      <div class="card-body pb-0">
                        <h5 class="card-title">Réservations récentes </h5>

                        <table class="table table-borderless">
                          <thead>
                            <tr>
                              <th scope="col">Locataires</th>
                              <th scope="col">Chambres</th>
                              <th scope="col">Prix</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>Amos HOUNDETON</td>
                              <td><a href="#" class="text-primary fw-bold">Chambre M1</a></td>
                              <td>35000 F</td>
                            </tr>
                            <tr>
                                <td>Orphe HOUETO</td>
                              <td><a href="#" class="text-primary fw-bold">Chambre I1</a></td>
                              <td>20000F</td>
                            </tr>
                            <tr>
                                <td>Maurice DOSSOU</td>
                              <td><a href="#" class="text-primary fw-bold">Chambre M3</a></td>
                              <td>18000 F</td>
                            </tr>
                            <tr>
                                <td>Sergio FADEYI</td>
                              <td><a href="#" class="text-primary fw-bold">Chambre A2</a></td>
                              <td>17500 F</td>
                            </tr>
                            <tr>
                                <td>Nikanor AKPOVO</td>
                              <td><a href="#" class="text-primary fw-bold">Chambre A1</a></td>
                              <td>45000 F</td>
                            </tr>
                            <tr>
                                <td>Jonas ATANDA</td>
                                <td><a href="#" class="text-primary fw-bold">Chambre M7</a></td>
                                <td>17000 F</td>
                              </tr>
                          </tbody>
                        </table>

                      </div>

                    </div>
                  </div>


                {{-- <div class="col-lg-6">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Pie Chart</h5>

                        <!-- Pie Chart -->
                        <canvas id="pieChart" style="max-height: 400px;"></canvas>
                        <script>
                          document.addEventListener("DOMContentLoaded", () => {
                            new Chart(document.querySelector('#pieChart'), {
                              type: 'pie',
                              data: {
                                labels: [
                                  'Réservations',
                                  'Total des Chambres',
                                  'Locataires'
                                ],
                                datasets: [{
                                  label: ' Total ',
                                  data: [ {{ $nombreDeChambresReservees }}, {{ $nombreDeChambres }}, {{ $nombreDeLocataires }} ],
                                  backgroundColor: [
                                    'rgb(255, 99, 132)',
                                    'rgb(54, 162, 235)',
                                    'rgb(255, 205, 86)'
                                  ],
                                  hoverOffset: 4
                                }]
                              }
                            });
                          });
                        </script>
                        <!-- End Pie CHart -->

                      </div>
                    </div>
                </div> --}}



          </div><!-- End Rapports -->


        </div>
      </div><!-- End Left side columns -->



    </div>
  </section>

@endsection
