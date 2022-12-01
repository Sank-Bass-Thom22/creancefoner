@extends('layouts.app-master')

@section('content')
    <div class="documentlist-box">
        <div class="card">
            <div class="card-body documentlist-card-body">
                <p class="documentlist-box-msg">
                <h1 class="">Documents utils</h1>
                </p>

                <table class="">
                    <tr>
                        <th>TITRE</th>
                        <th>FICHIER</th>
                        <th>OPTION SUPPLÉMENTAIRE</th>
                    </tr>
                    @forelse ($allDocument as $documents)
                    <tr>
                        <td>{{ $documents->title }}</td>
                        <td>
                            <a href="/storage/{{ $documents->filelink }}" class="" download="">Télécharger</a>
                        </td>
                        <td>
                            <a href="{{ route('showdocument', $documents->id) }}" class="">VOIR PLUS</a>
                        </td>
                    </tr>
                    @empty
                </table><br />
                <p class="documentlist-box-msg">Aucun document enregistré! 😞</p>
                @endforelse
                </table>

                <hr>

                <div class="documentlist-box-close">
                    <form action="{{ route('dashboard') }}" method="GET">
                        @csrf

                        <button type="submit">FERMER</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
