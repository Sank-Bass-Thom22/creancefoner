@extends('layouts.app-master')

@section('content')

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
                <div class="form-group ">
                    <label for="Amount">Montant du remboursement : </label>
                    <input type="number" class="form-control" id="Amount" name="amount" required />
                </div>
                <div class="form-group ">
                    <label for="Repaymentdate">Date du remboursement : </label>
                    <input type="date" class="form-control" id="Repaymentdate" name="repaymentdate" value='{{date("Y-m-d")}}' required />
                </div>

                <livewire:mode />



                <div class="form-group">

                    <button type="submit" class="btn mb-1 btn-primary">Valider</button>

                    <a href="{{ route('showrepayment', session()->get('id_debtor')) }}" class="btn mb-1 btn-danger">Retour</a>
                </div>
            </form>


        </div>

    </div>
    <!-- /.card -->
</div>
<!-- /.create-box -->

@endsection
