@extends('admin.layout.home_admin_layout')

@section('content')


<div class="col-12">
    <div class="card recent-sales overflow-auto">
        <div class="card-body ">
            <h5 class="card-title" style="font-weight: bold">Liste des Locataires<span></span></h5>

            @if(Session::get('success'))
            <div class="alert alert-success py-3">{{Session::get('success')}}</div>
            @endif

           @if(Session::get('error'))
           <div class="alert alert-danger py-3">{{Session::get('error')}}</div>
          @endif

          <table class="table table-borderless datatable">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom&Prénom</th>
                <th scope="col">Email</th>
                <th scope="col">Statut</th>
                {{-- <th scope="col">Ville</th>
                <th scope="col">Disponibilité</th> --}}
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>

              @foreach ($locataires as $locataire)
                  <tr>
                      {{-- <th scope="row">

                      </th> --}}
                      <td>{{ $locataire->id }}</td>
                      <td>{{ $locataire->name }}</td>
                      <td>{{ $locataire->email }}</td>
                      <td>
                      {{-- {{ $locataire->is_active ? '' : 'Inactif' }} --}}
                        @if($locataire->is_active)
                            <span class="badge bg-success">Actif</span>
                        @else
                            <span class="badge bg-info">Inactif</span>
                        @endif
                     </td>

                      {{-- <td>{{ $proprietaire->adresse }}</td> --}}
                      {{-- <td>{{ $chambre->ville }}</td>
                      <td><span style="color: black" class="badge bg-success-light">{{ $chambre->active? 'Disponible':'Indisponible' }}</span></td> --}}
                      {{-- <td>
                          <a href="{{route('chambre.edit',$proprietaire->id)}}" class="btn btn-primary btn-sm">Modifier</a>
                          <a href="{{route('chambre.delete',$proprietaire->id)}}" class="btn btn-danger btn-sm">Supprimer</a>
                      </td> --}}
                      <td>

                        <form action="{{ route('locataires.toggle', $locataire->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm {{ $locataire->is_active ? 'btn-danger' : 'btn-success' }}">
                                {{ $locataire->is_active ? 'Désactiver' : 'Activer' }}
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
