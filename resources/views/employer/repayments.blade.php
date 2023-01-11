@extends('layouts.app-employer')

@section('content')

    <div class="repayments-box">
        <div class="card">
            <div class="card-body repayments-card-body">
                <p class="repayments-box-msg">
                <h1 class="">Détail des remboursements</h1>
                </p><br />

                <section class="main">
                    <div class="table-responsive">
                    <h3>Apperçu global</h3>
                    <table class="table header-border">
                    <thead>
                        <tr>
                            <th>DETTE TOTALE</th>
                            <th>TOTAL PAYÉ</th>
                            <th>RESTE À PAYER</th>
                            <th>ÉCHÉANCIER</th>
                        </tr>
</thead>
<tbody>
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
                        <tbody>
                    </table>
</div><br />

                    <div class="table-responsive">
                    <h3>Récaputulatif des remboursements</h3>
                    <table class="table header-border">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>EFFECTUÉ LE</th>
                            <th>MONTANT</th>
                            <th>MODE DE REMBOURSEMENT</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($employeRepayments as $repayments)
                        <tr>
                        <td>{{ $loop->index + 1}} </td>
                            <td>{{ $repayments->repaymentdate }}</td>
                            <td>{{ $repayments->amount }} Francs CFA</td>
                            <td>{{ $repayments->repaymentway }}</td>
                        </tr>
                        @empty
                    <tr>
                        <td colspan="4"></td>
                    </tr>
                    @endforelse
                    </tbody>
                    </table>
</div>

                    <hr>

                    <div class="employe-box-close">
                        <a href="{{ route('myemployeloans', $id) }}" class="btn btn-danger">Retour</a>
                    </div>
                </section>
            </div>
        </div>
    </div>

@endsection
