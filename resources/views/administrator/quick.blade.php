@extends('layouts.app-master')

@section('content')

<div class="row">
    <div class="col-lg-3 col-sm-6">
        <div class="card gradient-1">
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

                <h1>Sélectionner le redevable</h1>

                <form action="{{ route('quickstorerepayment') }}" method="POST">
                    @csrf

                <select id="Debtor" name="debtor" required>
                    <option></option>
                @forelse ($debtors as $debtor)
                <option value="{{ $debtor->id }}">
                    {{ $debtor->firstname }} {{ $debtor->lastname }}
                </option>
                @empty
                <p>Aucun redevable</p>
                @endforelse
                </select>

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
                            <option value="Par check">Par check</option>
                            <option value="Par mobile money">Par mobile money</option>
                            <option value="Virement banquaire">Par virement banquaire</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <label for="Bank">Institution banquaire : </label>
                        <select id="Bank" name="bank">
                            <option></option>
                            @forelse ($allBank as $banks)
                            <option value="{{ $banks->id }}">{{ $banks->name }}</option>
                            @empty
                            <p>Aucune banque</p>
                            @endforelse
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <label for="Description">Description : </label>
                        <textarea class="form-control" id="Description" name="description" rows="5" cols="50"></textarea>
                    </div>

                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">VALIDER</button>
                    </div>
                    <!-- /.col -->
                </form>

                <hr>

                <div class="adminlist-box-close">
                    <a href="{{ route('dashboard') }}">FERMER</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
