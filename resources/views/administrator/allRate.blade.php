<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Liste des taux applicables</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition ratelist-page">
    <div class="ratelist-box">
        <div class="card">
            <div class="card-body ratelist-card-body">
                <p class="ratelist-box-msg">
                <h1 class="">Liste des taux</h1>
                </p>

                <table class="">
                    <tr>
                        <th>TAUX</th>
                        <th>VALIDITÉ</th>
                        <th>OPTION SUPPLÉMENTAIRE</th>
                    </tr>
                    @forelse ($allRate as $rates)
                    <tr>
                        <td>{{ $rates->value }}%</td>
                        <td>{{ $rates->validity }}</td>
                        <td><a href="{{ route('showrate', $rates->id) }}" class="">VOIR PLUS</a></td>
                    </tr>
                    @empty
                </table><br />
                <p class="ratelist-box-msg">Aucun taux enregistré! 😞</p>
                @endforelse
                </table>

                <hr>

                <div class="ratelist-box-close">
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
