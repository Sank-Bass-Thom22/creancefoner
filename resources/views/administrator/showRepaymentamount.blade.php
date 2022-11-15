<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Détail grille</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition showrepaymentamount-page">
    <div class="showrepaymentamount-box">
        <div class="card">
            <div class="card-body showrepaymentamount-card-body">
                <p class="showrepaymentamount-box-msg">
                <h1 class="">Détail grille</h1>
                </p>

                <p class="showrepaymentamount-box-success">
                    @if (session()->get('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                </p>

                <ul class="">
                    <li>MONTANT MINIMAL : {{ $showRepaymentamount->minamount }} Francs CFA</li>
                    <li>MONTANT MAXIMAL : {{ $showRepaymentamount->maxamount }} Francs CFA</li>
                    <li>Description : {{ $showRepaymentamount->description }}</li>
                </ul>

                <hr>

                <div class="showrepaymentamount-box-close">
                    <table>
                        <tr>
                            @if (Auth::user()->role === "SuperAdmin")
                            <td>
                                <form action="{{ route ('editrepaymentamountsup', $showRepaymentamount->id) }}" method="GET">''
                                    @csrf

                                    <button type="submit" class="">MODIFIER</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('destroyrepaymentamountsup', $showRepaymentamount->id) }}" method="POST">
                                    @csrf

                                    <button type="submit" class="">SUPPRIMER</button>
                                </form>
                            </td>
                            @endif
                            <td>
                                <form action="{{ route('allrepaymentamount') }}" method="GET">
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

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>
