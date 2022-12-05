@extends('layouts.app-employer')

@section('content')



    <div class="employeslist-box">
        <div class="card">
            <div class="card-body employeslist-card-body">
                <p class="employeslist-box-msg">
                <h1 class="">Mes employés</h1>
                </p><br />

                <ol class="">
                    @forelse ($myEmployes as $employes)
                    <li><a href="{{ route('showemploye', $employes->id) }}" class="">{{ $employes->firstname }} {{ $employes->lastname }}</a></li>
                    @empty
                    <div class="employeslist-box-msg">Il semble que vous n'ayez aucun employé enregistré pour le moment.</div>
                    @endforelse
                </ol>

                <hr>

                <div class="employeslist-box-close">
                    <form action="{{ route('dashboard') }}" method="GET">
                        @csrf

                        <button type="submit">FERMER</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection