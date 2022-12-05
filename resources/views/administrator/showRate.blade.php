@extends('layouts.app-master')

@section('content')

    <div class="showrate-box">
        <div class="card">
            <div class="card-body showrate-card-body">
                <p class="showrate-box-msg">
                <h1 class="">Détail taux</h1>
                </p>

                <p class="showrate-box-success">
                    @if (session()->get('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                </p>

                <ul class="">
                    <li>Taux : {{ $showRate->value }}%</li>
                    <li>Valide jusqu'en : {{ $showRate->validity }}</li>
                    <li>Description : {{ $showRate->description }}</li>
                </ul>

                <hr>

                <div class="showrate-box-close">
                    <table>
                        <tr>
                            @if (Auth::user()->role === "SuperAdmin")
                            <td>
                                <form action="{{ route ('editratesup', $showRate->id) }}" method="GET">
                                    @csrf

                                    <button type="submit" class="">MODIFIER</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('destroyratesup', $showRate->id) }}" method="POST">
                                    @csrf

                                    <button type="submit" class="">SUPPRIMER</button>
                                </form>
                            </td>
                            @endif
                            <td>
                                <form action="{{ route('allrate') }}" method="GET">
                                    @csrf

                                    <button type="submit" class="">FERMER</button>
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
