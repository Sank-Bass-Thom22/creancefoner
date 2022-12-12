@extends('layouts.app-employer')

@section('content')



    <div class="employeslist-box">
        <div class="card">
            <div class="card-body employeslist-card-body">
                <p class="employeslist-box-msg">
                <h1 class="">Mes employés</h1>
                </p><br />

                <p class="myemployesbox-success">
                    @if (session()->get('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div><br />
                @endif
                </p>

                <a href="{{ route('dashboard') }} " class="btn btn-danger btn-lg float-right" style="margin: 15px;">Retour</a>
                <div class="table-responsive">
            <table class="table header-border">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom & prénom (s)</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Matricule</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($myEmployes as $employes)
                <tr>
                        <td>{{ $loop->index + 1}} </td>
                        <td>{{ $employes->firstname }} {{ $employes->lastname }}</td>
                        <td>{{ $employes->email }}</td>
                        <td>{{ $employes->telephone }}</td>
                        <td>{{ $employes->matricule }}</td>
                        <td><a href="{{ route ('myemployeloans', $employes->id) }}">PRÊTS</a></td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="5"></td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

            </div>
        </div>
    </div>
@endsection
