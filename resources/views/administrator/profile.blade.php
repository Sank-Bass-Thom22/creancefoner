<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile-Administrateur</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition profile-page">
    <div class="profile-box">
        <div class="card">
            <div class="card-body profile-card-body">
                <p class="profile-box-msg">
                <h1 class="">Mon profile</h1>
                </p><br />

                <p class="profile-box-success">
                    @if (session()->get('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div><br />
                @endif
                </p>

                <section>
                    <p>
                    <h2>Informations personnelles</h2>
                    <ul>
                        Prénom : {{ $administratorProfile->firstname }}<br />
                        Nom : {{ $administratorProfile->lastname }}<br />
                        <div>
                            <form method="GET" action="{{ route('editadministrator', 0, 'editFullname') }}">
                                @csrf

                                <button type="submit">MODIFIER</button>
                            </form>
                        </div><br />

                        Adresse E-mail : {{ $administratorProfile->email }}<br />
                        <div>
                            <form method="GET" action="{{ route('editadministrator', 0, 'editEmail') }}">
                                @csrf

                                <button type="submit">MODIFIER</button>
                            </form>
                        </div><br />

                        Numéro de téléphone : +226 {{ $administratorProfile->telephone }}
                        <div>
                            <form method="GET" action="{{ route('editadministrator', 0, 'editTelephone') }}">
                                @csrf

                                <button type="submit">MODIFIER</button>
                            </form>
                        </div><br />

                        Mot de passe :
                        <div>
                            <form method="GET" action="{{ route('editadministrator', 0, 'editPassword') }}">
                                @csrf

                                <button type="submit">MODIFIER</button>
                            </form>
                        </div>
                    </ul>
                    </p>

                    <hr>

                    <div class="">
                        <form method="GET" action="{{ route('dashboard') }}">
                            @csrf

                            <button type="submit">FERMER</button>
                        </form>
                    </div>
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
