@extends('layouts.app-employer')

@section('content')

    <div class="documentlist-box">
        <div class="card">
            <div class="card-body documentlist-card-body">
                <p class="documentlist-box-msg">
                <h1 class="">Documents utils</h1>
                </p><br />

                <section class="main">
                    <ul>
                        @forelse ($showDocuments as $documents)
                        <a href="/storage/{{ $documents->filelink }}" class="" download="">{{ $documents->title }}</a><br />
                        @empty
                        Il n'y a aucun document enregistré pour le moment! 😞
                        @endforelse
                    </ul>
                </section>

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