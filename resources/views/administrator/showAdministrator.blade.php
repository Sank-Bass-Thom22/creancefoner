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
                <h1 class="">Détail administrateurs</h1>
                </p>

                <p class="admindetail-box-success">
                    @if (session()->get('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                </p>

                <ul class="">
<li>Prénom : {{ $showAdministrator->firstname }}</li>
<li>Nom : {{ $showAdministrator->lastname }}</li>
<li>Adresse E-mail : {{ $showAdministrator->email }}</li>
<li>Numéro de téléphone : +226 {{ $showAdministrator->telephone }}</li>
<li>Niveau de responsabilité : {{ $showAdministrator->role }}</li>
                </ul>

                <hr>

                <div class="admindetail-box-close">
                    <table>
                        <tr>
                            <td>
                                <form action="{{ route ('editadminsup', $showAdministrator->id) }}" method="GET">''
                                    @csrf

                                    <button type="submit">MODIFIER</button>
                                </form>
                            </td>
                            <td>
                    <form action="{{ route('alladminsup') }}" method="GET">
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
