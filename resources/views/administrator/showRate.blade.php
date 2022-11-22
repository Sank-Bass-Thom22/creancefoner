<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Détail rate</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition showrate-page">
    <div class="showrate-box">
        <div class="card">
            <div class="card-body showrate-card-body">
                <p class="showrate-box-msg">
                <h1 class="">Détail taux</h1>
                </p>

                <p class="showrate-box-success">
                    @if (session()->get('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                </p>

                <ul class="">
                    <li>Taux : {{ $showRate->value }}%</li>
                    <li>Valide jusqu'en : {{ $showRate->validity }}</li>
                    <li>Description : {{ $showRate->description }}</li>
                </ul>

                <hr>

                <div class="showrate-box-close">
                    <table>
                        <tr>
                            @if (Auth::user()->role === "SuperAdmin")
                            <td>
                                <form action="{{ route ('editratesup', $showRate->id) }}" method="GET">
                                    @csrf

                                    <button type="submit" class="">MODIFIER</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('destroyratesup', $showRate->id) }}" method="POST">
                                    @csrf

                                    <button type="submit" class="">SUPPRIMER</button>
                                </form>
                            </td>
                            @endif
                            <td>
                                <form action="{{ route('allrate') }}" method="GET">
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
