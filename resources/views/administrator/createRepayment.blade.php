<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Enregistrement d'un remboursement</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition create-page">
    <div class="create-box">
        <div class="card">
            <div class="card-body create-card-body">
                <p class="create-box-msg">
                <h1>Enregistrement d'un remboursement</h1>
                </p>

                <p class="create-box-error">
                    @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                    <li><strong class="alert alert-danger">{{ $error }}</strong></li>
                    @endforeach
                </ul>
                @endif
                </p>

                <p class="create-box-success">
                    @if (session()->get('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                </p>

                <p class="create-box-fullname">
                    @if (session()->has('fullname'))
                <div class="alert alert-success">{{ session()->get('fullname') }}</div>
                @endif
                </p>

                <form action="{{ route ('storerepayment') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <label for="Amount">Montant du remboursement : </label>
                        <input type="number" class="form-control" id="Amount" name="amount" required />
                    </div>
                    <div class="input-group mb-3">
                        <label for="Repaymentdate">Date du remboursement : </label>
                        <input type="date" class="form-control" id="Repaymentdate" name="repaymentdate" required />
                    </div>
                    <div class="input-group mb-3">
                        <label for="Repaymentway">Méthode de remboursement : </label>
                        <select id="Repaymentway" name="repaymentway" required>
                            <option value=""></option>
                            <option value="En espèces">En espèces</option>
                            <option value="Virement banquaire">Par virement banquaire</option>
                            <option value="Par checque">Par checque</option>
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
                    <form action="{{ route('showrepayment', session()->get('id_debtor')) }}" method="GET">
                        @csrf

                        <button type="submit">FERMER</button>
                    </form>
                </div>
            </div>
            <!-- /.form-box -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.create-box -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>
