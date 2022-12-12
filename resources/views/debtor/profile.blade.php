@extends('layouts.app-debtor')

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
                        Numéro matricule : {{ $userProfile->matricule }}
                        <div>
                            <a href="{{ route('resetdebtor', $userProfile->id) }}" class="">MODIFIER</a>
                        </div><br />

                        Mot de passe : ********
                        <div>
                            <a href="{{ route('resetdebtorpassword') }}" class="">MODIFIER</a>
                        </div>
                    </ul>
                    </p><br />

                    <p>
                    <h2>Service</h2>
                    <ul>
                        Nom de la structure : {{ $service->servicename }}<br />
                        Adresse E-mail : {{ $service->email }}<br />
                        Numéro de téléphone : +226 {{ $service->telephone }}
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
