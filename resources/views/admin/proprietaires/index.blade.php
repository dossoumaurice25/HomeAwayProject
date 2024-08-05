@extends('admin.layout.home_admin_layout')

@section('content')


<div class="col-12">
    <div class="card recent-sales overflow-auto">
        <div class="card-body ">
            <h5 class="card-title" style="font-weight: bold">Listes des Propriétaires<span></span></h5>

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

              @foreach ($proprietaires as $proprietaire)
                  <tr>
                      {{-- <th scope="row">

                      </th> --}}
                      <td>{{ $proprietaire->id }}</td>
                      <td>{{ $proprietaire->name }}</td>
                      <td>{{ $proprietaire->email }}</td>
                      <td>
                        {{-- {{ $proprietaire->is_activee ? 'Actif' : 'Inactif' }} --}}
                        @if($proprietaire->is_activee)
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

                        <form action="{{ route('proprietaires.toggle', $proprietaire->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm {{ $proprietaire->is_activee ? 'btn-danger' : 'btn-success' }}">
                                {{ $proprietaire->is_activee ? 'Désactiver' : 'Activer' }}
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
