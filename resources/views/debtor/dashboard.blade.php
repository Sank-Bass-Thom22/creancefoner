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
                <p class="dashboard-box-msg">
                <div class="">
                    {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
                </div>
                <div class="dashboard-box-close">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf

                        <button type="submit">Se déconnecter</button>
                    </form>
                </div>
                </p><br />

                <section class="">
                    <p>
                    <h1>Mes prêts</h1>
                    <a href="#">VOIR</a>
                    </p><br />

                    <p>
                    <h1>Mon échéancier</h1>
                    <ul>
                        <a href="#">Simuler un échéancier</a><br />
                        <a href="#">Définir un échéancier</a>
                    </ul>
                    </p><br />

                    <p>
                    <h1>Mon profile</h1>
                    <ul>
                        <a href="{{ route('myprofile') }}">VOIR</a>
                    </ul>
                    </p><br />

                    <p>
                    <h1>Documents utils</h1>
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
