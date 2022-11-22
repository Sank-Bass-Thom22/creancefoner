<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>

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
                </p>

                <p class="profile-box-success">
                    @if (session()->get('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                </p>

                <section>
                    <p>
                    <h2>Informations personnelles</h2>
                    <ul>
                        Prénom : {{ $debtorProfile->firstname }}<br />
                        Nom : {{ $debtorProfile->lastname }}<br />
                        Adresse E-mail : {{ $debtorProfile->email }}<br />
                        Numéro de téléphone : {{ $debtorProfile->telephone }}
                    </ul>
                    </p>

                    <p>
                    <h2>Service</h2>
                    <ul>
Nom de la structure : {{ $debtorService->servicename }}<br />
Adresse E-mail : {{ $debtorService->email }}<br />
Numéro de téléphone : {{ $debtorService->telephone }}
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
