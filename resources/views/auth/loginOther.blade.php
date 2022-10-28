<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Créance FONER Connexion</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">
            <h1>Connexion</h1>
            </p>

            <p class="login-box-error">
                @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                <li><strong class="alert alert-danger">{{ $error }}</strong></li>
                @endforeach
            </ul>
            @endif
            </p>

            <form action="{{ route('loginother') }}" method="POST">
                @csrf

                <div class="input-group mb-3">
                    <label for="Email">Adresse E-mail : </label>
                    <input type="email" class="form-control" id="Email" name="email" required />
                </div>

                <div class="input-group mb-3">
                    <label for="Password">Mot de passe : </label>
                    <input type="password" class="form-control" id="Password" name="password" required />
                </div>

                <div class="row">
                    <input type="checkbox" id="Remember" name="remember" />
                    <label for="Remember">
                        Se souvenir de moi
                    </label>
                </div>

                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Se Connecter</button>
                </div>
                <!-- /.col -->
        </div>
        </form>

        <p class="mb-1">
            <a href="">Mot de passe oublié ?</a>
        </p>
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
