<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modification-Debtor-Service</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition updateservice-page">
    <div class="updateservice-box">
        <div class="card">
            <div class="card-body updateservice-card-body">
                <p class="updateservice-box-msg">
                <h1>Modification service</h1>
                </p><br />

                <p class="updateservice-box-error">
                    @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                    <strong class="alert alert-danger">{{ $error }}</strong>
                    @endforeach
                </ul><br />
                @endif
                </p>

                <p class="updateservice-box-success">
                    @if (session()->get('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div><br />
                @endif
                </p>

                <section class="main">
                    <div>{{ $debtorProfile->firstname }} {{ $debtorProfile->lastname }}</div><br />

                    <form action="{{ route ('updatedebtorservice', $debtorProfile->id) }}" method="POST">
                        @csrf

                        <div class="input-group mb-3">
                            <label for="Serviceindex">Lieu de travail : </label>
                            <select id="Serviceindex" name="serviceindex" required>
                                <option></option>
                                @forelse($allServices as $services)
                                <option value="{{ $services->serviceindex }}">{{ $services->servicename }}</option>
                                @empty
                            </select><br />
                            <div class="">Aucune structure enregistrée! 😞 </div>
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

                    <div class="admin-box-close">
                        <form action="{{ route('showdebtor', $debtorProfile->id) }}" method="GET">
                            @csrf

                            <button type="submit">FERMER</button>
                        </form>
                    </div>
            </div>
            <!-- /.form-box -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.updateservice-box -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>
