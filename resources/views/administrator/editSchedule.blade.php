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
                    <div class="form-group ">
                        <label for="Amount">Montant de l'échéancier : </label>
                        <input type="number" class="form-control" id="Amount" name="amount" value="{{ $debtorSchedule->amount }}" required />
                    </div>

                    <div class="form-group">
       
                        <button type="submit" class="btn mb-1 btn-primary">Valider</button>

                        <a href="{{ route('showrepayment', $debtorSchedule->id_debtor) }}" class="btn mb-1 btn-danger">Retour</a>                    
                    </div>
                </form>


            </div>
            <!-- /.form-box -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.updateschedule-box -->

@endsection
