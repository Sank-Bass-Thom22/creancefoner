@extends('layouts.app-master')

@section('content')

<div class="row">
    <div class="col-lg-3 col-sm-6">
        <div class="card gradient-1">
            <div class="card-body">
                @if ($status == 'Up-to-date')
                <h1>Redevables à jour</h1>
                @else
                <h1>Redevables non à jour</h1>
                @endif

                <p><a href="{{ route('dashboard') }}">FERMER</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
