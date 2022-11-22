<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Détail des prêts</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition loandetail-page">
    <div class="loandetail-box">
        <div class="card">
            <div class="card-body loandetail-card-body">
                <p class="loandetail-box-msg">
                <h1 class="">Détail des prêts contractés</h1>
                </p>

                <p class="loandetail-box-success">
                    @if (session()->get('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                </p>

                <p class="loandetail-box-success">
                    @if (session()->has('fullname'))
                <div class="alert alert-success">{{ session()->get('fullname') }}</div>
                @endif
                </p>

                <p class="loan-list">
                <table class="tab">
                    <tr>
                        <th>MONTANT</th>
                        <th>CONTRACTÉ LE</th>
                        <th>TAUX APPLICABLE</th>
                        <th>DATE DE CLOTURE</th>
                        <th>OPTION</th>
                    </tr>
                    @forelse($showLoan as $loans)
                    <tr>
                        <td>{{ $loans->amount }} Francs CFA</td>
                        <td>{{ $loans->startline }}</td>
                        <td>{{ $loans->value }}%</td>
                        <td>{{ $loans->deadline }}</td>
                        <td>
                            <form action="{{ route ('editloan', $loans->id) }}" method="GET">
                                @csrf

                                <button type="submit">MODIFIER</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                </table><br />
                <p class="">Aucun prêt enregistré pour le moment! 😞</p>
                @endforelse
                </table>
                </p>

                <hr>

                <div class="loandetail-box-close">
                    <table>
                        <tr>
                            @if ($countLoan < 15) <td>
                                <form action="{{ route ('createloannow', $id) }}" method="GET">
                                    @csrf

                                    <button type="submit">ENREGISTRER</button>
                                </form>
                                </td>
                                @endif
                                @if ($countLoan > 0)
                                <td>
                                    <form action="{{ route ('showrepayment', $id) }}" method="GET">
                                        @csrf

                                        <button type="submit">VOIR PLUS</button>
                                    </form>
                                </td>
                                @endif
                                <td>
                                    <form action="{{ route('showdebtor', $id) }}" method="GET">
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
