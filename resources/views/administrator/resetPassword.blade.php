<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modification-Password</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition updatepassword-page">
    <div class="updatepassword-box">
        <div class="card">
            <div class="card-body updatepassword-card-body">
                <p class="updatepassword-box-msg">
                <h1>Modification mot de passe</h1>
                </p><br />

                <p class="updatepassword-box-error">
                    @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                    <strong class="alert alert-danger">{{ $error }}</strong>
                    @endforeach
                </ul><br />
                @endif
                </p>

                <p class="updatepassword-box-success">
                    @if (session()->get('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div><br />
                @endif
                </p>

                <form action="{{ route ('updatepassword', $administratorProfile->id) }}" method="POST">
                    @csrf

                    <div class="">
                        <label for="Oldpassword">Mot de passe actuel : </label>
                        <input id="Oldpassword" class="" type="password" name="oldpassword" required />
                    </div>
                    <div class="">
                        <label for="Password">Nouveau mot de passe : </label>
                        <input id="Password" class="" type="password" name="password" required />
                    </div>
                    <div class="">
                        <label for="Password_confirmation">Confirmez le nouveau mot de passe : </label>
                        <input id="Password_confirmation" class="" type="password" name="password_confirmation" required />
                    </div>

                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">VALIDER</button>
                    </div>
                    <!-- /.col -->
                </form>

                <hr>

                <div class="debtor-box-close">
                    <form action="{{ route('myadminprofile') }}" method="GET">
                        @csrf

                        <button type="submit">FERMER</button>
                    </form>
                </div>
            </div>
            <!-- /.form-box -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.updatepassword-box -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>
