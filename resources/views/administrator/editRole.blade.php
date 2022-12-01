<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modification-Role</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition updaterole-page">
    <div class="updaterole-box">
        <div class="card">
            <div class="card-body updaterole-card-body">
                <p class="updaterole-box-msg">
                <h1>Modification niveau d'administration</h1>
                </p><br />

                <p class="updaterole-box-error">
                    @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                    <strong class="alert alert-danger">{{ $error }}</strong>
                    @endforeach
                </ul><br />
                @endif
                </p>

                <p class="updaterole-box-success">
                    @if (session()->get('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div><br />
                @endif
                </p>

                <form action="{{ route ('updaterole', $administratorProfile->id) }}" method="POST">
                    @csrf

                    <div class="input-group mb-3">
                        <label for="Role">Niveau d'administration : </label>
                        <select class="form-control" id="Role" name="role" required>
                            <option></option>
                            <option value="SimpleAdmin">Simple</option>
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

                <div class="admin-box-close">
                    @if ($administratorProfile->id == Auth::user()->id)
                    <form action="{{ route('myadminprofile') }}" method="GET">
                        @csrf

                        <button type="submit">FERMER</button>
                    </form>
                    @else
                    <form action="{{ route('showadminsup', $administratorProfile->id) }}" method="GET">
                        @csrf

                        <button type="submit">FERMER</button>
                    </form>
                    @endif
                </div>
            </div>
            <!-- /.form-box -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.updaterole-box -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>