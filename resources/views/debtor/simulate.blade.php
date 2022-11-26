<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simulation d'un échéancier</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition simulate-page">
    <div class="simulate-box">
        <div class="card">
            <div class="card-body simulate-card-body">
                <p class="simulate-box-title">
                <h1>Simulation d'un échéancier</h1>
                </p><br />

                <p class="simulate-box-error">
                    @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                    <li><strong class="alert alert-danger">{{ $error }}</strong></li>
                    @endforeach
                </ul><br />
                @endif
                </p>

                <section class="main">
                    <p class="simulate-box-msg">
                        @if (isset($message))
                    <div class="alert alert-success">{{ $message }}</div><br />
                    @endif
                    </p>

                    <div>
                        <h3>Calculez la durée de votre remboursement</h3><br />

                        <form method="POST" action="{{ route('makesimulationwithamount') }}">
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
                    </div><br /><br />

                    <div>
                        <h3>Calculez le montant de votre remboursement</h3><br />

                        <form method="POST" action="{{ route('makesimulationwithdate') }}">
                            @csrf

                            <div class="input-group mb-3">
                                <label for="Mounths">Nombre de mois : </label>
                                <select class="form-control" id="Mounths" name="mounths" required>
                                    @for ($counter=0; $counter <= 120; $counter++) <option value="{{ $counter }}">{{ $counter }}</option>
                                        @endfor
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <label for="Years">Nombre d'année : </label>
                                <select id="Years" name="years" required>
                                    @for ($counter=0; $counter<=10; $counter++) <option value="{{ $counter }}">{{ $counter }}</option>
                                        @endfor
                                </select>
                            </div>

                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">VALIDER</button>
                            </div>
                            <!-- /.col -->
                        </form>
                    </div>

                    <hr>

                    <div class="simulate-box-close">
                        <form action="{{ route('dashboard') }}" method="GET">
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
    <!-- /.simulate-box -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>
