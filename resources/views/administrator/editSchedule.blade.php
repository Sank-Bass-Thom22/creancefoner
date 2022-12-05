@extends('layouts.app-master')

@section('content')

    <div class="updateschedule-box">
        <div class="card">
            <div class="card-body updateschedule-card-body">
                <p class="updateschedule-box-msg">
                <h1>Modification d'un échéancier</h1>
                </p><br />

                <p class="updateschedule-box-error">
                    @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                    <li><strong class="alert alert-danger">{{ $error }}</strong></li>
                    @endforeach
                </ul><br />
                @endif
                </p>

                <p class="updateschedule-box-success">
                    @if (session()->get('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div><br />
                @endif
                </p>

                <p class="updateschedule-box-fullname">
                    @if (session()->has('fullname'))
                <div class="alert alert-success">{{ session()->get('fullname') }}</div><br />
                @endif
                </p>

                <form action="{{ route ('updateschedule', $debtorSchedule->id) }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <label for="Amount">Montant de l'échéancier : </label>
                        <input type="number" class="form-control" id="Amount" name="amount" value="{{ $debtorSchedule->amount }}" required />
                    </div>

                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">VALIDER</button>
                    </div>
                    <!-- /.col -->
                </form>

                <hr>

                <div class="adminlist-box-close">
                    <form action="{{ route('showrepayment', $debtorSchedule->id_debtor) }}" method="GET">
                        @csrf

                        <button type="submit">FERMER</button>
                    </form>
                </div>
            </div>
            <!-- /.form-box -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.updateschedule-box -->

@endsection
