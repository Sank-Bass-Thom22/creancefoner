@extends('layouts.app-master')

@section('content')

        <div class="card ">
            <div class="card-body">
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

                <h1>Paiement Rapide</h1>

                <form action="{{ route('quickstorerepayment') }}" method="POST">
                    @csrf

                    <livewire:redevable />
                    <div class="group-group mb-3">
                        <label for="Amount">Montant du remboursement : </label>
                        <input type="number" class="form-control" id="Amount" name="amount" required />
                    </div>
                    <div class="group-group mb-3">
                        <label for="Repaymentdate">Date du remboursement : </label>
                        <input type="date" class="form-control" id="Repaymentdate" name="repaymentdate" value='{{date("Y-m-d")}}' required />
                    </div>

                    <livewire:mode />
                   <br>

                    <div class="form-group">

                        <button type="submit" class="btn mb-1 btn-primary">Valider</button>

                        <a href="{{ route('dashboard') }}" class="btn mb-1 btn-danger">Retour</a>

                    </div>
                </form>


            </div>
        </div>

@endsection
