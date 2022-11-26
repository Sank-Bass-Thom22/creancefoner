<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Détail des remboursements</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition repayments-page">
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

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>
