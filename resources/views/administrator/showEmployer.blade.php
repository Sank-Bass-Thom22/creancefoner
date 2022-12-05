@extends('layouts.app-master')

@section('content')

    <div class="adminemployer-box">
        <div class="card">
            <div class="card-body adminemployer-card-body">
                <p class="adminemployer-box-msg">
                <h1 class="">Détail employer</h1>
                </p><br />

                <p class="adminemployer-box-success">
                    @if (session()->get('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div><br />
                @endif
                </p>

                <section class="main">
                    <p>
                    <h3>Raison sociale</h3>
                    <ul class="">
                        Nom de la structure : {{ $showEmployer->servicename }}<br />
                        <div>
                            <form method="GET" action="{{ route('editemployer', ['id' => $showEmployer->id, 'resource' => 'editServicename']) }}">
                                @csrf

                                <button type="submit">MODIFIER</button>
                            </form>
                        </div><br />

                        Adresse E-mail : {{ $showEmployer->email }}<br />
                        <div>
                            <form method="GET" action="{{ route('editemployer', ['id' => $showEmployer->id, 'resource' => 'editEmployerEmail']) }}">
                                @csrf

                                <button type="submit">MODIFIER</button>
                            </form>
                        </div><br />

                        Numéro de téléphone : +226 {{ $showEmployer->telephone }}<br />
                        <div>
                            <form method="GET" action="{{ route('editemployer', ['id' => $showEmployer->id, 'resource' => 'editEmployerTelephone']) }}">
                                @csrf

                                <button type="submit">MODIFIER</button>
                            </form>
                        </div><br />

                        Mot de passe :
                        <div>
                            <form method="GET" action="{{ route('empregenerate', $showEmployer->id) }}">
                                @csrf

                                <button type="submit">REGÉNÉRER</button>
                            </form>
                        </div><br />

                        Nombre d'employé redevable : {{ $countDebtor }}
                    </ul>
                    </p>
                </section>

                <hr>

                <div class="adminemployer-box-close">
                    <table>
                        <tr>
                            <td>
                                <form action="" method="">
                                    @csrf

                                    <button type="submit" class="">Voir plus</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('allemployer') }}" method="GET">
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