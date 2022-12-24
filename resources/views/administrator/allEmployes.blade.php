@extends('layouts.app-master')

@section('content')


<div class="card">
    <div class="card-body">
        <h4 class="card-title">Les employés de {{ $employer->servicename }}</h4>

        <p>
            @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
        </ul>
        @endif
        </p>

        <p class="allemployes-box-success">
            @if (session()->get('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
        @endif
        </p>

        <a href="{{ route('allemployer') }}" class="btn btn-danger btn-lg float-right" style="margin: 15px;">Retour</a>
        <a href="{{ route ('registeremployer') }}" class="btn btn-primary btn-lg float-right" style="margin: 15px;">Nouveau</a>
        <div class="table-responsive">
            <table class="table header-border">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom & prénom (s)</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Matricule</th>
                        <th colspan="4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($allEmployes as $employes)

                    <tr>
                        <td>{{ $loop->index + 1}} </td>
                        <td>{{ $employes->firstname }} {{ $employes->lastname }}</td>
                        <td>{{ $employes->email }} </td>
                        <td>{{ $employes->telephone }} </td>
                        <td>{{ $employes->matricule }}</td>
                        <td><a href="{{ route ('editdebtor', $employes->id) }}">MODIFIER</a></td>
                        <td><a href="{{ route ('deletedebtor', $employes->id) }}">SUPPRIMER</a></td>
                        <td><a href="{{ route ('showloan', $employes->id) }}">PRÊTS</a></td>
                        <td><a href="{{ route('debregenerate', $employes->id) }}">NOUVEAU MOT DE PASSE</a></td>
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

@endsection
