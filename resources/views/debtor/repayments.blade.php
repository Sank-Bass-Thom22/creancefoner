@extends('layouts.app-debtor')

@section('content')
    <div class="repayments-box">
        <div class="card">
            <div class="card-body repayments-card-body">
                <p class="repayments-box-msg">
                <h1 class="">Mes remboursements effectués</h1>
                </p><br />

                <p class="repayments-box-success">
                    @if (session()->has('success'))
                <div class="">{{ session()->get('success') }}</div><br />
                @endif
                </p>

      
                

                <h3>Apperçu global</h3>
                                    <table class="table header-border">
                                        <thead>
                                            <tr>
                                                <th>DETTE TOTALE</th>
                                                <th>TOTAL PAYÉ</th>
                                                <th>RESTE À PAYER</th>
                                                <th>ÉCHÉANCIER</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                       
                                            <tr>
                                                <td>{{ $totalDebt }} Francs CFA</td>
                                                <td>{{ $totalPaid }} Francs CFA</td>
                                                <td>{{ $totalDebt - $totalPaid }} Francs CFA</td>
                                                <td>
                                                    @if ($schedule > 0)
                                                        {{ $schedule }} Francs par mois
                                                    @else
                                                        Aucun échéancier
                                                    @endif
                                                </td>
                                            </tr>
                                           




                                          
                                        </tbody>
                                    </table>


                                    <h3>Récaputulatif des remboursements</h3>
                                    <table class="table header-border">
                                        <thead>
                                            <tr>
                                                <th>EFFECTUÉ LE</th>
                                                <th>MONTANT</th>
                                                <th>MODE DE REMBOURSEMENT</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                       
                                        @forelse ($debtorRepayments as $repayments)
                                            <tr>
                                                <td>{{ $repayments->repaymentdate }}</td>
                                                <td>{{ $repayments->amount }} Francs CFA</td>
                                                <td>{{ $repayments->repaymentway }}</td>
                                            </tr>
                                        @empty
                                           
                                        
                                        <td colspan="3">Vous n'avez effectué aucun remboursement pour l'instant.</td>
                                        @endforelse



                                          
                                        </tbody>
                                    </table>
                    <div class="form-group">
       
                            @if ($totalPaid < $totalDebt) <td>
                                    @if ($schedule === 0)
                                        <a href="{{ route('defineschedule') }}"  class="btn mb-1 btn-primary">DÉFINIR UN ÉCHÉANCIER</a>
                                    @else
                                        <a href="{{ route('defineschedule') }}"  class="btn mb-1 btn-primary">MODIFIER L'ÉCHÉANCIER</a>
                                    @endif
                                    </td>
                            @endif

                        <a href="{{ route('myloans') }}" class="btn mb-1 btn-danger">Retour</a>                    
                    </div>
            </div>
        </div>
    </div>

@endsection
