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
                    {{ Auth::user()->servicename }}
                </div>
                <div class="dashboard-box-close">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf

                        <button type="submit">Se déconnecter</button>
                    </form>
                </div>
                </p>

                <section class="main">
                    <p>
                    <h1>Mes employés</h1>
                    <ul>
                        <a href="{{ route('myemployes') }}">VOIR</a>
                    </ul>
                    </p><br />

                    <p>
                    <h1>Mon profile</h1>
                    <ul>
                        <a href="{{ route('myemployerprofile') }}">VOIR</a>
                    </ul>
                    </p><br />

                    <p>
                    <h1>Documents utils</h1>
                    <ul>
                        <a href="{{ route('documents') }}">VOIR</a>
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
