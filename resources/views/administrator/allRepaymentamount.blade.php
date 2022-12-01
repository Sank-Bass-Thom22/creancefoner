@extends('layouts.app-master')

@section('content')
    <div class="repaymentamountlist-box">
        <div class="card">
            <div class="card-body repaymentamountlist-card-body">
                <p class="repaymentamountlist-box-msg">
                <h1 class="">Grille</h1>
                </p>

                <table class="">
                    <tr>
                        <th>MONTANT MINIMAL</th>
                        <th>MONTANT MAXIMAL</th>
                        <th>OPTION SUPPLÉMENTAIRE</th>
                    </tr>
                    @forelse ($allRepaymentamount as $repaymentamounts)
                    <tr>
                        <td>{{ $repaymentamounts->minamount }} Francs CFA</td>
                        <td>{{ $repaymentamounts->maxamount }} Francs CFA</td>
                        <td><a href="{{ route('showrepaymentamount', $repaymentamounts->id) }}" class="">VOIR PLUS</a></td>
                    </tr>
                    @empty
                </table><br />
                <p class="repaymentamountlist-box-msg">Aucune grille enregistrée! 😞</p>
                @endforelse
                </table>

                <hr>

                <div class="repaymentamountlist-box-close">
                    <form action="{{ route('dashboard') }}" method="GET">
                        @csrf

                        <button type="submit">FERMER</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection