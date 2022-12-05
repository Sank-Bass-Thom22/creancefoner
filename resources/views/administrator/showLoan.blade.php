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

                <p class="loan-list">
                <table class="tab">
                    <tr>
                        <th>MONTANT</th>
                        <th>CONTRACTÉ LE</th>
                        <th>TAUX APPLICABLE</th>
                        <th>DATE DE CLOTURE</th>
                        <th>OPTION</th>
                    </tr>
                    @forelse($showLoan as $loans)
                    <tr>
                        <td>{{ $loans->amount }} Francs CFA</td>
                        <td>{{ $loans->startline }}</td>
                        <td>{{ $loans->value }}%</td>
                        <td>{{ $loans->deadline }}</td>
                        <td>
                            <form action="{{ route ('editloan', $loans->id) }}" method="GET">
                                @csrf

                                <button type="submit">MODIFIER</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                </table><br />
                <p class="">Aucun prêt enregistré pour le moment! 😞</p>
                @endforelse
                </table>
                </p>

                <hr>

                <div class="loandetail-box-close">
                    <table>
                        <tr>
                            @if ($countLoan < 15) <td>
                                <form action="{{ route ('createloannow', $id) }}" method="GET">
                                    @csrf

                                    <button type="submit">ENREGISTRER</button>
                                </form>
                                </td>
                                @endif
                                @if ($countLoan > 0)
                                <td>
                                    <form action="{{ route ('showrepayment', $id) }}" method="GET">
                                        @csrf

                                        <button type="submit">VOIR PLUS</button>
                                    </form>
                                </td>
                                @endif
                                <td>
                                    <form action="{{ route('showdebtor', $id) }}" method="GET">
                                        @csrf

                                        <button type="submit">FERMER</button>
                                    </form>
                                </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
