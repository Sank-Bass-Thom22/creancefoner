<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Liste des administrateurs</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition adminlist-page">
    <div class="adminlist-box">
        <div class="card">
            <div class="card-body adminlist-card-body">
                <p class="adminlist-box-msg">
                <h1 class="">Liste des administrateurs</h1>
                </p>

                <ul class="">
                    @forelse ($allAdministrator as $administrators)
                    <li><a href="" class="" return="false">{{ $administrators->firstname }} {{ $administrators->lastname }}</a></li>
                    @empty
                    <p class="adminlist-box-msg">Aucun administrateur enregistré! :-) </p>
                    @endforelse
                </ul>

                <hr>

                <div class="adminlist-box-close">
                    <form action="{{ route('dashboard') }}" method="GET">
                        @csrf

                        <button type="submit">Fermer</button>
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
