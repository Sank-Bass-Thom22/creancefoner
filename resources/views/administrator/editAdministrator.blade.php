<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modification administrateur</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition edit-page">
    <div class="edit-box">
        <div class="card">
            <div class="card-body edit-card-body">
                <p class="edit-box-msg">
                <h1>Modification d'un compte administrateur</h1>
                </p>

                <p class="edit-box-error">
                    @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                    <li><strong class="alert alert-danger">{{ $error }}</strong></li>
                    @endforeach
                </ul>
                @endif
                </p>

                <form action="{{ route('updateadminsup', $editAdministrator->id) }}" method="POST">
                    @csrf

                    <div class="input-group mb-3">
                        <label for="Firstname">Prénom : </label>
                        <input type="text" class="form-control" id="Firstname" name="firstname" value="{{ $editAdministrator->firstname }}" required />
                    </div>
                    <div class="input-group mb-3">
                        <label for="Lastname">Nom : </label>
                        <input type="text" class="form-control" id="Lastname" name="lastname" value="{{ $editAdministrator->lastname }}" required />
                    </div>
                    <div class="input-group mb-3">
                        <label for="Email">Adresse E-mail : </label>
                        <input type="email" class="form-control" id="Email" name="email" value="{{ $editAdministrator->email }}" required />
                    </div>
                    <div class="input-group mb-3">
                        <label for="Telephone">Numéro de téléphone : </label>
                        <input type="text" class="form-control" id="Telephone" name="telephone" value="{{ $editAdministrator->telephone }}" required />
                    </div>
                    <div class="input-group mb-3">
                        <label for="Password">Mot de passe : </label>
                        <input type="password" class="form-control" id="Password" name="password" required autocomplete="new-password" />
                    </div>
                    <div class="input-group mb-3">
                        <label for="Password_confirmation">Confirmer le mot de passe : </label>
                        <input type="password" class="form-control" id="Password_confirmation" name="password_confirmation" required />
                    </div>
                    <div class="input-group mb-3">
                        <label for="Role">Niveau d'administration : </label>
                        <select class="form-control" id="Role" name="role">
                            <option value="SimpleAdmin" selected>Simple</option>
                            <option value="SuperAdmin">Super</option>
                        </select>
                    </div>

                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">VALIDER</button>
                    </div>
                    <!-- /.col -->
                </form>

                <hr>

                <div class="adminlist-box-close">
                    <form action="{{ route('showadminsup', $editAdministrator->id) }}" method="GET">
                        @csrf

                        <button type="submit">FERMER</button>
                    </form>
                </div>
            </div>
            <!-- /.form-box -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.edit-box -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>
