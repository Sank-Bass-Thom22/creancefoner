<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modification employeur</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition update-page">
    <div class="update-box">
        <div class="card">
            <div class="card-body update-card-body">
                <p class="update-box-msg">
                <h1>Modification d'un compte employeur</h1>
                </p>

                <p class="update-box-error">
                    @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                    <li><strong class="alert alert-danger">{{ $error }}</strong></li>
                    @endforeach
                </ul>
                @endif
                </p>

                <p class="update-box-success">
                    @if (session()->get('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                </p>

                <form action="{{ route ('updateemployer', $editEmployer->id) }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <label for="Servicename">Nom de la structure : </label>
                        <input type="text" class="form-control" id="Servicename" name="servicename" value="{{ $editEmployer->servicename }}" required />
                    </div>
                    <div class="input-group mb-3">
                        <label for="Email">Adresse E-mail : </label>
                        <input type="email" class="form-control" id="Email" name="email" value="{{ $editEmployer->email }}" required />
                    </div>
                    <div class="input-group mb-3">
                        <label for="Telephone">Numéro de téléphone : </label>
                        <input type="telephone" class="form-control" id="Telephone" name="telephone" value="{{ $editEmployer->telephone }}" required />
                    </div>
                    <div class="input-group mb-3">
                        <label for="Password">Mot de passe : </label>
                        <input type="password" class="form-control" id="Password" name="password" required autocomplete="new-password" />
                    </div>
                    <div class="input-group mb-3">
                        <label for="Password_confirmation">Confirmer le mot de passe : </label>
                        <input type="password" class="form-control" id="Password_confirmation" name="password_confirmation" required />
                    </div>

                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">VALIDER</button>
                    </div>
                    <!-- /.col -->
                </form>

                <hr>

                <div class="adminlist-box-close">
                    <form action="{{ route('showemployer', $editEmployer->id) }}" method="GET">
                        @csrf

                        <button type="submit">FERMER</button>
                    </form>
                </div>
            </div>
            <!-- /.form-box -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.update-box -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>
