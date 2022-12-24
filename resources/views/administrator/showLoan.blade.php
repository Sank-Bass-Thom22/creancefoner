@extends('layouts.app-master')

@section('content')

    <div class="loandetail-box">
        <div class="card">
            <div class="card-body loandetail-card-body">
                <p class="loandetail-box-msg">
                <h1 class="">Détail des prêts contractés</h1>
                </p>

                <p>
                                @if ($errors->any())
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                       <p class="alert alert-danger">{{ $error }}</p>
                                        @endforeach
                                    </ul>
                                @endif
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
                        <th>Année académique</th>
                        <th>Taux applicable</th>
                        
                        <th colspan="2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($showLoan as $loans)
                    <tr>
                    <td>{{ $loop->index + 1}} </td>
                        <td>{{ $loans->amount }} Francs CFA</td>
                        <td>{{ $loans->academicyear }}</td>
                        <td>{{ $loans->value }}%</td>
                       
                        <td>
                            <a href="{{ route ('editloan', $loans->id) }}" title="Modifier">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                    </svg>
                            </a>
                            <a href="{{ route ('deleteloan', $loans->id) }}"  title="Supprimer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                    </svg>
                            </a>
                        </td>
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
