@extends('layouts.app-master')

@section('content')

    <div class="repaymentdetail-box">
        <div class="card">
            <div class="card-body repaymentdetail-card-body">
                <p class="repaymentdetail-box-msg">
                <h1 class="">Détail des remboursements effectués</h1>
                </p>

                <p class="repaymentdetail-box-success">
                    @if (session()->get('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                </p>

                <p class="create-box-error">
                    @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                    <li><strong class="alert alert-danger">{{ $error }}</strong></li>
                    @endforeach
                </ul><br />
                @endif
                </p>

                <p class="repaymentdetail-box-success">
                    @if (session()->has('fullname'))
                <div class="alert alert-success">{{ session()->get('fullname') }}</div>
                @endif
                </p>

                <p>
                <table class="table header-border">
                    <tr>
                        <th>TOTAL DÛ</th>
                        <th>TOTAL PAYÉ</th>
                        <th>RESTE À PAYER</th>
                        <th>ÉCHÉANCIER</th>
                    </tr>
                    <tr>
                        <td>@money($totalDue ) Francs CFA</td>
                        <td>@money($totalPaid ) Francs CFA</td>
                        <td>@money($totalDue - $totalPaid ) Francs CFA</td>
                        <td>
                            @if (session()->get('schedule') > 0)
                                <div class="">@money(session()->get('schedule')) Francs par mois</div>
                            @else
                                <div class="">Veuillez définir un échéancier!</div>
                            @endif
                        </td>
                    </tr>
                </table>
                </p><br />

                <div class="loan-list">
                <!-- <a href="{{ route('showloan', $id) }}" class="btn btn-danger btn-lg float-right" style="margin: 15px;">Retour</a> -->
                                <!-- <a href="{{ route ('createrepayment', $id) }}" class="btn btn-primary btn-lg float-right" style="margin: 15px;" >Nouveau</a> -->
                <table class="table header-border">
                    <tr>
                        <th>#</th>
                        <th>EFFECTUÉ LE</th>
                        <th>MONTANT</th>
                        <th>MODE DE REMBOURSEMENT</th>
                        <th colspan="2">ACTION</th>
                    </tr>
                    @forelse($showRepayment as $repayments)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td> {{date('d-m-Y', strtotime($repayments->repaymentdate)) }}</td>
                        <td> @money($repayments->amount)  Francs CFA</td>
                        <td>{{ $repayments->repaymentway }}</td>
                        <td>
                            <a href="{{ route ('editrepayment', $repayments->id) }}" title="Modifier">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                    </svg>
                            </a>
                            <a href="{{ route ('deleterepayment', $repayments->id) }}" title="Supprimer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                    </svg>
                            </a>
                        </td>
                    </tr>
                    @empty

                    <tr>
                        <td colspan="5">Aucun remboursement enregistré pour le moment! 😞</td>
                    </tr>

                    @endforelse
                </table>
                </p>

                <hr>


                <div class="form-group">


                        @if ($totalPaid < $totalDue && session()->get('schedule') > 0)
                            <a href="{{ route ('createrepayment', $id) }}" class="btn mb-1 btn-info">REMBOURSER</a>
                            <a href="{{ route ('editschedule', session()->get('id_schedule')) }}" class="btn mb-1 btn-primary">MODIFIER L'ÉCHÉANCIER</a>

                        @else
                            @if ($totalPaid < $totalDue)
                                <a href="{{ route ('createschedule', $id) }}" class="btn mb-1 btn-warning">DÉFINIR UN ÉCHÉANCIER</a>
                            @endif

                        @endif
                        <a href="{{ route('showloan', $id) }}" class="btn mb-1 btn-danger">Retour</a>


                </div>

            </div>
        </div>
    </div>

@endsection
