<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Détail employer</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition adminemployer-page">
    <div class="adminemployer-box">
        <div class="card">
            <div class="card-body adminemployer-card-body">
                <p class="adminemployer-box-msg">
                <h1 class="">Détail employer</h1>
                </p><br />

                <p class="adminemployer-box-success">
                    @if (session()->get('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div><br />
                @endif
                </p>

                <section class="main">
                    <p>
                    <h3>Raison sociale</h3>
                    <ul class="">
                        Nom de la structure : {{ $showEmployer->servicename }}<br />
                        <div>
                            <form method="GET" action="{{ route('editemployer', ['id' => $showEmployer->id, 'resource' => 'editServicename']) }}">
                                @csrf

                                <button type="submit">MODIFIER</button>
                            </form>
                        </div><br />

                        Adresse E-mail : {{ $showEmployer->email }}<br />
                        <div>
                            <form method="GET" action="{{ route('editemployer', ['id' => $showEmployer->id, 'resource' => 'editEmployerEmail']) }}">
                                @csrf

                                <button type="submit">MODIFIER</button>
                            </form>
                        </div><br />

                        Numéro de téléphone : +226 {{ $showEmployer->telephone }}<br />
                        <div>
                            <form method="GET" action="{{ route('editemployer', ['id' => $showEmployer->id, 'resource' => 'editEmployerTelephone']) }}">
                                @csrf

                                <button type="submit">MODIFIER</button>
                            </form>
                        </div><br />

                        Mot de passe :
                        <div>
                            <form method="GET" action="{{ route('empregenerate', $showEmployer->id) }}">
                                @csrf

                                <button type="submit">REGÉNÉRER</button>
                            </form>
                        </div><br />

                        Nombre d'employé redevable : {{ $countDebtor }}
                    </ul>
                    </p>
                </section>

                <hr>

                <div class="adminemployer-box-close">
                    <table>
                        <tr>
                            <td>
                                <form action="" method="">
                                    @csrf

                                    <button type="submit" class="">Voir plus</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('allemployer') }}" method="GET">
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
