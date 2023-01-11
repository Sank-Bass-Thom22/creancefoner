@extends('layouts.app-employer')

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
                    <h2>Informations</h2>
                    <ul>
                        Nom de la structure : {{ $userProfile->servicename }}<br />
                        Adresse E-mail : {{ $userProfile->email }}<br />
                        Numéro de téléphone : +226 {{ $userProfile->telephone }}<br />
                        <div>
                        <a href="{{ route('resetemployer', $userProfile->id) }}" class="">MODIFIER</a>
                        </div><br />

                        Mot de passe : ********
                        <div>
                        <a href="{{ route('resetemployerpassword', $userProfile->id) }}" class="">MODIFIER</a>
                        </div>
                    </ul>
                    </p>

                    <hr>

                    <div class="">
                        <a href="{{ route('dashboard') }}" class="btn btn-danger">Retour</a>
                    </div>
                </section>
            </div>
        </div>
    </div>
    @endsection
