@extends('layouts.app-master')

@section('content')


<div class="card">
    <div class="card-body">
        <h4 class="card-title">Liste des redevables</h4>
        <p class="search-box">

<<<<<<< HEAD

        <form method="POST" action="{{ route ('researchdebtor') }}">
            @csrf

            <div class="">

                <div class="header-left">
                    <div class="input-group icons">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
=======
                        <div class="">

                            <div class="header-left">
                        <div class="input-group icons">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                            </div>
                            <input type="search" class="form-control"  id="Research" name="research" required placeholder="Recherche redevable" >
                            <button type=""  class="btn-info btn-lg">Valider</button>
>>>>>>> sank
                        </div>
                    </div>

                </div>
            </div>

        </form>
        </p><br />





        <a href="{{ route('dashboard') }} " class="btn btn-danger btn-lg float-right" style="margin: 15px;">Retour</a>
        <a href="{{ route ('registerdebtor') }}" class="btn btn-primary btn-lg float-right" style="margin: 15px;">Nouveau</a>
        <div class="table-responsive">
            <table class="table header-border">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom & prénom (s)</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Matricule</th>
                        <th>Service</th>
                        <th colspan="4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($allDebtor as $debtors)

                    <tr>
                        <td>{{ $loop->index + 1}} </td>
                        <td>{{ $debtors->firstname }} {{ $debtors->lastname }}</td>
                        <td>{{ $debtors->email }}</td>
                        <td>{{ $debtors->telephone }}</td>
                        <td>{{ $debtors->matricule }}</td>
                        <td>
<<<<<<< HEAD
                        @if (Auth::user()->role === "SuperAdmin")
                        <a href="{{ route ('editdebtor', $debtors->id) }}">MODIFIER</a>
                        <a href="{{ route ('deletedebtor', $debtors->id) }}">SUPPRIMER</a>
                        <a href="{{ route('debregenerate', $debtors->id) }}">GÉNÉRER UN NOUVEAU MOT DE PASSE</a>
                        @endif
                        </td>
=======
                            @forelse($allService as $services)
                            @if ($services->serviceindex == $debtors->debtorindex)
                            {{ $services->servicename }}
                            @break
                            @endif
                            @empty
                            {{ __('Aucun service.') }}'
                            @endforelse
                        </td>
                        <td><a href="{{ route ('editdebtor', $debtors->id) }}">MODIFIER</a></td>
                        <td><a href="{{ route ('deletedebtor', $debtors->id) }}">SUPPRIMER</a></td>
                        <td><a href="{{ route ('showloan', $debtors->id) }}">PRÊTS</a></td>
                        <td><a href="{{ route('debregenerate', $debtors->id) }}">NOUVEAU MOT DE PASSE</a></td>
>>>>>>> sank

                    </tr>

                    @empty
                    <tr>
                        <td colspan="5">{{ $message }}</td>

                    </tr>

                    @endforelse




                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
