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
                        Nom de la structure : {{ $employerProfile->servicename }}<br />
                        <div>
                            <form method="GET" action="{{ route('resetemployersaboutinfo', 'resetServicename') }}">
                                @csrf

                                <button type="submit">MODIFIER</button>
                            </form>
                        </div><br />

                        Adresse E-mail : {{ $employerProfile->email }}<br />
                        <div>
                            <form method="GET" action="{{ route('resetemployersaboutinfo', 'resetEmail') }}">
                                @csrf

                                <button type="submit">MODIFIER</button>
                            </form>
                        </div><br />

                        Numéro de téléphone : +226 {{ $employerProfile->telephone }}
                        <div>
                            <form method="GET" action="{{ route('resetemployersaboutinfo', 'resetTelephone') }}">
                                @csrf

                                <button type="submit">MODIFIER</button>
                            </form>
                        </div><br />

                        Mot de passe :
                        <div>
                            <form method="GET" action="{{ route('resetemployersaboutinfo', 'resetPassword') }}">
                                @csrf

                                <button type="submit">MODIFIER</button>
                            </form>
                        </div>
                    </ul>
                    </p>

                    <hr>

                    <div class="">
                        <form method="GET" action="{{ route('dashboard') }}">
                            @csrf

                            <button type="submit">FERMER</button>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
    @endsection