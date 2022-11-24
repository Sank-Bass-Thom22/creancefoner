<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modification d'un échéancier</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition resetschedule-page">
    <div class="resetschedule-box">
        <div class="card">
            <div class="card-body resetschedule-card-body">
                <p class="resetschedule-box-msg">
                <h1>Modification de mon échéancier</h1>
                </p><br />

                <p class="resetschedule-box-error">
                    @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                    <strong class="alert alert-danger">{{ $error }}</strong>
                    @endforeach
                </ul><br />
                @endif
                </p>

                <p class="resetschedule-box-success">
                    @if (isset($message))
                <div class="alert alert-success">{{ $message }}</div><br />
                @endif
                </p>

                <section class="main">
                    <form action="{{ route ('resaveschedule') }}" method="POST">
                        @csrf

                        <div class="input-group mb-3">
                            <label for="Amount">Montant de l'échéancier : </label>
                            <input type="number" class="form-control" id="Amount" name="amount" value="{{ $resetSchedule }}" required />
                        </div>

                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">VALIDER</button>
                        </div>
                        <!-- /.col -->
                    </form>

                    <hr>

                    <div class="resetschedule-box-close">
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
    <!-- /.resetschedule-box -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>
