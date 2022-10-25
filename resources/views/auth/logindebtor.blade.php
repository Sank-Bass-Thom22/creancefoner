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

      <div>
        @if ($errors->has('email'))
        <strong>{{ $errors->first('email') }}</strong>
        @endif
      </div>

      <form action="{{ route ('logindebtor') }}" method="POST">
        @csrf
        <div class="input-group mb-3">
          <label for="Email">Adresse E-mail : </label>
          <input type="email" class="form-control" id="Email" name="email" required />
        </div>
        <div class="input-group mb-3">
          <label for="Matricule">Numéro matricule : </label>
          <input type="text" class="form-control" id="Matricule" name="matricule" required />
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
