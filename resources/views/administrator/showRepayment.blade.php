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

<body class="hold-transition repaymentdetail-page">
    <div class="repaymentdetail-box">
        <div class="card">
            <div class="card-body repaymentdetail-card-body">
                <p class="repaymentdetail-box-msg">
                <h1 class="">Détail des remboursements effectués</h1>
                </p>

                <p class="repaymentdetail-box-success">
                    @if (session()->get('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                </p>

                <p class="create-box-error">
                    @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                    <li><strong class="alert alert-danger">{{ $error }}</strong></li>
                    @endforeach
                </ul><br />
                @endif
                </p>

                <p class="repaymentdetail-box-success">
                    @if (session()->has('fullname'))
                <div class="alert alert-success">{{ session()->get('fullname') }}</div>
                @endif
                </p>

                <p>
                <table>
                    <tr>
                        <th>TOTAL DÛ</th>
                        <th>TOTAL PAYÉ</th>
                        <th>RESTE À PAYER</th>
                        <th>ÉCHÉANCIER</th>
                    </tr>
                    <tr>
                        <td>{{ $totalDue }} Francs CFA</td>
                        <td>{{ $totalPaid }} Francs CFA</td>
                        <td>{{ $totalDue - $totalPaid }} Francs CFA</td>
                        <td>
                        @if (session()->get('schedule') > 0)
                <div class="">{{ session()->get('schedule') }} Francs par mois</div>
                @else
                <div class="">Veuillez définir un échéancier!</div>
                @endif
                        </td>
                    </tr>
                </table>
                </p><br />

                <p class="loan-list">
                <table class="tab">
                    <tr>
                        <th>EFFECTUÉ LE</th>
                        <th>MONTANT</th>
                        <th>MODE DE REMBOURSEMENT</th>
                        <th>OPTION</th>
                    </tr>
                    @forelse($showRepayment as $repayments)
                    <tr>
                        <td>{{ $repayments->repaymentdate }}</td>
                        <td>{{ $repayments->amount }} Francs CFA</td>
                        <td>{{ $repayments->repaymentway }}</td>
                        <td>
                            <form action="{{ route ('editrepayment', $repayments->id) }}" method="GET">
                                @csrf

                                <button type="submit">MODIFIER</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                </table><br />
                <p class="">Aucun remboursement enregistré pour le moment! 😞</p>
                @endforelse
                </table>
                </p>

                <hr>

                <div class="repaymentdetail-box-close">
                    <table>
                        <tr>
                            @if ($totalPaid < $totalDue && session()->get('schedule') > 0) <td>
                                    <form action="{{ route ('createrepayment', $id) }}" method="GET">
                                        @csrf

                                        <button type="submit">REMBOURSER</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route ('editschedule', session()->get('id_schedule')) }}" method="GET">
                                        @csrf

                                        <button type="submit">MODIFIER L'ÉCHÉANCIER</button>
                                    </form>
                                </td>
                                @else
                                @if ($totalPaid < $totalDue) <td>
                                    <form action="{{ route ('createschedule', $id) }}" method="GET">
                                        @csrf

                                        <button type="submit">DÉFINIR UN ÉCHÉANCIER</button>
                                    </form>
                                    </td>
                                    @endif
                                    @endif
                                    <td>
                                        <form action="{{ route('showloan', $id) }}" method="GET">
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

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>
