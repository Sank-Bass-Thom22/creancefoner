<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Détail administrateurs</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition admindetail-page">
    <div class="admindetail-box">
        <div class="card">
            <div class="card-body admindetail-card-body">
                <p class="admindetail-box-msg">
                <h1 class="">Informations détaillées</h1>
                </p><br />

                <p class="admindetail-box-success">
                    @if (session()->get('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div><br />
                @endif
                </p>

                <section class="main">
                    <p>
                    <h3>Informations personnelles</h3>
                    <ul>
                        Prénom : {{ $showAdministrator->firstname }}<br />
                        Nom : {{ $showAdministrator->lastname }}<br />
                        <div>
                            <form method="GET" action="{{ route('editadministrator', ['id' => $showAdministrator->id, 'resource' => 'editFullname']) }}">
                                @csrf

                                <button type="submit">MODIFIER</button>
                            </form>
                        </div><br />

                        Adresse E-mail : {{ $showAdministrator->email }}<br />
                        <div>
                            <form method="GET" action="{{ route('editadministrator', ['id' => $showAdministrator->id, 'resource' => 'editEmail']) }}">
                                @csrf

                                <button type="submit">MODIFIER</button>
                            </form>
                        </div><br />

                        Numéro de téléphone : +226 {{ $showAdministrator->telephone }}<br />
                        <div>
                            <form method="GET" action="{{ route('editadministrator', ['id' => $showAdministrator->id, 'resource' => 'editTelephone']) }}">
                                @csrf

                                <button type="submit">MODIFIER</button>
                            </form>
                        </div><br />

                        Niveau de responsabilité : {{ $showAdministrator->role }}<br />
                        <div>
                            <form method="GET" action="{{ route('editadministrator', ['id' => $showAdministrator->id, 'resource' => 'editRole']) }}">
                                @csrf

                                <button type="submit">MODIFIER</button>
                            </form>
                        </div><br />

                        Mot de passe :
                        <div>
                            <form method="GET" action="{{ route('regenerate', $showAdministrator->id) }}">
                                @csrf

                                <button type="submit">REGÉNÉRER</button>
                            </form>
                        </div>
                    </ul>

                    <hr>

                    <div class="admindetail-box-close">
                        <form action="{{ route('alladminsup') }}" method="GET">
                            @csrf

                            <button type="submit">FERMER</button>
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
