<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inscription employeur</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="card">
            <div class="card-body register-card-body">
                <p class="register-box-msg">
                <h1>Création d'un compte employeur</h1>
                </p>

                <div class="register-box-error">
                    @if ($errors->has('email'))
                    <strong class="btn btn-danger">{{ $errors->first('email') }}</strong>
                    @endif
                </div>

                <form action="{{ route ('registeremployer') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <label for="Servicename">Nom de la structure : </label>
                        <input type="text" class="form-control" id="Servicename" name="servicename" required />
                    </div>
                    <div class="input-group mb-3">
                        <label for="Email">Adresse E-mail : </label>
                        <input type="email" class="form-control" id="Email" name="email" required />
                    </div>
                    <div class="input-group mb-3">
                        <label for="Telephone">Numéro de téléphone : </label>
                        <input type="text" class="form-control" placeholder="226 " id="Telephone" name="telephone" required />
                    </div>
                    <div class="input-group mb-3">
                        <label for="Password">Mot de passe : </label>
                        <input type="password" class="form-control" id="Password" name="password" required />
                    </div>
                    <div class="input-group mb-3">
                        <label for="ConfirmPassword">Confirmer le mot de passe : </label>
                        <input type="password" class="form-control" id="ConfirmPassword" name="confirmpassword" required />
                    </div>

                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Valider</button>
                    </div>
                    <!-- /.col -->
                </form>
            </div>
            <!-- /.form-box -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>
