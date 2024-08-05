<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Acceuil|Admin</title>
    <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendord/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendord/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendord/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendord/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendord/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendord/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendord/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet">
</head>
<body>


    <div class="col-4 offset-4 mt-5">
        <div class="card recent-sales overflow-auto">
            <div class="card-body ">
                <h5 class="card-title" style="font-weight: bold">Connectez-vous en tant qu'administrateur<span></span></h5>

                @if(Session::get('success'))
                <div class="alert alert-success py-3">{{Session::get('success')}}</div>
                @endif

               @if(Session::get('error'))
               <div class="alert alert-danger py-3">{{Session::get('error')}}</div>
              @endif

                <form action="{{ route('admin.handleLogin') }}" enctype="multipart/form-data" method="POST">
                    @method('post')
                    @csrf

                    <div class="form-group mb-0">
                        <label for="email"><h5 class="card-title">Email</h5></label>
                        <input type="email" name="email" id="email" class="form-control"  required>
                        @error('email')
                        <div class="text text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="password"><h5 class="card-title">Mot de passe </h5></label>
                            <input type="password" class="form-control" name="password" id="password" required>
                            @error('password')
                                <div class="text text-danger">{{$message}}</div>
                            @enderror
                    </div>

                    <div class="form-group mb-2 d-flex justify-content-center mt-4 align-items-center" >
                        <button type="submit" class="btn btn-primary " style="background-color: #175157 ; border:none ; color:white">Connexion</button>
                    </div>

                </form>

            </div>
        </div>
    </div>


     <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendord/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/vendord/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendord/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('assets/vendord/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('assets/vendord/quill/quill.min.js') }}"></script>
  <script src="{{ asset('assets/vendord/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('assets/vendord/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('assets/vendord/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/maind.js') }}"></script>
</body>
</html>
