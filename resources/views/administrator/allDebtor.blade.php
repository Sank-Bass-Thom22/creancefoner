<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Liste des redevables</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition debtorlist-page">
    <div class="debtorlist-box">
        <div class="card">
            <div class="card-body debtorlist-card-body">
                <p class="debtorlist-box-msg">
                <h1 class="">Liste des redevables</h1>
                </p><br />

                <p class="search-box">
                <h3>Zone de recherche</h3>
                <form method="POST" action="{{ route ('researchdebtor') }}">
                    @csrf

                    <div class="">
                        <label for="Research">Recherchez un redevable : </label>
                        <input type="search" class="" id="Research" name="research" required />
                    </div>
                    <span class="">
                        <button type="">RECHERCHER</button>
                    </span>
                </form>
                </p><br />

                <section class="research-box">
                    @if (isset($key))
                    <br /><h3>Résultat de recherche :</h3>
                    <ol>
                        @forelse ($result as $search)
                        <li><a href="{{ route ('showdebtor', $search->id) }}" class="">{{ $search->firstname }} {{ $search->lastname }}</a></li>
                        @empty
                        <div class="">Aucun resultat.</div>
                        @endforelse
                    </ol><br /><br />
                    @endif
                </section>

                <section class="main">
                <ol class="">
                    @forelse ($allDebtor as $debtors)
                    <li><a href="{{ route('showdebtor', $debtors->id) }}" class="">{{ $debtors->firstname }} {{ $debtors->lastname }}</a></li>
                    @empty
                    <div class="debtorlist-box-msg">{{ $message }}</div>
                    @endforelse
                </ol>
                </section>

                <hr>

                <div class="debtorlist-box-close">
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
