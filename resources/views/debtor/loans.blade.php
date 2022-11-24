<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prêts</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition loans-page">
    <div class="loans-box">
        <div class="card">
            <div class="card-body loans-card-body">
                <p class="loans-box-msg">
                <h1 class="">Mes prêts</h1>
                </p>

                <p class="loans-box-success">
                    @if (session()->get('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                </p>

                <section class="main">
                    <p>
                    <table>
                        <tr>
                            <th>MONTANT</th>
                            <th>CONTRACTÉ LE</th>
                            <th>TAUX DE REMBOURSEMENT</th>
                            <th>À REMBOURSER AVANT LE</th>
                        </tr>
                        @forelse ($debtorLoans as $loans)
                        <tr>
                            <td>{{ $loans->amount }} Francs CFA</td>
                            <td>{{ $loans->startline }}</td>
                            <td>{{ $loans->value }}%</td>
                            <td>{{ $loans->deadline }}</td>
                        </tr>
                        @empty
                    </table><br />
                    <div class="">Il semble que vous n'avez aucun prêt enregistré pour l'instant.</div>
                    @endforelse
                    </table>
                    </p>

                    <hr>

                    <div>
                        <table>
                            <tr>
                                @if ($countLoans > 0) <td>
                                    <form method="GET" action="{{ route('myrepayments') }}">
                                        @csrf

                                        <button type="submit">VOIR MES REMBOURSEMENTS</button>
                                    </form>
                                </td>
                                @endif
                                <td>
                                    <form method="GET" action="{{ route('dashboard') }}">
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

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>
