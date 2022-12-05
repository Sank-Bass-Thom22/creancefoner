@extends('layouts.app-employer')

@section('content')

    <div class="employedetail-box">
        <div class="card">
            <div class="card-body employedetail-card-body">
                <p class="employedetail-box-msg">
                <h1 class="">Détail employé</h1>
                </p><br />

                <section class="main">
                    <h2 class="">Informations personnelles</h2>

                    <ul class="">
                        Prénom : {{ $showEmploye->firstname }}<br />
                        Nom : {{ $showEmploye->lastname }}<br />
                        Adresse E-mail : {{ $showEmploye->email }}<br />
                        Numéro de téléphone : +226 {{ $showEmploye->telephone }}<br />
                        Numéro matricule : {{ $showEmploye->matricule }}
                    </ul>
                </section>

                <hr>

                <div class="employedetail-box-close">
                    <table>
                        <tr>
                            <td>
                                <form action="{{ route('myemployeloans', $showEmploye->id) }}" method="GET">
                                    @csrf

                                    <button type="submit">VOIR LE DÉTAIL DES PRÊTS</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('myemployes') }}" method="GET">
                                    @csrf

                                    <button type="submit">FERMER</button>
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
