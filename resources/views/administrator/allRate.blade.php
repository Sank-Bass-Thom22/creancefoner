@extends('layouts.app-master')

@section('content')
    <div class="ratelist-box">
        <div class="card">
            <div class="card-body ratelist-card-body">
                <p class="ratelist-box-msg">
                <h1 class="">Liste des taux</h1>
                </p>

                <table class="">
                    <tr>
                        <th>TAUX</th>
                        <th>VALIDITÉ</th>
                        <th>OPTION SUPPLÉMENTAIRE</th>
                    </tr>
                    @forelse ($allRate as $rates)
                    <tr>
                        <td>{{ $rates->value }}%</td>
                        <td>{{ $rates->validity }}</td>
                        <td><a href="{{ route('showrate', $rates->id) }}" class="">VOIR PLUS</a></td>
                    </tr>
                    @empty
                </table><br />
                <p class="ratelist-box-msg">Aucun taux enregistré! 😞</p>
                @endforelse
                </table>

                <hr>

                <div class="ratelist-box-close">
                    <form action="{{ route('dashboard') }}" method="GET">
                        @csrf

                        <button type="submit">FERMER</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
