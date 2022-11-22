<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Détail redevable</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition debtordetail-page">
    <div class="debtordetail-box">
        <div class="card">
            <div class="card-body debtordetail-card-body">
                <p class="debtordetail-box-msg">
                <h1 class="">Détail redevable</h1>
                </p>

                <p class="debtordetail-box-success">
                    @if (session()->get('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                </p>

                <p class="">
                <h2 class="">Informations personnelles</h2>

                <ul class="">
                    <li>Prénom : {{ $showDebtor->firstname }}</li>
                    <li>Nom : {{ $showDebtor->lastname }}</li>
                    <li>Adresse E-mail : {{ $showDebtor->email }}</li>
                    <li>Numéro de téléphone : +226 {{ $showDebtor->telephone }}</li>
                </ul>
                </p>

                <p class="">
                <h2 class="">Service</h2>

                <ul class="">
                    <li>Service : {{ $debtorService->servicename }}</li>
                    <li>Adresse E-mail : {{ $debtorService->email }}</li>
                    <li>Téléphone : +226 {{ $debtorService->telephone }}</li>
                </ul>
                </p>

                <hr>

                <div class="debtordetail-box-close">
                    <table>
                        <tr>
                            <td>
                                <form action="{{ route ('editdebtor', $showDebtor->id) }}" method="GET">
                                    @csrf

                                    <button type="submit">MODIFIER</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route ('showloan', $showDebtor->id) }}" method="GET">
                                    @csrf

                                    <button type="submit">VOIR PLUS</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('alldebtor') }}" method="GET">
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
