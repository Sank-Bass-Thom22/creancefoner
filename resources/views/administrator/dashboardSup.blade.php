<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Créance FONER dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition dashboard-page">
    <div class="dashboard-box">
        <div class="card">
            <div class="card-body dashboard-card-body">
                <section class="header">
                    <p class="dashboard-box-msg">
                    <div class="">
                        {{ Auth::user()->firstname }}
                    </div>
                    <div class="dashboard-box-close">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf

                            <button type="submit">Se déconnecter</button>
                        </form>
                    </div>
                    </p>
                </section><br /><br />

                <section class="main">
                    <p class="menu-item-1">
                    <h1>Comptes</h1>

                    <h2>Administrateur</h2>

                    <ul>
                        <a href="{{ route('alladminsup') }}">Liste des administrateurs</a><br />
                        <a href="{{ route('registeradminsup') }}">Nommer un administrateur</a>
                    </ul>

                    <h2>Employeur</h2>

                    <ul>
                        <a href="{{ route('allemployer') }}">Liste des employeurs</a><br />
                        <a href="{{ route('registeremployer') }}">Enregistrer un employeur</a>
                    </ul>

                    <h2>Redevable</h2>

                    <ul>
                        <a href="{{ route('alldebtor') }}">Liste des redevables</a><br />
                        <a href="{{ route('registerdebtor') }}">Enregistrer un redevable</a>
                    </ul>
                    </p>

                    <p class="menu-item-2">
                    <h1>Informations Générales</h1>

                    <h2>Documents utils</h2>

                    <ul>
                        <a href="{{ route ('alldocument') }}" class="">Liste des documents</a><br />
                        <a href="{{ route('createdocument') }}" class="">Importer un document</a>
                    </ul>

                    <h2>Taux de remboursement</h2>

                    <ul>
                        <a href="{{ route('allrate') }}" class="">Liste des taux</a><br />
                        <a href="{{ route('createratesup') }}" class="">Enregistrer un taux de remboursement</a>
                    </ul>

                    <h2>Grille de remboursement</h2>

                    <ul>
                        <a href="{{ route ('allrepaymentamount') }}" class="">Voir la grille</a><br />
                        <a href="{{ route ('createrepaymentamountsup') }}" class="">Ajouter une grille</a>
                    </ul>
                    </p>
                </section>
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
