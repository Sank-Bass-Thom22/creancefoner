@extends('layouts.app-employer')

@section('content')




    <div class="loans-box">
        <div class="card">
            <div class="card-body loans-card-body">
                <p class="loans-box-msg">
                <h1 class="">Détail des prêts contractés</h1>
                </p><br />

                <section class="main">
                    <div class="">
                        <table>
                            <tr>
                                <th>MONTANT</th>
                                <th>CONTRACTÉ LE</th>
                                <th>TAUX DE REMBOURSEMENT</th>
                                <th>À REMBOURSER AVANT LE</th>
                            </tr>
                            @forelse ($employeLoans as $loans)
                            <tr>
                                <td>{{ $loans->amount }} Francs CFA</td>
                                <td>{{ $loans->startline }}</td>
                                <td>{{ $loans->value }}%</td>
                                <td>{{ $loans->deadline }}</td>
                            </tr>
                            @empty
                        </table><br />
                        <div class="">Il semble qu'aucun prêt n'est enregistré pour l'instant.</div>
                        @endforelse
                        </table>
                        </p>

                        <hr>

                        <div>
                            <table>
                                <tr>
                                    @if ($countLoans > 0) <td>
                                        <form method="GET" action="{{ route('myemployerepayments', $id) }}">
                                            @csrf

                                            <button type="submit">VOIR LES REMBOURSEMENTS</button>
                                        </form>
                                    </td>
                                    @endif
                                    <td>
                                        <form method="GET" action="{{ route('showemploye', $id) }}">
                                            @csrf

                                            <button type="submit">FERMER</button>
                                        </form>
                                    </td>
                                </tr>
                            </table>
                        </div>
                </section>
            </div>
        </div>
    </div>

@endsection
