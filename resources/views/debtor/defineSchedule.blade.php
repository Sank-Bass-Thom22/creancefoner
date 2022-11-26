<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Enregistrement d'un échéancier</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition defineschedule-page">
    <div class="defineschedule-box">
        <div class="card">
            <div class="card-body defineschedule-card-body">
                <p class="defineschedule-box-msg">
                <h1>Enregistrement d'un échéancier</h1>
                </p><br />

                <p class="defineschedule-box-error">
                    @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                    <strong class="alert alert-danger">{{ $error }}</strong>
                    @endforeach
                </ul><br />
                @endif
                </p>

                <p class="defineschedule-box-success">
                    @if (isset($message))
                <div class="alert alert-success">{{ $message }}</div><br />
                @endif
                </p>

                <section class="main">
                    <form action="{{ route ('saveschedule') }}" method="POST">
                        @csrf

                        <div class="input-group mb-3">
                            <label for="Amount">Montant de l'échéancier : </label>
                            <input type="number" class="form-control" id="Amount" name="amount" required />
                        </div>

                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">VALIDER</button>
                        </div>
                        <!-- /.col -->
                    </form>

                    <hr>

                    <div class="defineschedule-box-close">
                        <form action="{{ route('myrepayments') }}" method="GET">
                            @csrf

                            <button type="submit">FERMER</button>
                        </form>
                    </div>
                </section>
            </div>
            <!-- /.form-box -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.defineschedule-box -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>
