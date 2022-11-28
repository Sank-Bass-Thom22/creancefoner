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
                </p><br />

                <p class="debtordetail-box-success">
                    @if (session()->get('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div><br />
                @endif
                </p>

                <section class="main">
                    <p>
                    <h2 class="">Informations personnelles</h2>

                    <ul class="">
                        Prénom : {{ $showDebtor->firstname }}<br />
                        Nom : {{ $showDebtor->lastname }}<br />
                        <div>
                            <form method="GET" action="{{ route ('editdebtor', ['id' => $showDebtor->id, 'resource' => 'editDebtorFullname']) }}">
                                @csrf

                                <button type="submit">MODIFIER</button>
                            </form>
                        </div><br />

                        Adresse E-mail : {{ $showDebtor->email }}<br />
                        <div>
                            <form method="GET" action="{{ route ('editdebtor', ['id' => $showDebtor->id, 'resource' => 'editDebtorEmail']) }}">
                                @csrf

                                <button type="submit">MODIFIER</button>
                            </form>
                        </div><br />

                        Numéro de téléphone : +226 {{ $showDebtor->telephone }}<br />
                        <div>
                            <form method="GET" action="{{ route ('editdebtor', ['id' => $showDebtor->id, 'resource' => 'editDebtorTelephone']) }}">
                                @csrf

                                <button type="submit">MODIFIER</button>
                            </form>
                        </div><br />

                        Numéro matricule : {{ $showDebtor->matricule }}<br />
                        <div>
                            <form method="GET" action="{{ route ('editdebtor', ['id' => $showDebtor->id, 'resource' => 'editDebtorMatricule']) }}">
                                @csrf

                                <button type="submit">MODIFIER</button>
                            </form>
                        </div><br />

                        Mot de passe :
                        <div>
                            <form method="GET" action="{{ route ('debregenerate', $showDebtor->id) }}">
                                @csrf

                                <button type="submit">REGÉNÉRER</button>
                            </form>
                        </div>
                    </ul>
                    </p><br />

                    <p>
                    <h2 class="">Service</h2>

                    <ul class="">
                        Service : {{ $debtorService->servicename }}<br />
                        Adresse E-mail : {{ $debtorService->email }}<br />
                        Téléphone : +226 {{ $debtorService->telephone }}<br />
                        <div>
                            <form method="GET" action="{{ route('editdebtor', ['id' => $showDebtor->id, 'resource' => 'editDebtorService']) }}">
                                @csrf

                                <button type="submit">MODIFIER LE SERVICE</button>
                            </form>
                        </div>
                    </ul>
                    </p>
                </section>

                <hr>

                <div class="debtordetail-box-close">
                    <table>
                        <tr>
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
