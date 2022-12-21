@extends('layouts.app-debtor')

@section('content')
<div class="loans-box">
    <div class="card">
        <div class="card-body loans-card-body">
            <p class="loans-box-msg">
            <h1 class="">Mes prêts</h1>
            </p><br />

            <p class="loans-box-success">
                @if (session()->get('success'))
            <div class="alert alert-success">{{ session()->get('success') }}</div><br />
            @endif
            </p>


            <a href="{{ route('dashboard') }} " class="btn btn-danger btn-lg float-right" style="margin: 15px;">Retour</a>
            <a href="{{ route('myrepayments') }}" class="btn btn-danger btn-lg float-right" style="margin: 15px;">Remboursements</a>
            <table class="table header-border">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>MONTANT</th>
                        <th>Année académique</th>
                        <th>TAUX DE REMBOURSEMENT</th>
                
                    </tr>
                </thead>
                <tbody>
                    @forelse ($debtorLoans as $loans)
                    <tr>
                        <td>{{ $loop->index + 1}} </td>
                        <td>{{ $loans->amount }} Francs CFA</td>
                        <td>{{ $loans->academicyear }}</td>
                        <td>{{ $loans->value }}%</td>
                       
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5"></td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
