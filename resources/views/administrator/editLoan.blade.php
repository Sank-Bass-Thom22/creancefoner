<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modification d'un prêt</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition updateloan-page">
    <div class="updateloan-box">
        <div class="card">
            <div class="card-body updateloan-card-body">
                <p class="updateloan-box-msg">
                <h1>Modification d'un prêt</h1>
                </p><br />

                <p class="updateloan-box-error">
                    @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                    <li><strong class="alert alert-danger">{{ $error }}</strong></li>
                    @endforeach
                </ul><br />
                @endif
                </p>

                <p class="updateloan-box-success">
                    @if (session()->has('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div><br />
                @endif
                </p>

                <p class="updateloan-box-fullname">
                    @if (session()->has('fullname'))
                <div class="alert alert-success">{{ session()->get('fullname') }}</div>
                @endif
                </p>

                <form action="{{ route ('updateloan', $debtorLoan->id) }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <label for="Amount">Montant du prêt : </label>
                        <input type="number" class="form-control" id="Amount" name="amount" value="{{ $debtorLoan->amount }}" required />
                    </div>
                    <div class="input-group mb-3">
                        <label for="Startline">Date de contraction du prêt : </label>
                        <input type="date" class="form-control" id="Startline" name="startline" value="{{ $debtorLoan->startline }}" required />
                    </div>
                    <div class="input-group mb-3">
                        <label for="Deadline">Date de cloture du prêt : </label>
                        <input type="date" class="form-control" id="Deadline" name="deadline" value="{{ $debtorLoan->deadline }}" required />
                    </div>
                    <div class="input-group mb-3">
                        <label for="Rate">Taux applicable : </label>
                        <select id="Rate" name="rate" required>
                            @forelse ($allRates as $rates)
                            <option value="{{ $rates->id }}">{{ $rates->value }}</option>
                            @empty
                        </select><br />
                        <div class="">Aucun taux enregistré! 😞 </div>
                        @endforelse.
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
                    <form action="{{ route('showloan', $debtorLoan->id_debtor) }}" method="GET">
                        @csrf

                        <button type="submit">FERMER</button>
                    </form>
                </div>
            </div>
            <!-- /.form-box -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.updateloan-box -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>
