<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modification redevable</title>

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
                <h1>Modification d'un compte redevable</h1>
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

                <form action="{{ route ('updatedebtor', $editDebtor->id) }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <label for="Firstname">Prénom : </label>
                        <input type="text" class="form-control" id="Firstname" name="firstname" value="{{ $editDebtor->firstname }}" required />
                    </div>
                    <div class="input-group mb-3">
                        <label for="Lastname">Nom : </label>
                        <input type="text" class="form-control" id="Lastname" name="lastname" value="{{ $editDebtor->lastname }}" required />
                    </div>
                    <div class="input-group mb-3">
                        <label for="Email">Adresse E-mail : </label>
                        <input type="email" class="form-control" id="Email" name="email" value="{{ $editDebtor->email }}" required />
                    </div>
                    <div class="input-group mb-3">
                        <label for="Telephone">Numéro de téléphone : </label>
                        <input type="telephone" class="form-control" id="Telephone" name="telephone" value="{{ $editDebtor->telephone }}" required />
                    </div>
                    <div class="input-group mb-3">
                        <label for="Matricule">Numéro matricule : </label>
                        <input type="text" class="form-control" id="Matricule" name="matricule" value="{{ $editDebtor->matricule }}" required />
                    </div>

                    <div class="input-group mb-3">
                        <label for="Debtorindex">Lieu de travail : </label>
                        <select id="Debtorindex" name="debtorindex">
                            @forelse($allService as $services)
                            <option value="{{ $services->serviceindex }}">{{ $services->servicename }}</option>
                            @empty
                            <p class="update-box-msg">Aucune structure enregistrée. :-)</p>
                            @endforelse
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
                    <form action="{{ route('dashboard') }}" method="GET">
                        @csrf

                        <button type="submit">Fermer</button>
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
