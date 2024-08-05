@extends('admin.layout.home_admin_layout')

@section('content')


<div class="col-12">
    <div class="card recent-sales overflow-auto">
        <div class="card-body ">
            <h5 class="card-title" style="font-weight: bold">Liste des Chambres en attente d'approbation<span></span></h5>

            @if(Session::get('success'))
            <div class="alert alert-success py-3">{{Session::get('success')}}</div>
            @endif

           @if(Session::get('error'))
           <div class="alert alert-danger py-3">{{Session::get('error')}}</div>
          @endif

          <table class="table table-borderless datatable">
            <thead>
              <tr>
                <th>Nom</th>
                <th>Adresse</th>
                <th>Ville</th>
                <th>Prix</th>
                <th>Description</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

                @foreach($chambres as $chambre)
                  <tr>
                    <td>{{ $chambre->name }}</td>
                    <td>{{ $chambre->adresse }}</td>
                    <td>{{ $chambre->ville }}</td>
                    <td>{{ $chambre->price }}</td>
                    <td>{{ $chambre->description }}</td>

                      <td>

                        <form action="{{ route('admin.chambres.approve', $chambre->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-success">
                                Approuver
                            </button>
                        </form>


                    </td>
                  </tr>
              @endforeach

            </tbody>
          </table>

        </div>
    </div>
</div>

@stop
