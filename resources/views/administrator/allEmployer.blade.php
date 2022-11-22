<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Liste des employeurs</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition employerlist-page">
    <div class="employerlist-box">
        <div class="card">
            <div class="card-body employerlist-card-body">
                <p class="employerlist-box-msg">
                <h1 class="">Liste des employeurs</h1>
                </p>

                <ol class="">
                    @forelse ($allEmployer as $employers)
                    <li><a href="{{ route('showemployer', $employers->id) }}" class="">{{ $employers->servicename }}</a></li>
                    @empty
                    <p class="employerlist-box-msg">Aucun employeur enregistré! :-) </p>
                    @endforelse
                </ol>

                <hr>

                <div class="employerlist-box-close">
                    <form action="{{ route('dashboard') }}" method="GET">
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
