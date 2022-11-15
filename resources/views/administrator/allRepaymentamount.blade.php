<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Grille</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition repaymentamountlist-page">
    <div class="repaymentamountlist-box">
        <div class="card">
            <div class="card-body repaymentamountlist-card-body">
                <p class="repaymentamountlist-box-msg">
                <h1 class="">Grille</h1>
                </p>

                <table class="">
                    <tr>
                        <th>MONTANT MINIMAL</th>
                        <th>MONTANT MAXIMAL</th>
                        <th>OPTION SUPPLÉMENTAIRE</th>
                    </tr>
                    @forelse ($allRepaymentamount as $repaymentamounts)
                    <tr>
                        <td>{{ $repaymentamounts->minamount }} Francs CFA</td>
                        <td>{{ $repaymentamounts->maxamount }} Francs CFA</td>
                        <td><a href="{{ route('showrepaymentamount', $repaymentamounts->id) }}" class="">VOIR PLUS</a></td>
                    </tr>
                    @empty
                </table><br />
                <p class="repaymentamountlist-box-msg">Aucune grille enregistrée! 😞</p>
                @endforelse
                </table>

                <hr>

                <div class="repaymentamountlist-box-close">
                    <form action="{{ route('dashboard') }}" method="GET">
                        @csrf

                        <button type="submit">Fermer</button>
                    </form>
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
