@extends('layouts.app-master')

@section('content')

    <div class="profile-box">
        <div class="card">
            <div class="card-body profile-card-body">
                <p class="profile-box-msg">
                <h1 class="">Mon profile</h1>
                </p><br />

                <p class="profile-box-success">
                    @if (session()->get('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div><br />
                @endif
                </p>

                <section>
                    <p>
                    <h2>Informations personnelles</h2>
                    <ul>
                        Prénom : {{ $userProfile->firstname }}<br />
                        Nom : {{ $userProfile->lastname }}<br />
                        Adresse E-mail : {{ $userProfile->email }}<br />
                        Numéro de téléphone : +226 {{ $userProfile->telephone }}<br />
                        Responsabilité : {{ $userProfile->role }}
                        <div>
                            <a href="{{ route('editadministrator', $userProfile->id) }}">MODIFIER</a>
                        </div><br />

                        Mot de passe : ********
                        <div>
                            <a href="{{ route('editadminpassword') }}">MODIFIER</a>
                        </div>
                    </ul>
                    </p>

                    <hr>

                    <div class="">
                        <a href="{{ route('dashboard') }}">FERMER</a>
                    </div>
                </section>
            </div>
        </div>
    </div>

@endsection
