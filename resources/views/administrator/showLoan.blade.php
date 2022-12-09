@extends('layouts.app-master')

@section('content')

    <div class="loandetail-box">
        <div class="card">
            <div class="card-body loandetail-card-body">
                <p class="loandetail-box-msg">
                <h1 class="">Détail des prêts contractés</h1>
                </p>

                <p class="loandetail-box-success">
                    @if (session()->get('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                </p>

                <p class="loandetail-box-success">
                    @if (session()->has('fullname'))
                <div class="alert alert-success">{{ session()->get('fullname') }}</div>
                @endif
                </p>

                <div class="table-responsive">
                <a href="{{ route('alldebtor') }}" class="btn btn-danger btn-lg float-right" style="margin: 15px;">Retour</a>
                                <a href="{{ route ('createloannow', $id) }}" class="btn btn-primary btn-lg float-right" style="margin: 15px;" >Nouveau</a>
                                <a href="{{ route ('showrepayment', $id) }}" class="btn btn-primary btn-lg float-right" style="margin: 15px;" >Remboursements</a>
                <table class="table header-border">
                <thead>
                    <tr>
                    <th>#</th>
                        <th>Montant</th>
                        <th>Contracté le</th>
                        <th>Taux applicable</th>
                        <th>Date de cloture</th>
                        <th colspan="2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($showLoan as $loans)
                    <tr>
                    <td>{{ $loop->index + 1}} </td>
                        <td>{{ $loans->amount }} Francs CFA</td>
                        <td>{{ $loans->startline }}</td>
                        <td>{{ $loans->value }}%</td>
                        <td>{{ $loans->deadline }}</td>
                        <td><a href="{{ route ('editloan', $loans->id) }}">Modifier</a></td>
                        <td><a href="{{ route ('deleteloan', $loans->id) }}">Supprimer</a></td>
                    </tr>
                    @empty
                </table><br />
                <div class="">Aucun prêt enregistré pour le moment! 😞</div>
                @endforelse
                </tbody>
                </table>
</div>
            </div>
        </div>
    </div>

@endsection
