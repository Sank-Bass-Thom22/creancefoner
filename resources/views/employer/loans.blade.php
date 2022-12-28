@extends('layouts.app-employer')

@section('content')




<div class="loans-box">
    <div class="card">
        <div class="card-body loans-card-body">
            <p class="loans-box-msg">
            <h1 class="">Détail des prêts contractés</h1>
            </p><br />

            <section class="main">
                <a href="{{ route('myemployes') }} " class="btn btn-danger btn-lg float-right" style="margin: 15px;">Retour</a>
                <a href="{{ route ('myemployerepayments', $id) }}" class="btn btn-primary btn-lg float-right" style="margin: 15px;">Etat des rembourssement</a>
                <div class="table-responsive">
                    <table class="table header-border">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Montant</th>
                                <th>Année académique</th>
                                <th>Taux de remboursement</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($employeLoans as $loans)
                            <tr>
                                <td>{{ $loop->index + 1}} </td>
                                <td> @money($loans->amount) Francs CFA</td>
                                <td>{{ $loans->academicyear }}</td>
                                <td>{{ $loans->value }}%</td>
                          
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4"></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection
