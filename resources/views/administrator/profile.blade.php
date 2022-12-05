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
                        Prénom : {{ $administratorProfile->firstname }}<br />
                        Nom : {{ $administratorProfile->lastname }}<br />
                        <div>
                            <form method="GET" action="{{ route('editadministrator', ['id' => 0, 'resource' => 'editFullname']) }}">
                                @csrf

                                <button type="submit">MODIFIER</button>
                            </form>
                        </div><br />

                        Adresse E-mail : {{ $administratorProfile->email }}<br />
                        <div>
                            <form method="GET" action="{{ route('editadministrator', ['id' => 0, 'resource' => 'editEmail']) }}">
                                @csrf

                                <button type="submit">MODIFIER</button>
                            </form>
                        </div><br />

                        Numéro de téléphone : +226 {{ $administratorProfile->telephone }}
                        <div>
                            <form method="GET" action="{{ route('editadministrator', ['id' => 0, 'resource' => 'editTelephone']) }}">
                                @csrf

                                <button type="submit">MODIFIER</button>
                            </form>
                        </div><br />

                        Mot de passe :
                        <div>
                            <form method="GET" action="{{ route('editadministrator', ['id' => 0, 'resource' => 'editPassword']) }}">
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