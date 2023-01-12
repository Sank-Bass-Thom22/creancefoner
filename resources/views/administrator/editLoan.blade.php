@extends('layouts.app-master')

@section('content')

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
                <div class="form-group ">
                    <label for="Amount">Montant du prêt : </label>
                    <input type="number" class="form-control" id="Amount" name="amount" value="{{ $debtorLoan->amount }}" required />
                </div>
                <div class="form-group ">
                    <label for="Academicyear">Année académique : </label>
                    <select id="Academicyear" class="form-control" name="academicyear" required>
                        @for($year=date('Y'); $year>2000; $year--)
                        <option value="{{ $year-1 }}-{{ $year }}">{{ $year-1 }}-{{ $year }}</option>
                        @endfor
                    </select>
                </div>
                <!--
                <div class="form-group ">
                    <label for="Rate">Taux applicable : </label>
                    <select id="Rate" name="rate" class="form-control" required>
                        @forelse ($allRates as $rates)
                        <option value="{{ $rates->id }}">{{ $rates->value }}</option>
                        @empty
                    <option><div class="">Aucun taux enregistré! 😞 </div></option>
                    @endforelse.
                    </select>
                </div>
-->

                <div class="form-group">
                    <button type="submit" class="btn mb-1 btn-primary">Valider</button>

                    <a href="{{ route('showloan', $debtorLoan->id_debtor) }}" class="btn mb-1 btn-danger">Retour</a>
                </div>
            </form>

        </div>
        <!-- /.form-box -->
    </div>
    <!-- /.card -->
</div>
<!-- /.updateloan-box -->

@endsection
