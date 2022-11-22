<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Documents utils</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition documentlist-page">
    <div class="documentlist-box">
        <div class="card">
            <div class="card-body documentlist-card-body">
                <p class="documentlist-box-msg">
                <h1 class="">Documents utils</h1>
                </p>

                <table class="">
                    <tr>
                        <th>TITRE</th>
                        <th>FICHIER</th>
                        <th>OPTION SUPPLÉMENTAIRE</th>
                    </tr>
                    @forelse ($allDocument as $documents)
                    <tr>
                        <td>{{ $documents->title }}</td>
                        <td>
                            <a href="/storage/{{ $documents->filelink }}" class="" download="">Télécharger</a>
                        </td>
                        <td>
                            <a href="{{ route('showdocument', $documents->id) }}" class="">VOIR PLUS</a>
                        </td>
                    </tr>
                    @empty
                </table><br />
                <p class="documentlist-box-msg">Aucun document enregistré! 😞</p>
                @endforelse
                </table>

                <hr>

                <div class="documentlist-box-close">
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
