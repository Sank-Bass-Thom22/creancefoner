@extends('layouts.app-debtor')

@section('content')
    <div class="loans-box">
        <div class="card">
            <div class="card-body loans-card-body">
                <p class="loans-box-msg">
                <h1 class="">Mes prêts</h1>
                </p>

                <p class="loans-box-success">
                    @if (session()->get('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                </p>



                                    <table class="table header-border">
                                        <thead>
                                            <tr>
                                                <th>MONTANT</th>
                                                <th>CONTRACTÉ LE</th>
                                                <th>TAUX DE REMBOURSEMENT</th>
                                                <th>À REMBOURSER AVANT LE</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($debtorLoans as $loans)
                                            <tr>
                                                <td>{{ $loans->amount }} Francs CFA</td>
                                                <td>{{ $loans->startline }}</td>
                                                <td>{{ $loans->value }}%</td>
                                                <td>{{ $loans->deadline }}</td>
                                                <td>
                                                    @if ($countLoans > 0) 
                                                        <a href="{{ route('myrepayments') }}" class="btn-primary">VOIR MES REMBOURSEMENTS</a>
                                                      
                                                    @endif
                                                </td>
                                            </tr>
                                           

                                        @empty
                                            <tr>
                                                <td colspan="4"></td>
                                             
                                             </tr>

                                        @endforelse



                                          
                                        </tbody>
                                    </table>

                              
            </div>
        </div>
    </div>

@endsection
