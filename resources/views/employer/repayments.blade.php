@extends('layouts.app-employer')

@section('content')

    <div class="repayments-box">
        <div class="card">
            <div class="card-body repayments-card-body">
                <p class="repayments-box-msg">
                <h1 class="">Détail des remboursements</h1>
                </p><br />

                <section class="main">
                    <p>
                    <h3>Apperçu global</h3>
                    <table>
                        <tr>
                            <th>DETTE TOTALE</th>
                            <th>TOTAL PAYÉ</th>
                            <th>RESTE À PAYER</th>
                            <th>ÉCHÉANCIER</th>
                        </tr>
                        <tr>
                            <td>{{ $totalDebt }} Francs CFA</td>
                            <td>{{ $totalPaid }} Francs CFA</td>
                            <td>{{ $totalDebt - $totalPaid }} Francs CFA</td>
                            <td>
                                @if ($schedule > 0)
                                {{ $schedule }} Francs par mois
                                @else
                                Aucun échéancier
                                @endif
                            </td>
                        </tr>
                    </table>
                    </p><br />

                    <p>
                    <h3>Récaputulatif des remboursements</h3>
                    <table>
                        <tr>
                            <th>EFFECTUÉ LE</th>
                            <th>MONTANT</th>
                            <th>MODE DE REMBOURSEMENT</th>
                        </tr>
                        @forelse ($employeRepayments as $repayments)
                        <tr>
                            <td>{{ $repayments->repaymentdate }}</td>
                            <td>{{ $repayments->amount }} Francs CFA</td>
                            <td>{{ $repayments->repaymentway }}</td>
                        </tr>
                        @empty
                    </table><br />
                    <div class="">Il n'y a aucun remboursement pour le moment.</div>
                    @endforelse
                    </table>
                    </p>

                    <hr>

                    <div class="employe-box-close">
                        <form method="GET" action="{{ route('myemployeloans', $id) }}">
                            @csrf

                            <button type="submit">FERMER</button>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>

@endsection