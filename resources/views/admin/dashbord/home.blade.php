@extends('admin.layout.home_admin_layout')

@section('title', 'Acceuil')

@section('content')

<section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">

          <!-- Réservations Card -->
          <div class="col-xxl-3 col-md-3">
            <div class="card info-card sales-card">

              <div class="card-body">
                <h5 class="card-title">Propriétaires </h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bx bx-user"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $nombreProprietaire }}</h6>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Réservations Card -->

          <!-- Revenue Card -->
          <div class="col-xxl-3 col-md-3">
            <div class="card info-card revenue-card">

              <div class="card-body">
                <h5 class="card-title">Locataires </h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bx bx-user-plus"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $nombreLocataire }}</h6>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Revenue Card -->

          <!--  Card -->
          <div class="col-xxl-3 col-xl-3">

            <div class="card info-card customers-card">

              <div class="card-body">
                <h5 class="card-title">Chambres </h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-house-add"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $nombreChambre }}</h6>
                  </div>
                </div>

              </div>
            </div>
          </div><!-- End Clients Card -->


          <!--  Card -->
          <div class="col-xxl-3 col-xl-3">

            <div class="card info-card customers-card">

              <div class="card-body">
                <h5 class="card-title">Réservations </h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-list-columns-reverse"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $nombreReservation }}</h6>
                  </div>
                </div>

              </div>
            </div>
          </div><!-- End Clients Card -->


          <!-- Rapports -->
          <div class="row">
            <div class="col-6">
                <div class="card h-25 info-card revenue-card">

                  <div class="card-body">
                    <h5 class="card-title">Revenus </h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bx bx-money"></i>
                      </div>
                      <div class="ps-3">
                        <h6>{{ $revenuGeneres }} F</h6>
                      </div>
                    </div>
                  </div>

                </div>

                <div class="card h-50">
                      <div class="card-body">
                        <h5 class="card-title mt-4 mb-3">Activité Récente </h5>
                        <p><span class="fw-bold">Dernière réservation:</span> il y a 1 min</p>
                        <p><span class="fw-bold">Nouveau locataire:</span> il y a 1 heure</p>
                        <p><span class="fw-bold">Nouveau Propriétaire:</span> il y a 2 jours</p>
                      </div>
                </div>

              </div>




              <div class="col-lg-6">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Rapport</h5>

                    <canvas id="doughnutChart" style="max-height: 400px;"></canvas>
                    <script>
                      document.addEventListener("DOMContentLoaded", () => {
                        new Chart(document.querySelector('#doughnutChart'), {
                          type: 'doughnut',
                          data: {
                            labels: [
                              'Locataires',
                              'Proprietaires',

                            ],
                            datasets: [{
                              label: 'Total:',
                              data: [{{ $nombreLocataire }}, {{ $nombreProprietaire }}],
                              backgroundColor: [
                                'rgb(54, 162, 235)',
                                'rgb(0,0,120)'
                              ],
                              hoverOffset: 4
                            }]
                          }
                        });
                      });
                    </script>

                  </div>
                </div>
              </div>
          </div>






        </div>
      </div><!-- End Left side columns -->



    </div>
</section>

@endsection
